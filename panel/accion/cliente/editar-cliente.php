
<?php

if (isset($_POST['Editar'])) {
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idcliente = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $cedula = $_REQUEST['cedula'];
        $celular = $_REQUEST['celular'];

        $modificar = ("UPDATE cliente 
        SET 
        nombre  ='" . $nombre . "',
        cedula  ='" . $cedula . "',
        celular ='" . $celular . "' 
        WHERE idcliente='" . $idcliente . "'");

        $resultado = $conexion->query($modificar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=cliente&exito=Cliente Editado" />';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=cliente&error=Cliente No Editado" />';
        }
    }
}

?>