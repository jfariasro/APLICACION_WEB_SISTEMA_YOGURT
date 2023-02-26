<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Formulario de Clientes</h1>
        </header>

        <form method="POST">
            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-8">
                    <div class="col">
                        <label for="nombre" class="mr-sm-2">Cliente:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Nombre" id="nombre" name="nombre" onkeypress="return validarTexto(event)" required>
                    </div>
                    <div class="col">
                        <label for="cedula" class="mr-sm-2">Cédula:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Cédula" id="cedula" name="cedula" onkeypress="return validarNumero(event)" minlength="10" maxlength="10" required>
                    </div>
                    <div class="col">
                        <label for="celular" class="mr-sm-2">Celular:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Celular" id="celular" name="celular" minlength="10" maxlength="10" onkeypress="return validarNumero(event)" required>
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
                                <input type="submit" value="Registrar Cliente" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
                            </div>
                            <div class="col">
                                <a href="index.php?modulo=cliente" class="btn btn-danger btn-block form-control mb-2 mr-sm-2">Cancelar</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>

        </form>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <header class="text-center">
                    <h1>Tabla de Clientes</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Celular</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td><?php echo $cliente[0]; ?></td>
                                <td><?php echo $cliente[1]; ?></td>
                                <td><?php echo $cliente[2]; ?></td>
                                <td><?php echo $cliente[3]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $cliente[0]; ?>">
                                        <i class="fas fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $cliente[0]; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>

                            <?php require 'accion/cliente/modal-editar.php'; ?>

                            <?php require 'accion/cliente/modal-eliminar.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container">
                    <a class="btn btn-info" target="_blank" href="reporte-cliente.php" role="button">
                        Imprimir Reporte
                    </a>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>

</main>