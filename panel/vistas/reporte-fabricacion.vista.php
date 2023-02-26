<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-6">
                <header class="text-center">
                    <h1>Reporte Fabricación</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Reporte</th>
                    </thead>

                    <tbody>
                        <?php foreach ($fabricaciones as $fabricacion) : ?>
                            <tr>
                                <td><?php echo $fabricacion[0]; ?></td>
                                <td><?php echo $fabricacion[1]; ?></td>
                                <td><?php echo $fabricacion[2]; ?></td>
                                <td><?php echo $fabricacion[3]; ?></td>
                                <td>
                                    <a class="btn btn-info" href="accion/fabricacion/finalizar-fabricacion.php?idfabricacion=<?php echo $fabricacion[0] ?>">
                                        Ver Reporte
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                <?php if (isset($_REQUEST['id'])) : ?>
                    <div class="container">
                        <div class="col">
                            <a class="btn btn-primary" href="index.php?modulo=reporte-fabricacion">
                                Ver Todo
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
</main>