<?php

require '../../conexion.php';
if ($conexion->connect_errno) {
    die('Lo siento hubo un problema con el servidor');
} else {

    $consultar = "select dv.iddetalleventa, v.fecha, c.nombre, p.nombre,
    dv.cantidad, dv.precio, dv.subtotal
    from
    detalle_venta dv join producto p
    on dv.idproducto = p.idproducto
    join venta v on v.idventa = dv.idventa
    join cliente c on c.idcliente = v.idcliente
    where dv.idventa = '" . $_REQUEST['idventa'] . "'";
    $resultado = $conexion->query($consultar);

    $detaventas = $resultado->fetch_all();
}
?>
<div>
    <h1>Reporte de Ventas</h1>
</div>

<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $total = 0;
        foreach ($detaventas as $venta) {
            $fecha = $venta[1];
            $cliente = $venta[2];
            $total = $total + $venta[6];
        ?>
            <tr>
                <td><?php echo $venta[0]; ?></td>
                <td><?php echo $venta[3]; ?></td>
                <td><?php echo $venta[4]; ?></td>
                <td><?php echo $venta[5]; ?></td>
                <td><?php echo $venta[6]; ?></td>
            </tr>
        <?php }

        ?>
    </tbody>
</table>
<div>
    <p>
        <strong>Total: <?php echo $total; ?></strong>
    </p>
    <p>
        <strong>Fecha: <?php echo $fecha; ?></strong>
    </p>
    <p>
        <strong>Cliente: <?php echo $cliente; ?></strong>
    </p>
</div>

<?php $html = ob_get_clean(); ?>
<?php
include_once "../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper("A4", "landingscape");
$pdf->render();
$pdf->stream();
?>