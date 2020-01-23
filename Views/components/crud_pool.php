<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
      <?php if ($_GET['view'] == 'add_pool') {?>
        Juega tu quiniela
      <?php }elseif ($_GET['view'] == 'pool'){ ?>
        Tus Pronósticos
      <?php }else{ ?>
        Pronósticos
      <?php } ?>
        <hr>
        <p>1 : Gana equipo local</p>
        <p>X : Empate</p>
        <p>2 : Gana equipo visitante</p>
      </div>
      
      <div class="card-body">
       
        <?php if (isset($matches)) { ?>
          <form action="home.php?view=store_pool" method="POST">
            <div class="form-group">
            <?php foreach($matches as $match) { ?>
              <div class="form-row">
                <div class="col-md-5">
                  <div class="form-label-group">
                    <p class="form-control"><?= $match['name_team_home']; ?></p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <select id="pool_results" name="pool_results[]" class="form-control" required="required">
                      <option value="1">1</option>
                      <option value="x">x</option>
                      <option value="2">2</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-label-group">
                    <p class="form-control"><?= $match['name_team_visit']; ?></p>
                  </div>
                </div>
              </div>
              <input type="hidden" name="matches_ids[]" value="<?= $match['match_id']; ?>">
            <?php } ?>
            </div>
            <div>
              <input type="submit" class="btn btn-primary" value="Añadir">
            </div>
          </form>
        <?php }elseif(!isset($matches)){ ?>
          <p>No hay partidos disponibles</p>
        <?php } ?>

        <?php if (isset($poolResults)) { ?>
            <div class="form-group">
            <?php foreach($poolResults as $pr) { ?>
              <div class="form-row">
                <div class="col-md-5">
                  <div class="form-label-group">
                    <p class="form-control"><?= $pr['name_team_home']; ?></p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <p class="form-control"><?= $pr['prognostic']; ?></p>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-label-group">
                    <p class="form-control"><?= $pr['name_team_visit']; ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>