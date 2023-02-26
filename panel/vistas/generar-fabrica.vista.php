<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Control de Costo en la Asociación Fernandito</h1>
        </header>

        <form method="POST">
            <div class="row">
                <div class="col-sm-2"></div>
                <input type="hidden" name="idfabricacion" value="<?php if (isset($idfabricacion)) {
                                                                        echo $idfabricacion;
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">

                <div class="col-sm-8">
                    <div class="col">
                        <label for="producto" class="mr-sm-2">Producto:</label>
                        <select name="producto" id="producto" class="form-control mb-2 mr-sm-2" required>
                            <option value="">Seleccionar Producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto[0]; ?>" <?php if (isset($idproducto) && $idproducto == $producto[0]) {
                                                                                echo 'selected';
                                                                            } ?>>
                                    <?php echo $producto[1]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (!isset($idfabricacion)) : ?>
                        <div class="col">
                            <label for="cantidad" class="mr-sm-2">Cantidad:</label>
                            <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter Cantidad" id="cantidad" name="cantidad" min="1" required>
                        </div>
                    <?php endif; ?>
                    <div class="col">
                        <label for="ingrediente" class="mr-sm-2">Ingrediente:</label>
                        <select name="ingrediente" id="ingrediente" class="form-control mb-2 mr-sm-2" required>
                            <option value="">Seleccionar Ingrediente</option>
                            <?php foreach ($ingredientes as $ingrediente) : ?>
                                <option value="<?php echo $ingrediente[0]; ?>">
                                    <?php echo $ingrediente[1]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="cantidad2" class="mr-sm-2">Cantidad de Ingrediente:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter Cantidad Ingrediente" id="cantidad2" name="cantidad2" min="1" required>
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
                                <input type="submit" value="Registrar Fabricación" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
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
        <div class="row justify-content-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <header class="text-center">
                    <h1>Fabricación Generada</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Ingrediente</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php $indice = -1; ?>
                        <?php if (isset($detafabricacion)) : ?>
                            <?php foreach ($detafabricacion as $fabricacion) : ?>
                                <?php $fabricacionBorrar = $fabricacion[9]; ?>
                                <tr>
                                    <?php $indice = $fabricacion[0]; ?>
                                    <td><?php echo $fabricacion[1]; ?></td>
                                    <td>
                                        <img src="<?php echo 'fotos/' . $fabricacion[3]; ?>" alt="<?php echo $fabricacion[2]; ?>" title="<?php echo $fabricacion[2]; ?>" width="50px" height="50px">
                                    </td>
                                    <td><?php echo $fabricacion[4]; ?></td>
                                    <td>
                                        <img src="<?php echo 'fotos/' . $fabricacion[6]; ?>" alt="<?php echo $fabricacion[5]; ?>" title="<?php echo $fabricacion[5]; ?>" width="50px" height="50px">
                                    </td>
                                    <td><?php echo $fabricacion[7]; ?></td>
                                    <td><?php echo $fabricacion[8]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $fabricacion[0]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php require 'accion/fabricacion/modal-eliminar.php'; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php if (isset($detafabricacion)) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <a class="btn btn-danger" href="accion/fabricacion/eliminar-todo.php?idfabricacion=<?php echo $idfabricacion; ?>" role="button">
                                    Eliminar Todo
                                </a>
                            </div>
                            <?php if ($indice != -1) : ?>
                                <div class="col-sm-4">
                                    <a class="btn btn-info" href="accion/fabricacion/finalizar-fabricacion.php?idfabricacion=<?php echo $fabricacion[9] ?>&controlador=1">
                                        Ver Reporte
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($indice != -1) : ?>
                                <div class="col-sm-4">
                                    <a class="btn btn-primary" href="index.php?modulo=reporte-fabricacion&exito=Fabricación Finalizada&id=<?php echo $fabricacion[9]; ?>">
                                        Finalizar Fabricación
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endif; ?>


                    </div>
            </div>
            <div class="col-sm-2"></div>
        </div>

</main>