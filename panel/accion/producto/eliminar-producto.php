<?php
if(isset($_POST['Borrar'])){
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idproducto = $_REQUEST['id'];
        
        $eliminar = ("DELETE FROM producto WHERE idproducto= '".$idproducto."' ");
        $resultado = $conexion->query($eliminar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=producto&exito=Producto Eliminado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=producto&error=Producto No Eliminado" />';
        }
    }
}
?>