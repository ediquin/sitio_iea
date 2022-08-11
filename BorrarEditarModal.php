<!-- Ventana Editar Registros CRUD -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit_<?php echo $row['id']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
        <form class="needs-validation" novalidate method="POST" action="procesos/editarRegistro.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
    
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationTooltip01">Nombres</label>
                <input type="text" class="form-control" id="validationTooltip01" placeholder="nombres" name="nombres" value="<?php echo $row['apellidos']; ?>" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationTooltip02">Apellidos</label>
                <input type="text" class="form-control" id="validationTooltip02" placeholder="apellidos" name="apellidos" value="<?php echo $row['nombres']; ?>" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-8 mb-3">
                <label for="validationTooltip03">Correo electrónico</label>
                <input type="text" class="form-control" id="validationTooltip03" placeholder="<?php echo $row['correo']; ?>" name="correo" required>
                <div class="invalid-tooltip">
                  Correo electrónico inválido
                </div>
              </div>
              
              <div class="form-group col-md-4 mb-3">
                <label for="inputState">Cargo</label>
                <select id="inputState" class="form-control" name="puesto">
                  <option <?php echo ($row['puesto'] == "Pasante")?"selected":"";?>>Pasante</option>
                  <option <?php echo ($row['puesto'] == "Docente investigador")?"selected":"";?>>Docente investigador</option>
                  <option <?php echo ($row['puesto'] == "Tesista")?"selected":"";?>>Tesista</option>
                  <option <?php echo ($row['puesto'] == "Administrativo")?"selected":"";?>>Administrativo</option>
                </select>
              </div>
              <div class="form-row">
              <div class="mb-3">
              <label for="formFile" class="form-label">Foto de perfil</label>
              <input class="form-control" accept="image/*" type="file" id="formFile" name="foto">
              </div>
              <div class="mb-3"><img class="img-thumbnail" width="100px" src="imagen/<?php echo $row['foto'];?>" alt=""></div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          	</div>
          </form>
          </div>
          
        </div>
      </div>
</div>
    




<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrar usuario</h5>	
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
				
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombres'].' '.$row['apellidos']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="procesos/borrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>
