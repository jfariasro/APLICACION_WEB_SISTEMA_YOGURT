<main style="margin-top: 20px;">
    <div class="container">
        <header class="text-center">
            <h1>Formulario de Usuarios</h1>
        </header>

        <form method="POST">
            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-8">
                    <div class="col">
                        <label for="nombre" class="mr-sm-2">Usuario:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Nombre" id="nombre" name="nombre" onkeypress="return validarTexto(event)" required>
                    </div>
                    <div class="col">
                        <label for="clave" class="mr-sm-2">Clave:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter Clave" id="clave" name="clave" required>
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
                                <input type="submit" value="Registrar Usuario" class="btn btn-success btn-block form-control mb-2 mr-sm-2" name="Enviar">
                            </div>
                            <div class="col">
                                <a href="index.php?modulo=usuario" class="btn btn-danger btn-block form-control mb-2 mr-sm-2">Cancelar</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>

        </form>


        <header class="text-center">
            <h1>Tabla de Usuarios</h1>
        </header>

        <table class="table table-hover">
            <thead>
                <th>#</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </thead>

            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario[0]; ?></td>
                        <td><?php echo $usuario[1]; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $usuario[0]; ?>">
                                <i class="fas fa-pencil" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $usuario[0]; ?>">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <?php require 'accion/usuario/modal-editar.php'; ?>

                    <?php require 'accion/usuario/modal-eliminar.php'; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</main>