<!--ventana para Update--->
<?php require 'editar-cliente.php'; ?>

<div class="modal fade" id="editar<?php echo $cliente[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="hidden" name="id" value="<?php echo $cliente[0]; ?>">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">
                        <label for="nombre" class="mr-sm-2">Cliente:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter cliente" id="nombre" name="nombre" value="<?php echo $cliente[1]; ?>" onkeypress="return validarTexto(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula" class="mr-sm-2">Cédula:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Cédula" id="cedula" name="cedula" minlength="10" maxlength="10" value="<?php echo $cliente[2]; ?>" onkeypress="return validarNumero(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="celular" class="mr-sm-2">Celular:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Celular" id="celular" name="celular" minlength="10" maxlength="10" value="<?php echo $cliente[3]; ?>" onkeypress="return validarNumero(event)" required>
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