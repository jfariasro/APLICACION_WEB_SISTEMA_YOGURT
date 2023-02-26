<?php

if (isset($_POST['Enviar'])) {
    include_once('conexion.php');
    if ($conexion->connect_errno) {
        die('Lo siento hubo un problema con el servidor');
    } else {
        $usuario = $_POST['nombre'];
        $clave = md5($_POST['clave']);

        $insertar = "INSERT INTO usuario(idusuario, nombre, clave) VALUES(null, '$usuario', '$clave')";
        $conexion->query($insertar);
        if ($conexion->affected_rows >= 1) {
            header('Location: login.php');
        } else {
            $error = 'No se pudo registrar el Usuario';
        }
    }
}

$consultar = "SELECT * FROM usuario WHERE nombre != '".$_SESSION['usuario']."';";
$resultado = $conexion->query($consultar);

$usuarios = $resultado->fetch_all();

require 'vistas/usuario.vista.php';
