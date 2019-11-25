<div class="container">
    <div class="card card-register mx-auto mt-5">
      <?php if($_GET['view'] == 'add_team'){ $header="Añadir equipo"; }else{$header="Actualizar equipo";} ?>
      <div class="card-header"><?= $header ?></div>
      <div class="card-body">
        <?php if($_GET['view'] == 'add_team'){ ?>
          <form action="#add">
        <?php }elseif ($_GET['view'] == 'edit_team') { ?>
          <form action="#update">
        <?php } ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-7">
                <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" value="<?php isset($name) ? $name : ''; ?>">
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="slug" name="slug" class="form-control" placeholder="Abreviación del nombre" required="required" value="<?php isset($slug) ? $slug : ''; ?>">
                  <label for="slug">Abreviación del nombre(slug)</label>
                </div>
              </div>
            </div>
          </div>
          <?php if($_GET['view'] == 'add_team'){ ?>
            <div>
              <input type="submit" class="btn btn-primary" value="Añadir">
            </div>
          <?php }elseif ($_GET['view'] == 'edit_team') { ?>
            <div>
              <input type="submit" class="btn btn-primary" value="Actualizar">
              <a href="#delete" class="btn btn-primary">Eliminar</a>
            </div>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>