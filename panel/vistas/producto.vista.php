<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Formulario de Productos</h1>
        </header>

        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-8">
                    <div class="col">
                        <label for="nombre" class="mr-sm-2">Producto:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Producto" id="nombre" name="nombre" required>
                    </div>
                    <div class="col">
                        <label for="imagen" class="mr-sm-2">Imagen:</label>
                        <input type="file" class="form-control mb-2 mr-sm-2" id="imagen" name="imagen" required>
                    </div>
                    <div class="col">
                        <label for="stock" class="mr-sm-2">Stock:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter Stock" id="stock" name="stock" min="1" required>
                    </div>
                    <div class="col">
                        <label for="pvp" class="mr-sm-2">PVP:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" step="0.01" placeholder="Enter PVP" id="pvp" name="pvp" min="0.1" required>
                    </div>
                    <?php if (isset($error)) : ?>
                        <p class="text-danger">
                            <strong><?php echo $error; ?></strong>
                        </p>
                    <?php endif; ?>

                    <?php if (isset($exito)) : ?>
                        <p class="text-success">
                            <strong><?php echo $exito; ?></strong>
                        </p>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                                <div class="col">
                                    <input type="submit" value="Registrar Producto" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
                                </div>
                                <div class="col">
                                    <a href="index.php?modulo=producto" class="btn btn-danger btn-block form-control mb-2 mr-sm-2">Cancelar</a>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <header class="text-center">
                    <h1>Tabla de Productos</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>PVP</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td><?php echo $producto[0]; ?></td>
                                <td><?php echo $producto[1]; ?></td>
                                <td>
                                    <img src="<?php echo 'fotos/' . $producto[2]; ?>" alt="<?php echo $producto[1]; ?>" title="<?php echo $producto[1]; ?>" width="50px" height="50px">
                                </td>
                                <td><?php echo $producto[3]; ?></td>
                                <td><?php echo $producto[4]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $producto[0]; ?>">
                                        <i class="fas fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $producto[0]; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>

                            <?php require 'accion/producto/modal-editar.php'; ?>

                            <?php require 'accion/producto/modal-eliminar.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container">
                    <a class="btn btn-info" target="_blank" href="reporte-producto.php" role="button">
                        Reporte de Productos
                    </a>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>

</main>