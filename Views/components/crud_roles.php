<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Roles</div>
      <div class="card-body">
        <form action="page_admin.php?view=store_rol" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10">
                <div class="form-group">
                  <input type="text" id="rol" name="rol" class="form-control" placeholder="Rol" required="required" autofocus="autofocus" autocomplete="off">
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

        <?php if (isset($roles) && !empty($roles)) { ?>
        <?php foreach ($roles as $rol) { ?>
          <form action="page_admin.php?view=update_rol" method="POST">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input type="text" id="rol-<?= $rol['id']; ?>" name="rol" class="form-control" placeholder="Rol" autocomplete="off" required="required" value="<?= $rol['rol']; ?>">
                    <input type="hidden" name="rol_id" value="<?= $rol['id']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                    <a href="page_admin.php?view=delete_rol&rol_id=<?= $rol['id']; ?>" class=" btn btn-primary">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <?php } ?>
        <?php }else{ ?>
          <p>No hay roles almacenados en base de datos!</p>
        <?php } ?>
      </div>
    </div>
  </div>