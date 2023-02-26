<?php
if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idcliente = $_REQUEST['id'];
        
        $eliminar = ("DELETE FROM cliente WHERE idcliente= '".$idcliente."' ");
        $resultado = $conexion->query($eliminar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=cliente&exito=Cliente Eliminado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=cliente&error=Cliente No Eliminado" />';
        }
    }
}
?>