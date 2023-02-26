<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminar<?php echo $venta[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    ¿Realmente deseas eliminar La Venta Seleccionada ?
                </h4>
            </div>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $venta[0]; ?>">
                <input type="hidden" name="idv" value="<?php echo $venta[8]; ?>">
                <div class="modal-body">
                    <strong style="text-align: center !important">
                        Eliminar Venta <?php echo $venta[0]; ?>

                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Borrar" class="btn btn-danger">Eliminar Venta</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana eliminar--->