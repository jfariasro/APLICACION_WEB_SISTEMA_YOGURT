<?php

require 'conexion.php';
if ($conexion->connect_errno) {
    die('Lo siento hubo un problema con el servidor');
} else {

    $consultar = "SELECT idproducto, nombre, imagen, stock, pvp from producto";
    $resultado = $conexion->query($consultar);

    $productos = $resultado->fetch_all();
}
?>
<div>
    <h1>Reporte de Productos</h1>
</div>

<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>PVP</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productos as $producto) {
        ?>
            <tr>
                <td><?php echo $producto[0]; ?></td>
                <td><?php echo $producto[1]; ?></td>
                <td>
                    <img src="fotos/<?php echo $producto[2]; ?>" alt="<?php echo $producto[1]; ?>" title="<?php echo $producto[1]; ?>" width="50px" height="50px">
                </td>
                <td><?php echo $producto[3]; ?></td>
                <td><?php echo $producto[4]; ?></td>
            </tr>
        <?php }

        ?>
    </tbody>
</table>

<?php $html = ob_get_clean(); ?>
<?php
include_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper("A4", "landingscape");
$pdf->render();
$pdf->stream();
?>