<?php

if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $id= $_REQUEST['id'];

        $consultar = "select p.idproducto, dv.cantidad
        from producto p join detalle_venta dv
        on p.idproducto = dv.idproducto
        where dv.iddetalleventa = '$id'";
        $resultado = $conexion->query($consultar);

        $productos = $resultado->fetch_row();

        $idventa = $_REQUEST['idv'];
        
        $eliminar = ("DELETE FROM detalle_venta WHERE iddetalleventa = '".$id."' ");
        $resultado = $conexion->query($eliminar);

        $consultar = "select c.idcliente from venta v join cliente c
        on c.idcliente = v.idcliente
        where v.idventa = '$idventa';";
        $resultado = $conexion->query($consultar);
        $clientes = $resultado->fetch_row();
        $idcliente = $clientes[0];
        
        //Devolver el Stock
        $idproducto = $productos[0];
        $cantidad = $productos[1];

        $modificar = "UPDATE producto
                    set stock = stock + '$cantidad'
                    where idproducto = '$idproducto'
                ";
                $resultado = $conexion->query($modificar);
        
    }
}

if (isset($_POST['Enviar'])) {

    if ($_POST['idventa'] == '') {
        $idcliente = $_POST['cliente'] ?? '';
        $fecha = date_create('now')->format('Y-m-d H:i:s');
        $insertar = "INSERT INTO venta(fecha, idcliente)
        VALUEs('$fecha', '$idcliente')";

        $conexion->query($insertar);

        if ($conexion->affected_rows >= 1) {
            $consultar = "SELECT idventa FROM venta ORDER BY idventa desc limit 1";
            $resultado = $conexion->query($consultar);
            $ventas = $resultado->fetch_row();
            $idventa = $ventas[0];
        } else {
            $error = "No se pudo Registrar la Venta";
        }
    }

    if (isset($error) == false) {
        if ($_POST['idventa'] !== '') {
            $idventa = $_POST['idventa'];
        }
        if ($_POST['cliente'] !== '') {
            $idcliente = $_POST['cliente'];
        }
        $idproducto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];

        $consultar = "SELECT pvp from producto where idproducto = '$idproducto'";
        $resultado = $conexion->query($consultar);

        $productos = $resultado->fetch_row();
        $precio = $productos[0];

        $subtotal = $cantidad * $precio;

        //Controlar el Stock
        $consultar = "SELECT stock from producto where idproducto = '$idproducto'";
        $resultado = $conexion->query($consultar);

        $productos = $resultado->fetch_row();
        $stock = $productos[0];
        $totalStock = $stock - $cantidad;

        if ($totalStock >= 0) {
            $insertar = "INSERT INTO detalle_venta(idventa, idproducto, cantidad, precio, subtotal)
            VALUEs('$idventa', '$idproducto', '$cantidad', '$precio', '$subtotal')";

            $conexion->query($insertar);

            if ($conexion->affected_rows >= 1) {
                $exito = "La venta Fue Generada";

                //Generar la modificación del Stock
                $modificar = "UPDATE producto
                    set stock = '$totalStock'
                    where idproducto = '$idproducto'
                ";
                $resultado = $conexion->query($modificar);

                if (!$resultado) {
                    $error = "Error al Modificar el Stock del Producto";
                }
            } else {
                $error = "La venta no Fue Generada";
            }
        } else {
            $error = "Stock Insuficiente";
        }
    }
}

$where = '';
if (isset($idcliente)) {
    $where = " WHERE idcliente = '$idcliente'";
}

//Obtener los clientes
$consultar = "SELECT idcliente, nombre FROM cliente" . $where . ";";
$resultado = $conexion->query($consultar);

$clientes = $resultado->fetch_all();

//Obtener los productos
$consultar = "SELECT idproducto, nombre from producto;";
$resultado = $conexion->query($consultar);

$productos = $resultado->fetch_all();

if (isset($idventa) !== false) {
    $consultar = "select dv.iddetalleventa, v.fecha, c.nombre, p.nombre, p.imagen,
    dv.cantidad, dv.precio, dv.subtotal, dv.idventa
    from
    detalle_venta dv join producto p
    on dv.idproducto = p.idproducto
    join venta v on v.idventa = dv.idventa
    join cliente c on c.idcliente = v.idcliente
    where dv.idventa = '$idventa'";
    $resultado = $conexion->query($consultar);

    $detaventas = $resultado->fetch_all();
} else if (isset($_REQUEST['idventa'])) {
    $consultar = "select dv.iddetalleventa, v.fecha, c.nombre, p.nombre, p.imagen,
    dv.cantidad, dv.precio, dv.subtotal, dv.idventa
    from
    detalle_venta dv join producto p
    on dv.idproducto = p.idproducto
    join venta v on v.idventa = dv.idventa
    join cliente c on c.idcliente = v.idcliente
    where dv.idventa = '".$_REQUEST['idventa']."'";
    $resultado = $conexion->query($consultar);

    $detaventas = $resultado->fetch_all();
}

require 'vistas/generar-venta.vista.php';


/*
if ($resultado !== false) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=generar-venta&exito=Venta Editada
                &idventa='.$_REQUEST['idv'].'idproducto='.$idproducto.'" />';
            }
*/