<?php

require '../../conexion.php';
if ($conexion->connect_errno) {
    die('Lo siento hubo un problema con el servidor');
} else {

    $consultar = "select df.iddetallefabricacion, i.nombre, 
    df.cant_ingrediente, df.precio, p.nombre,
    f.cantidad, f.fecha
    from detalle_fabricacion df join ingrediente i
        on df.idingrediente = i.idingrediente
        join fabricacion f on f.idfabricacion = df.idfabricacion
        join producto p on p.idproducto = f.idproducto
    where df.idfabricacion = '" . $_REQUEST['idfabricacion'] . "'";
    $resultado = $conexion->query($consultar);

    $detafabricacion = $resultado->fetch_all();
}
?>
<div>
    <h1>Reporte de Fabricación</h1>
</div>

<table style="width: 750px;margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Ingrediente</th>
            <th>Cantidad</th>
            <th>Precio Ingrediente</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($detafabricacion as $fabricacion) {
            $fecha = $fabricacion[6];
            $producto = $fabricacion[4];
            $cantidad = $fabricacion[5]
        ?>
            <tr>
                <td><?php echo $fabricacion[0]; ?></td>
                <td><?php echo $fabricacion[1]; ?></td>
                <td><?php echo $fabricacion[2]; ?></td>
                <td><?php echo $fabricacion[3]; ?></td>
            </tr>
        <?php }

        ?>
    </tbody>
</table>
<div>
    <p>
        <strong>Producto: <?php echo $producto; ?></strong>
    </p>
    <p>
        <strong>Cantidad: <?php echo $cantidad; ?></strong>
    </p>
    <p>
        <strong>Fecha: <?php echo $fecha; ?></strong>
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