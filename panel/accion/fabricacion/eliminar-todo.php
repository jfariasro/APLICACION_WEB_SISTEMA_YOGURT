<?php
require '../../conexion.php';

if ($conexion->connect_errno){
	die('Lo siento hubo un problema con el servidor');
}else{
    $idfabricacion = $_REQUEST['idfabricacion'];

    //Obtener los Productos
    $consultar = "select i.idingrediente, df.cant_ingrediente
    from detalle_fabricacion df join ingrediente i
    on df.idingrediente = i.idingrediente
    where df.idfabricacion = '$idfabricacion'";
    $resultado = $conexion->query($consultar);
    $fabricaciones = $resultado->fetch_all();

    foreach($fabricaciones as $fabricacion){
        //Controlar y Modificar el Stock
        $consultar = "SELECT stock from ingrediente where idingrediente = '$fabricacion[0]'";
        $resultado = $conexion->query($consultar);

        $ingredientes = $resultado->fetch_row();

        $stock = $ingredientes[0];
        $totalStock = $stock + $fabricacion[1];

        $modificar = "UPDATE ingrediente
                    set stock = '$totalStock'
                    where idingrediente = '$fabricacion[0]'
                ";
                $resultado = $conexion->query($modificar);
    }

    //Eliminar Detalle Fabricación
    $eliminar = "DELETE FROM detalle_fabricacion where detalle_fabricacion.idfabricacion = '$idfabricacion'";
    $resultado1 = $conexion->query($eliminar);

    //Eliminar Fabricación
    $eliminar = "DELETE FROM fabricacion where idfabricacion = '$idfabricacion'";
    $resultado2 = $conexion->query($eliminar);

    if($resultado1 !== false && $resultado2 !== false){
        echo '<meta http-equiv="refresh" content="0; url=../../index.php?modulo=generar-fabrica" />';
    }
}

?>