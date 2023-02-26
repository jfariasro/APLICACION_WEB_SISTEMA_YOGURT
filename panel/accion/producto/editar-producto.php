
<?php

if (isset($_POST['Editar'])) {
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idproducto = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $stock = $_REQUEST['stock'];
        $pvp = $_REQUEST['pvp'];

        $modificar = ("UPDATE producto 
        SET 
        nombre  ='" . $nombre . "',
        stock  ='" . $stock . "',
        pvp ='" . $pvp . "' 
        WHERE idproducto='" . $idproducto . "'");

        $resultado = $conexion->query($modificar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=producto&exito=Producto Editado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=producto&error=Producto No Editado" />';
        }
    }
}

?>