
<?php

if (isset($_POST['Editar'])) {
    if ($conexion->connect_errno) {
        die("Se ha generado un error en la conexión de la base de datos");
    } else {
        $idusuario = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];

        if ($_REQUEST['clave'] !== '') {
            $clave = md5($_REQUEST['clave']);
            $modificar = ("UPDATE usuario
            SET 
            nombre  ='" . $nombre . "',
            clave  ='" . $clave . "'
            WHERE idusuario ='" . $idusuario . "'");
        }else{
            $modificar = ("UPDATE usuario 
            SET 
            nombre  ='" . $nombre . "'
            WHERE idusuario ='" . $idusuario . "'");
        }



        $resultado = $conexion->query($modificar);

        if ($resultado !== false) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=usuario&exito=Usuario Editado" />';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=usuario&error=Usuario No Editado" />';
        }
    }
}

?>