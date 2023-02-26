<!--ventana para Update--->
<?php require 'editar-ingrediente.php'; ?>

<div class="modal fade" id="editar<?php echo $ingrediente[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title text-center h3">
                    Actualizar Información
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $ingrediente[0]; ?>">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">
                        <label for="nombre" class="mr-sm-2">Producto:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Producto" id="nombre" name="nombre" value="<?php echo $ingrediente[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stock" class="mr-sm-2">Stock:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter Stock" id="stock" name="stock" min="1" value="<?php echo $ingrediente[3]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio" class="mr-sm-2">Precio:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" step="0.01" placeholder="Enter Precio" id="precio" name="precio" min="0.1" value="<?php echo $ingrediente[4]; ?>" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="Editar" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->