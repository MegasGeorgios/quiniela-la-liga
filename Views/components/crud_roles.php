<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Roles</div>
      <div class="card-body">
        <form action="#add">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10">
                <div class="form-group">
                  <input type="text" id="rol" name="rol" class="form-control" placeholder="Rol" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Añadir">
                </div>
              </div>
            </div>
          </div>
        </form>
        <hr>
        Todos los roles:
        <hr>
        <form action="#update">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" id="rol" name="rol" class="form-control" placeholder="Nombre" required="required" value="<?= 'Administrador'  ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Actualizar">
                  <a href="#delete" class=" btn btn-primary">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" id="rol" name="rol" class="form-control" placeholder="Nombre" required="required" value="<?= 'Editor'  ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Actualizar">
                  <a href="#delete" class=" btn btn-primary">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>