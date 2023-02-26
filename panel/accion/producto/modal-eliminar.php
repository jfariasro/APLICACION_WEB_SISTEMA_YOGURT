<!-- Ventana modal para eliminar -->
<?php require 'eliminar-producto.php'; ?>

<div class="modal fade" id="eliminar<?php echo $producto[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    ¿Realmente deseas eliminar el Producto ?
                </h4>
            </div>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $producto[0]; ?>">
                <div class="modal-body">
                    <strong style="text-align: center !important">
                        <?php echo $producto[1]; ?>

                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Borrar" class="btn btn-danger">Eliminar Producto</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana eliminar--->