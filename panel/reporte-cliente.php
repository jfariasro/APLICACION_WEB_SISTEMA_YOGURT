<?php

require 'conexion.php';
if ($conexion->connect_errno) {
    die('Lo siento hubo un problema con el servidor');
} else {

    $consultar = "SELECT idcliente, nombre, cedula, celular from cliente";
    $resultado = $conexion->query($consultar);

    $clientes = $resultado->fetch_all();
}
?>
<div>
    <h1>Reporte de Clientes</h1>
</div>
<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Cédula</th>
            <th>Celular</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($clientes as $cliente) {
        ?>
            <tr>
                <td><?php echo $cliente[0]; ?></td>
                <td><?php echo $cliente[1]; ?></td>
                <td><?php echo $cliente[2]; ?></td>
                <td><?php echo $cliente[3]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php $html = ob_get_clean(); ?>
<?php
include_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper("A4", "portrait");
$pdf->render();
$pdf->stream('reporte-clientes.pdf', ['Attachment' => true]);