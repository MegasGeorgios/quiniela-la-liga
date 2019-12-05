<div class="container">
    <div class="card card-register mx-auto mt-5">
      <?php if($_GET['view'] == 'add_result'){ $header="Añadir resultados"; }else{$header="Editar resultado";} ?>
      <div class="card-header"><?= $header ?></div>
      <div class="card-body">
      <?php if ($_GET['view'] == 'add_result') { ?>
        <form action="#fixture">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10">
                <div class="form-label-group">
                  <select id="fixture" name="fixture" class="form-control">
                    <option value="0">Seleccionar Jornada</option>
                    <?php for($i=1; $i < 39; $i++) { ?>
                      <option value="<?= $i ?>">Jornada <?= $i ?></option>.
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-primary" value="Buscar">
              </div>
            </div>
          </div>
        </form>
        <?php } ?>
       
        <?php if (isset($matches)) { ?>
          <form action="#add">
            <div class="form-group">
            <?php for ($i=0; $i <20 ; $i++) { ?>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    <p class="form-control">Equipo local</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" class="form-control" style="padding-top: 7px;" id="score_home" name="score_home[]" min="0">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" class="form-control" style="padding-top: 7px;" id="score_visit" name="score_visit[]" min="0">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <p class="form-control">Equipo visitante</p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
            <div>
              <input type="submit" class="btn btn-primary" value="Añadir">
            </div>
          </form>
        <?php } ?>

        <?php if ($_GET['view'] == 'edit_result') { ?>
          <form action="#update">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    <p class="form-control">Equipo local</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" class="form-control" style="padding-top: 7px;" id="score_home" name="score_home[]" min="0">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" class="form-control" style="padding-top: 7px;" id="score_visit" name="score_visit[]" min="0">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <p class="form-control">Equipo visitante</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <input type="submit" class="btn btn-primary" value="Actualizar">
              <a href="#delete" class="btn btn-primary">Eliminar</a>
            </div>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>