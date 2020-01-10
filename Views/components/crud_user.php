<div class="container">
  <div class="card card-register mx-auto mt-5">
    <?php if($_GET['view'] == 'add_user'){ $header="Añadir usuario"; $required="required";}else{$header="Editar usuario"; $required="";} ?>
    <div class="card-header"><?= $header ?></div>
    <div class="card-body">

      <?php 
      $url = $_SERVER['HTTP_REFERER'];
      $pos = strpos($url, 'home.php');
      
      // si estamos en la home
      if ($pos !== false) { ?>
        <form action="home.php?view=update_user&user_id=<?= $_GET['user_id']; ?>" method="POST">
      <?php }elseif($_GET['view'] == 'add_user'){ ?>
        <form action="page_admin.php?view=store_user" method="POST">
      <?php }elseif ($_GET['view'] == 'edit_user' || $_GET['view'] == 'update_user') { ?>
        <form action="page_admin.php?view=update_user&user_id=<?= $_GET['user_id']; ?>" method="POST">
      <?php } ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" autocomplete="off" value="<?= isset($user['name']) ? $user['name'] : ''; ?>">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Apellidos" autocomplete="off" required="required" value="<?= isset($user['lastname']) ? $user['lastname'] : ''; ?>">
                <label for="lastName">Apellidos</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" autocomplete="off" required="required" value="<?= isset($user['dni']) ? $user['dni'] : ''; ?>">
                <label for="dni">DNI</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Móvil" autocomplete="off" required="required" value="<?= isset($user['phone']) ? $user['phone'] : ''; ?>">
                <label for="phone">Móvil</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required="required" value="<?= isset($user['email']) ? $user['email'] : ''; ?>">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" <?= $required; ?> >
                <label for="pass">Contraseña</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="confirmPass" name="confirmPass" class="form-control" placeholder="Confirmar contraseña" <?= $required; ?> >
                <label for="confirmPass">Confirmar contraseña</label>
              </div>
            </div>
          </div>
        </div>
        <?php if (isset($user['rol'])) { ?>
          <?php if ($user['rol'] == "Administrador") { ?>
          <div class="form-group">
            <div class="form-label-group">
              <select id="rol_id" name="rol_id" class="form-control">
                  <option value="<?= $user['rol_id']; ?>" selected><?= $user['rol']; ?></option>
                  <?php foreach ($roles as $rol) { ?>
                    <option value="<?= $rol['id']; ?>"><?= $rol['rol']; ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <?php }else{ ?>
            <input type="hidden" name="rol_id" value="<?= $user['rol_id']; ?>" >
          <?php } ?>
        <?php } ?>

        <?php if($_GET['view'] == 'add_user'){ ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        <?php }elseif ($_GET['view'] == 'edit_user' || $_GET['view'] == 'update_user') { ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
            <?php if (isset($user['rol']) && $user['rol'] == "Administrador") { ?>
            <a href="page_admin.php?view=delete_user&user_id=<?= $_GET['user_id']; ?>" class="btn btn-primary">Eliminar</a>
            <?php } ?>
          </div>
        <?php } ?>
        
      </form>
    </div>
  </div>
</div>