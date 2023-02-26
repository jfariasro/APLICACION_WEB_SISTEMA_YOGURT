
<?php

if (isset($_POST['Editar'])) {
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idingrediente = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $stock = $_REQUEST['stock'];
        $precio = $_REQUEST['precio'];

        $modificar = ("UPDATE ingrediente 
        SET 
        nombre  ='" . $nombre . "',
        stock  ='" . $stock . "',
        precio ='" . $precio . "' 
        WHERE idingrediente='" . $idingrediente . "'");

        $resultado = $conexion->query($modificar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=ingrediente&exito=Ingrediente Editado" />';
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=ingrediente&error=Ingrediente No Editado" />';
        }
    }
}

?>