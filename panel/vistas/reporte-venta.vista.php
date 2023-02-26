<main style="margin-top: 20px; margin-bottom: 20px;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-6">
                <header class="text-center">
                    <h1>Reporte Venta</h1>
                </header>

                <table class="table table-responsive table-hover text-center">
                    <thead>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Reporte</th>
                    </thead>

                    <tbody>
                        <?php foreach ($ventas as $venta) : ?>
                            <tr>
                                <td><?php echo $venta[0]; ?></td>
                                <td><?php echo $venta[1]; ?></td>
                                <td><?php echo $venta[2]; ?></td>
                                <td>
                                    <a class="btn btn-info" href="accion/venta/finalizar-venta.php?idventa=<?php echo $venta[0] ?>">
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
                            <a class="btn btn-primary" href="index.php?modulo=reporte-venta">
                                Ver Todo
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
</main>