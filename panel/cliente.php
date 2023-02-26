<?php
if (isset($_POST['Enviar'])) {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $celular = $_POST['celular'];

    $insertar = "INSERT INTO cliente(idcliente, nombre, cedula, celular)
        VALUEs(null, '$nombre', '$cedula', '$celular')";

    $conexion->query($insertar);

    if ($conexion->affected_rows >= 1) {
        $exito = "Cliente Insertado correctamente";
    } else {
        $error = "No se pudo Registrar el Cliente";
    }
}

$consultar = "SELECT * FROM cliente";
$resultado = $conexion->query($consultar);

$clientes = $resultado->fetch_all();

require 'vistas/cliente.vista.php';
