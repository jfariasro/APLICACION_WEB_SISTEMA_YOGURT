<?php
require '../../conexion.php';

if ($conexion->connect_errno){
	die('Lo siento hubo un problema con el servidor');
}else{
    $idventa = $_REQUEST['idventa'];

    //Obtener los Productos
    $consultar = "select p.idproducto, dv.cantidad
    from detalle_venta dv join producto p
    on dv.idproducto = p.idproducto
    where dv.idventa = '$idventa'";
    $resultado = $conexion->query($consultar);
    $ventas = $resultado->fetch_all();

    foreach($ventas as $venta){
        //Controlar y Modificar el Stock
        $consultar = "SELECT stock from producto where idproducto = '$venta[0]'";
        $resultado = $conexion->query($consultar);

        $productos = $resultado->fetch_row();
        $stock = $productos[0];
        $totalStock = $stock + $venta[1];

        $modificar = "UPDATE producto
                    set stock = '$totalStock'
                    where idproducto = '$venta[0]'
                ";
                $resultado = $conexion->query($modificar);
    }

    //Eliminar Detalle Venta
    $eliminar = "DELETE FROM detalle_venta where detalle_venta.idventa = '$idventa'";
    $resultado1 = $conexion->query($eliminar);

    //Eliminar Venta
    $eliminar = "DELETE FROM venta where idventa = '$idventa'";
    $resultado2 = $conexion->query($eliminar);

    if($resultado1 !== false && $resultado2 !== false){
        echo '<meta http-equiv="refresh" content="0; url=../../index.php?modulo=generar-venta" />';
    }
}

?>