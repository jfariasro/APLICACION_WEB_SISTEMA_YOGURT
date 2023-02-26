<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Yogurt Men</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary color-black h5">
            <a class="navbar-brand" href="index.php?modulo=usuario">
                Usuarios
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($modulo == 'cliente') {
                                                echo 'active';
                                            } ?>" href="index.php?modulo=cliente">Cliente <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?php if ($modulo == 'producto') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="index.php?modulo=producto">Producto</a>
                    </li>
                    <li class="nav-item <?php if ($modulo == 'ingrediente') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="index.php?modulo=ingrediente">Ingrediente</a>
                    </li>
                    <li class="nav-item dropdown <?php if ($modulo == 'generar-venta' || $modulo == 'reporte-venta') {
                                                        echo 'active';
                                                    } ?>">
                        <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ventas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?php if ($modulo == 'generar-venta') {
                                                        echo 'active';
                                                    } ?>" href="index.php?modulo=generar-venta">Generar Venta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php if ($modulo == 'reporte-venta') {
                                                        echo 'active';
                                                    } ?>" href="index.php?modulo=reporte-venta">Reporte de Venta</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php if ($modulo == 'generar-fabricacion' || $modulo == 'reporte-fabricacion') {
                                                        echo 'active';
                                                    } ?>">
                        <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fabricación
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?php if ($modulo == 'generar-fabrica') {
                                                        echo 'active';
                                                    } ?>" href="index.php?modulo=generar-fabrica">Generar Fabricación</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?php if ($modulo == 'reporte-fabricacion') {
                                                        echo 'active';
                                                    } ?>" href="index.php?modulo=reporte-fabricacion">Reporte de Fabricación</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrar.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php
    if (isset($_REQUEST['exito'])) :
    ?>
        <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?php echo $_REQUEST['exito'] ?>
        </div>
    <?php endif; ?>
    <?php
    if (isset($_REQUEST['error'])) :
    ?>
        <div class="alert alert-danger alert-dismissible fade show float-right" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?php echo $_REQUEST['error'] ?>
        </div>
    <?php endif; ?>

    <?php

    if ($modulo == 'usuario' || $modulo == '') {
        require 'usuario.php';
    } else if ($modulo == 'cliente') {
        require 'cliente.php';
    } else if ($modulo == 'producto') {
        require 'producto.php';
    } else if ($modulo == 'proveedor') {
        require 'proveedor.php';
    } else if ($modulo == 'generar-venta') {
        require 'generar-venta.php';
    } else if ($modulo == 'reporte-venta') {
        require 'reporte-venta.php';
    } else if ($modulo == 'ingrediente') {
        require 'ingrediente.php';
    } else if ($modulo == 'generar-fabrica') {
        require 'generar-fabrica.php';
    } else if ($modulo == 'reporte-fabricacion') {
        require 'reporte-fabricacion.php';
    }

    ?>

    <script src="js/validar.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>