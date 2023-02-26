<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>INICIAR SESION</title>
</head>

<body>

    <main style="margin-top: 20px;">
        <div class="container">
            <header class="text-center">
                <h1>INICIAR SESION</h1>
            </header>

            <?php
            if (isset($_POST['Enviar'])) {
                include_once('conexion.php');
                if ($conexion->connect_errno) {
                    die('Lo siento hubo un problema con el servidor');
                } else {
                    $usuario = $_POST['usuario'];
                    $clave = md5($_POST['clave']);

                    $consultar = "SELECT * FROM usuario WHERE nombre = '$usuario' and clave = '$clave'";
                    $resultado = $conexion->query($consultar);
                    if ($resultado->fetch_assoc()) {
                        $_SESSION['usuario'] = $usuario;
                        header('Location: index.php');
                    } else {
                        echo '<header class="text-center">
                                <h3 class="text-danger">Error al iniciar sesión</h3>
                            </header>';
                    }
                }
            }
            ?>

            <form method="post">
                <div class="row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-8">
                        <div class="col">
                            <label for="usuario" class="mr-sm-2">Usuario:</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter usuario" id="usuario" name="usuario" onkeypress="return validarTexto(event)" required>
                        </div>
                        <div class="col">
                            <label for="clave" class="mr-sm-2">Clave:</label>
                            <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter clave" id="clave" name="clave" required>
                        </div>
                        <div class="col">
                            <input type="submit" value="Inicar Sesión" class="btn btn-success btn-block" name="Enviar">
                        </div>
                    </div>

                    <div class="col-sm-2"></div>
                </div>
            </form>
        </div>
    </main>

    <script src="js/validar.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>