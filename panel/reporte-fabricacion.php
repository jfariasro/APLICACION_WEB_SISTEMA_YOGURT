<?php
$where = '';

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $where = "WHERE idfabricacion = '$id'";

    $consultar = "SELECT idproducto, cantidad from fabricacion where idfabricacion = '$id';";
    $resultado = $conexion->query($consultar);
    $prod = $resultado->fetch_row();

    $idprod = $prod[0];
    $cantidad = $prod[1];

    $modificar = "UPDATE producto set stock = stock + '$cantidad' where idproducto = '$idprod';";
    $resultado = $conexion->query($modificar);
}
$consultar = "SELECT idfabricacion, producto.nombre, fecha, cantidad
FROM fabricacion join producto on fabricacion.idproducto = producto.idproducto ".$where.";";
$resultado = $conexion->query($consultar);
$fabricaciones = $resultado->fetch_all();

require 'vistas/reporte-fabricacion.vista.php';
?>