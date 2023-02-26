<?php

if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $id= $_REQUEST['id'];

        $consultar = "select i.idingrediente, df.cant_ingrediente
        from ingrediente i join detalle_fabricacion df
        on i.idingrediente = df.idingrediente
        where df.iddetallefabricacion = '$id'";
        $resultado = $conexion->query($consultar);

        $ingredientes = $resultado->fetch_row();

        $idfabricacion = $_REQUEST['idf'];
        
        $eliminar = ("DELETE FROM detalle_fabricacion WHERE iddetallefabricacion = '".$id."' ");
        $resultado = $conexion->query($eliminar);

        $consultar = "select p.idproducto from fabricacion f join producto p
        on p.idproducto = f.idproducto
        where f.idfabricacion = '$idfabricacion';";
        $resultado = $conexion->query($consultar);
        $productos= $resultado->fetch_row();
        $idproducto = $productos[0];
        
        //Devolver el Stock
        $idingrediente = $ingredientes[0];
        $cantidad = $ingredientes[1];

        $modificar = "UPDATE ingrediente
                    set stock = stock + '$cantidad'
                    where idingrediente = '$idingrediente'
                ";
                $resultado = $conexion->query($modificar);
        
    }
}

if (isset($_POST['Enviar'])) {

    if ($_POST['idfabricacion'] == '') {
        $idproducto = $_POST['producto'] ?? '';
        $fecha = date_create('now')->format('Y-m-d H:i:s');
        $cantidad = $_POST['cantidad'];
        $insertar = "INSERT INTO fabricacion(fecha, idproducto, cantidad)
        VALUEs('$fecha', '$idproducto', '$cantidad')";

        $conexion->query($insertar);

        if ($conexion->affected_rows >= 1) {
            $consultar = "SELECT idfabricacion FROM fabricacion ORDER BY idfabricacion desc limit 1";
            $resultado = $conexion->query($consultar);
            $fabricaciones = $resultado->fetch_row();
            $idfabricacion = $fabricaciones[0];
        } else {
            $error = "No se pudo Registrar la Fabricación";
        }
    }

    if (isset($error) == false) {
        if ($_POST['idfabricacion'] !== '') {
            $idfabricacion = $_POST['idfabricacion'];
        }
        if ($_POST['producto'] !== '') {
            $idproducto = $_POST['producto'];
        }
        $idingrediente = $_POST['ingrediente'];
        $cant_ingrediente = $_POST['cantidad2'];

        $consultar = "SELECT precio from ingrediente where idingrediente = '$idingrediente'";
        $resultado = $conexion->query($consultar);

        $ingredientes = $resultado->fetch_row();
        $precio = $ingredientes[0];

        //Controlar el Stock
        $consultar = "SELECT stock from ingrediente where idingrediente= '$idingrediente'";
        $resultado = $conexion->query($consultar);

        $ingredientes = $resultado->fetch_row();
        $stock = $ingredientes[0];
        $totalStock = $stock - $cant_ingrediente;

        if ($totalStock >= 0) {
            $insertar = "INSERT INTO detalle_fabricacion(idfabricacion, idingrediente, cant_ingrediente, precio)
            VALUEs('$idfabricacion', '$idingrediente', '$cant_ingrediente', '$precio')";

            $conexion->query($insertar);

            if ($conexion->affected_rows >= 1) {
                $exito = "La Fabricación Fue Generada";

                //Generar la modificación del Ingrediente
                $modificar = "UPDATE ingrediente
                    set stock = '$totalStock'
                    where idingrediente = '$idingrediente'
                ";
                $resultado1 = $conexion->query($modificar);

                if (!$resultado) {
                    $error = "Error al Modificar el Stock del Ingrediente";
                }
            } else {
                $error = "La Fabricación no Fue Generada";
            }
        } else {
            $error = "Stock Insuficiente";
        }
    }
}

$where = '';
if (isset($idproducto)) {
    $where = " WHERE idproducto = '$idproducto'";
}

//Obtener los productos
$consultar = "SELECT idproducto, nombre FROM producto" . $where . ";";
$resultado = $conexion->query($consultar);

$productos = $resultado->fetch_all();

//Obtener los ingredientes
$consultar = "SELECT idingrediente, nombre from ingrediente;";
$resultado = $conexion->query($consultar);

$ingredientes = $resultado->fetch_all();

if (isset($idfabricacion) !== false) {
    $consultar = "select df.iddetallefabricacion, f.fecha, p.nombre, p.imagen,
    f.cantidad, i.nombre, i.imagen, df.cant_ingrediente, df.precio, df.idfabricacion
    from detalle_fabricacion df join ingrediente i
        on df.idingrediente = i.idingrediente
        join fabricacion f on f.idfabricacion = df.idfabricacion
        join producto p on p.idproducto = f.idproducto
        where df.idfabricacion = '$idfabricacion'";
    $resultado = $conexion->query($consultar);

    $detafabricacion = $resultado->fetch_all();
} else if (isset($_REQUEST['idfabricacion'])) {
    $consultar = "select df.iddetallefabricacion, f.fecha, p.nombre, p.imagen,
    f.cantidad, i.nombre, i.imagen, df.cant_ingrediente, df.precio, df.idfabricacion
    from detalle_fabricacion df join ingrediente i
        on df.idingrediente = i.idingrediente
        join fabricacion f on f.idfabricacion = df.idfabricacion
        join producto p on p.idproducto = f.idproducto
    where df.idfabricacion = '".$_REQUEST['idfabricacion']."'";
    $resultado = $conexion->query($consultar);

    $detafabricacion = $resultado->fetch_all();
}

require 'vistas/generar-fabrica.vista.php';