<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Añadir partidos por jornada</div>
      <div class="card-body">
        <form action="page_admin.php?view=store_match" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <select id="fixture" name="fixture" class="form-control">
                    <option value="0">Seleccionar Jornada</option>
                    <?php for($i=1; $i < 39; $i++) { ?>
                      <option value="<?= $i ?>">Jornada <?= $i ?></option>.
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
            <?php for($i=1; $i < 3; $i++) { ?> 
              <div class="col-md-3">
                <div class="form-label-group">
                  <select class="form-control" name="homeTeams[]">
                    <option value="0">Equipo local</option>
                    <?php foreach ($teams as $team) { ?> 
                    <option value="<?= $team['id'].'-'.$team['name'] ?>"><?= $team['name'] ?></option>
                    <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <select class="form-control" name="visitTeams[]">
                    <option value="0">Equipo visitante</option>
                    <?php foreach ($teams as $team) { ?> 
                    <option value="<?= $team['id'].'-'.$team['name'] ?>"><?= $team['name'] ?></option>
                    <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="date" class="form-control" style="padding-top: 6px;" name="match_dates[]" 
                  value="<?= date("Y-m-d"); ?>" 
                  min="2019-08-01" max="2020-07-01">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="time" class="form-control" style="padding-top: 6px;" name="match_times[]" 
                  value="<?= date("H:i"); ?>">
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        </form>
      </div>
    </div>
  </div>