<div class="container">
  <div class="card card-register mx-auto mt-5">
    <?php if($_GET['view'] == 'add_player' || $_GET['view'] == 'delete_player'){ $header="Añadir jugador"; }else{$header="Editar jugador";} ?>
    <div class="card-header"><?= $header ?></div>
    <div class="card-body">

      <?php if($_GET['view'] == 'add_player' || $_GET['view'] == 'delete_player'){ ?>
      <form action="page_admin.php?view=store_player" method="POST">
      <?php }elseif ($_GET['view'] == 'edit_player' || $_GET['view'] == 'update_player') { ?>
      <form action="page_admin.php?view=update_player&player_id=<?= $_GET['player_id']; ?>" method="POST">
      <?php } ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" autocomplete="off" value="<?= isset($player['name']) ? $player['name'] : ''; ?>">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="dorsal" name="dorsal" min="0" value="<?= isset($player['dorsal']) ? $player['dorsal'] : 0; ?>">
                  <label for="dorsal">Dorsal</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="goals" name="goals" min="0" value="<?= isset($player['goals']) ? $player['goals'] : 0; ?>">
                  <label for="goals">Goles</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="asists" name="asists" min="0" value="<?= isset($player['asists']) ? $player['asists'] : 0; ?>">
                  <label for="asists">Asist.</label>
              </div>
            </div>
          </div>
          <div class="form-row" style="margin-top: 15px;">
            <div class="col-md-12">
              <div class="form-group">
                <select id="team" name="team_id" class="form-control" style="height: 50px; top: 10px;">
                  <?php if (isset($player['name_team'])) { ?>
                  <option value="<?= $player['team_id']; ?>" selected><?= $player['name_team']; ?></option>
                  <?php } ?>
                  <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team['id']; ?>"><?= $team['name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            
          </div>
        </div>

        <?php if($_GET['view'] == 'add_player' || $_GET['view'] == 'delete_player'){ ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        <?php }elseif ($_GET['view'] == 'edit_player' || $_GET['view'] == 'update_player') { ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
            <a href="page_admin.php?view=delete_player&player_id=<?= $_GET['player_id']; ?>" class="btn btn-primary">Eliminar</a>
          </div>
        <?php } ?>
        
      </form>
    </div>
  </div>
</div>