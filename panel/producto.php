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
        $pvp = $_POST['pvp'];

        $insertar = "INSERT INTO producto(idproducto, nombre, imagen, stock, pvp)
        VALUEs(null, '$nombre', '$imagen', '$stock', $pvp)";

        $conexion->query($insertar);

        if($conexion->affected_rows >= 1){
            $exito = "Producto Insertado correctamente";
        }
        else{
            $error = "No se pudo insertar el Producto";
        }

		
	} else {
		$error = "El archivo no es una imagen o el archivo es muy pesado";
	}
}

$consultar = "SELECT * FROM producto";
$resultado = $conexion->query($consultar);

$productos = $resultado->fetch_all();

require 'vistas/producto.vista.php';
