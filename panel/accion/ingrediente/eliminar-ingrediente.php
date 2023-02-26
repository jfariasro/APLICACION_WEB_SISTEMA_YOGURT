<?php
if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idingrediente = $_REQUEST['id'];
        
        $eliminar = ("DELETE FROM ingrediente WHERE idingrediente= '".$idingrediente."' ");
        $resultado = $conexion->query($eliminar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=ingrediente&exito=Ingrediente Eliminado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=ingrediente&error=Ingrediente No Eliminado" />';
        }
    }
}
?>