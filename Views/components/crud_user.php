<div class="container">
  <div class="card card-register mx-auto mt-5">
    <?php if($_GET['view'] == 'add_user'){ $header="Añadir usuario"; }else{$header="Editar usuario";} ?>
    <div class="card-header"><?= $header ?></div>
    <div class="card-body">

      <?php if($_GET['view'] == 'add_user'){ ?>
      <form action="page_admin.php?view=store_user" method="POST">
      <?php }elseif ($_GET['view'] == 'edit_user') { ?>
        <form action="#update">
      <?php } ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" value="<?= isset($user['name']) ? $user['name'] : ''; ?>">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Apellidos" required="required" value="<?= isset($user['lastname']) ? $user['lastname'] : ''; ?>">
                <label for="lastName">Apellidos</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required="required" value="<?= isset($user['dni']) ? $user['dni'] : ''; ?>">
                <label for="dni">DNI</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Móvil" required="required" value="<?= isset($user['phone']) ? $user['phone'] : ''; ?>">
                <label for="phone">Móvil</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required" value="<?= isset($user['email']) ? $user['email'] : ''; ?>">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required="required">
                <label for="pass">Contraseña</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="confirmPass" name="confirmPass" class="form-control" placeholder="Confirmar contraseña" required="required">
                <label for="confirmPass">Confirmar contraseña</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <select id="rol_id" name="rol_id" class="form-control">
              <?php if (isset($user['rol'])) { ?>
                <option value="<?= $user['rol_id']; ?>" selected><?= $user['rol']; ?></option>
              <?php }else{ ?>
                <?php foreach ($roles as $rol) { ?>
                  <option value="<?= $rol['id']; ?>" selected><?= $rol['rol']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <?php if($_GET['view'] == 'add_user'){ ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        <?php }elseif ($_GET['view'] == 'edit_user') { ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
            <a href="#delete" class="btn btn-primary">Eliminar</a>
          </div>
        <?php } ?>
        
      </form>
    </div>
  </div>
</div>