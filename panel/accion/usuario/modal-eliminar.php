<!-- Ventana modal para eliminar -->
<?php require 'eliminar-usuario.php'; ?>

<div class="modal fade" id="eliminar<?php echo $usuario[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    ¿Realmente deseas eliminar el Usuario ?
                </h4>
            </div>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $usuario[0]; ?>">
                <div class="modal-body">
                    <strong style="text-align: center !important">
                        <?php echo $usuario[1]; ?>

                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Borrar" class="btn btn-danger">Eliminar Usuario</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana eliminar--->