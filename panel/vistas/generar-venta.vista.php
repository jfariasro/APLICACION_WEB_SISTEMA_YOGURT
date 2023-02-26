<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Control de Ingresos en la Asociación Fernandito</h1>
        </header>

        <form method="POST">
            <div class="row">
                <div class="col-sm-2"></div>
                <input type="hidden" name="idventa" value="<?php if (isset($idventa)) {
                                                                echo $idventa;
                                                            } else {
                                                                echo '';
                                                            } ?>">

                <div class="col-sm-8">
                    <div class="col">
                        <label for="cliente" class="mr-sm-2">Cliente:</label>
                        <select name="cliente" id="cliente" class="form-control mb-2 mr-sm-2" required>
                            <option value="">Seleccionar Cliente</option>
                            <?php foreach ($clientes as $cliente) : ?>
                                <option value="<?php echo $cliente[0]; ?>" <?php if (isset($idcliente) && $idcliente == $cliente[0]) {
                                                                                echo 'selected';
                                                                            } ?>>
                                    <?php echo $cliente[1]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="producto" class="mr-sm-2">Producto:</label>
                        <select name="producto" id="producto" class="form-control mb-2 mr-sm-2" required>
                            <option value="">Seleccionar Producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto[0]; ?>">
                                    <?php echo $producto[1]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="cantidad" class="mr-sm-2">Cantidad:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter Cantidad" id="cantidad" name="cantidad" min="1" required>
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
                                <input type="submit" value="Registrar Venta" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
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
                    <h1>Venta Generada</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php $indice = -1; ?>
                        <?php if (isset($detaventas)) : ?>
                            <?php foreach ($detaventas as $venta) : ?>
                                <?php $ventaBorrar = $venta[8]; ?>
                                <tr>
                                    <?php $indice = $venta[0]; ?>
                                    <td><?php echo $venta[1]; ?></td>
                                    <td><?php echo $venta[2]; ?></td>
                                    <td>
                                        <img src="<?php echo 'fotos/' . $venta[4]; ?>" alt="<?php echo $venta[3]; ?>" title="<?php echo $venta[3]; ?>" width="50px" height="50px">
                                    </td>
                                    <td><?php echo $venta[5]; ?></td>
                                    <td><?php echo $venta[6]; ?></td>
                                    <td><?php echo $venta[7]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $venta[0]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php require 'accion/venta/modal-eliminar.php'; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php if (isset($detaventas)) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <a class="btn btn-danger" href="accion/venta/eliminar-todo.php?idventa=<?php echo $idventa; ?>" role="button">
                                    Eliminar Todo
                                </a>
                            </div>
                            <?php if ($indice != -1) : ?>
                                <div class="col-sm-4">
                                    <a class="btn btn-info" href="accion/venta/finalizar-venta.php?idventa=<?php echo $venta[8] ?>&controlador=1">
                                        Ver Reporte
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($indice != -1) : ?>
                                <div class="col-sm-4">
                                    <a class="btn btn-primary" href="index.php?modulo=reporte-venta&exito=Venta Finalizada&id=<?php echo $venta[8]; ?>">
                                        Finalizar Venta
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