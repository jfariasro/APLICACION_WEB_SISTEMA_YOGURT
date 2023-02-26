<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminar<?php echo $fabricacion[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    ¿Realmente deseas eliminar La Fabricación Seleccionada ?
                </h4>
            </div>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $fabricacion[0]; ?>">
                <input type="hidden" name="idf" value="<?php echo $fabricacion[9]; ?>">
                <div class="modal-body">
                    <strong style="text-align: center !important">
                        Eliminar Fabricación <?php echo $fabricacion[0]; ?>

                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Borrar" class="btn btn-danger">Eliminar Fabricación</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana eliminar--->