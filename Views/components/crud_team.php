<div class="container">
    <div class="card card-register mx-auto mt-5">
      <?php if($_GET['view'] == 'add_team'){ $header="Añadir equipo"; }else{$header="Editar equipo";} ?>
      <div class="card-header"><?= $header ?></div>
      <div class="card-body">
        <?php if($_GET['view'] == 'add_team'){ ?>
          <form action="page_admin.php?view=store_team" method="POST">
        <?php }elseif ($_GET['view'] == 'edit_team' || $_GET['view'] == 'update_team') { ?>
          <form action="page_admin.php?view=update_team&team_id=<?= $_GET['team_id']; ?>" method="POST">
        <?php } ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-7">
                <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" autocomplete="off" value="<?= isset($team['name']) ? $team['name'] : ''; ?>" >
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="slug" name="slug" class="form-control" placeholder="Abreviación del nombre" autocomplete="off" required="required" value="<?= isset($team['name']) ? $team['slug'] : ''; ?>" >
                  <label for="slug">Abreviación del nombre(slug)</label>
                </div>
              </div>
            </div>
          </div>
          <?php if($_GET['view'] == 'add_team'){ ?>
            <div>
              <input type="submit" class="btn btn-primary" value="Añadir">
            </div>
          <?php }elseif ($_GET['view'] == 'edit_team' || $_GET['view'] == 'update_team') { ?>
            <div>
              <input type="submit" class="btn btn-primary" value="Actualizar">
              <a href="page_admin.php?view=delete_team&team_id=<?= $_GET['team_id']; ?>" class="btn btn-primary">Eliminar</a>
            </div>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>