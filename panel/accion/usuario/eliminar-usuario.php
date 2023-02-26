<?php
if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idusuario = $_REQUEST['id'];
        
        $eliminar = ("DELETE FROM usuario WHERE idusuario = '".$idusuario."' ");
        $resultado = $conexion->query($eliminar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=usuario&exito=Usuario Eliminado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=usuario&error=Usuario No Eliminado" />';
        }
    }
}
?>