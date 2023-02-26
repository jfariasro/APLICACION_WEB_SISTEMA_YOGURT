<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Formulario de Ingredientes</h1>
        </header>

        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-8">
                    <div class="col">
                        <label for="nombre" class="mr-sm-2">Ingrediente:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Ingrediente" id="nombre" name="nombre" required>
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
                        <label for="precio" class="mr-sm-2">Precio:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" step="0.01" placeholder="Enter Precio" id="precio" name="precio" min="0.1" required>
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
                                    <input type="submit" value="Registrar Ingrediente" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
                                </div>
                                <div class="col">
                                    <a href="index.php?modulo=ingrediente" class="btn btn-danger btn-block form-control mb-2 mr-sm-2">Cancelar</a>
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
                    <h1>Tabla de Ingredientes</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>#</th>
                        <th>Ingrediente</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php foreach ($ingredientes as $ingrediente) : ?>
                            <tr>
                                <td><?php echo $ingrediente[0]; ?></td>
                                <td><?php echo $ingrediente[1]; ?></td>
                                <td>
                                    <img src="<?php echo 'fotos/' . $ingrediente[2]; ?>" alt="<?php echo $ingrediente[1]; ?>" title="<?php echo $ingrediente[1]; ?>" width="50px" height="50px">
                                </td>
                                <td><?php echo $ingrediente[3]; ?></td>
                                <td><?php echo $ingrediente[4]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $ingrediente[0]; ?>">
                                        <i class="fas fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $ingrediente[0]; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>

                            <?php require 'accion/ingrediente/modal-editar.php'; ?>

                            <?php require 'accion/ingrediente/modal-eliminar.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

</main>