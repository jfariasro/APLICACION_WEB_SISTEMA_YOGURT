<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    die();
}

require 'conexion.php';

if ($conexion->connect_errno){
	die('Lo siento hubo un problema con el servidor');
}

$modulo = $_REQUEST['modulo']??'';

require 'vistas/index.vista.php';
