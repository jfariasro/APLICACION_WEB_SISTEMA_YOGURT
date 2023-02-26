<?php
$where = '';

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $where = "WHERE idventa = '$id'";
}
$consultar = "SELECT idventa, cliente.nombre, fecha
FROM venta join cliente on venta.idcliente = cliente.idcliente ".$where.";";
$resultado = $conexion->query($consultar);
$ventas = $resultado->fetch_all();


require 'vistas/reporte-venta.vista.php';
?>