
<div class="container">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="procesos/agregarNuevo.php" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationTooltip01">Nombres</label>
                <input type="text" class="form-control" id="validationTooltip01" placeholder="nombres" name="nombres" value="" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationTooltip02">Apellidos</label>
                <input type="text" class="form-control" id="validationTooltip02" placeholder="apellidos" name="apellidos" value="" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationTooltip03">Correo electrónico</label>
                <input type="text" class="form-control" id="validationTooltip03" name="correo" placeholder="Correo electrónico" required>
                <div class="invalid-tooltip">
                  Correo electrónico inválido
                </div>
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="validationTooltipUsername">Id-huella</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">#</span>
                  </div>
                  <input type="text" class="form-control" id="validationTooltipUsername" name="id_huella" placeholder="Rango: 1-1000" aria-describedby="validationTooltipUsernamePrepend" required>
                  <div class="invalid-tooltip">
                    Por favor ingresa números entre 1 y 1000
                  </div>
                </div>
              </div>
              <div class="form-group col-md-3 mb-3">
                <label for="inputState">Cargo</label>
                <select id="inputState" class="form-control" name="cargo">
                  <option value="" selected>Seleccione...</option>
                  <option value="Pasante">Pasante</option>
                  <option value="Docente Investigador">Docente investigador</option>
                  <option value="Tesista">Tesista</option>
                  <option value="Administrativo">Administrativo</option>
                </select>
              </div>
    
            </div>
            <div class="form-row">
              <div class="mb-3">
              <label for="formFile" class="form-label">Foto de perfil</label>
              <input class="form-control" accept="image/*" type="file" id="formFile" name="foto">
              </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar datos</button>
            </div>
          </form>
          </div>
          
        </div>
      </div>
    </div>
    

  </div>
