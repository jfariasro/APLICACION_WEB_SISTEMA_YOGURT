<!--ventana para Update--->
<?php require 'editar-usuario.php'; ?>

<div class="modal fade" id="editar<?php echo $usuario[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="hidden" name="id" value="<?php echo $usuario[0]; ?>">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">
                        <label for="nombre" class="mr-sm-2">Usuario:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Usuario" id="nombre" name="nombre" onkeypress="return validarTexto(event)" value="<?php echo $usuario[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="clave" class="mr-sm-2">Clave:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter Clave" id="clave" name="clave" value="">
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