<?php

if(isset($_POST['Enviar']) && !empty($_FILES)){
    $check = @getimagesize($_FILES['imagen']['tmp_name']);
	if ($check !== false){
		$carpeta_destino = 'fotos/';
		$archivo_subido = $carpeta_destino . $_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo_subido);

        $nombre = $_POST['nombre'];
        $imagen = $_FILES['imagen']['name'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        $insertar = "INSERT INTO ingrediente(idingrediente, nombre, imagen, stock, precio)
        VALUEs(null, '$nombre', '$imagen', '$stock', '$precio')";

        $conexion->query($insertar);

        if($conexion->affected_rows >= 1){
            $exito = "Ingrediente Insertado correctamente";
        }
        else{
            $error = "No se pudo insertar el Ingrediente";
        }

		
	} else {
		$error = "El archivo no es una imagen o el archivo es muy pesado";
	}
}

$consultar = "SELECT * FROM ingrediente";
$resultado = $conexion->query($consultar);

$ingredientes = $resultado->fetch_all();

require 'vistas/ingrediente.vista.php';