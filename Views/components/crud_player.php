<div class="container">
  <div class="card card-register mx-auto mt-5">
    <?php if($_GET['view'] == 'add_player'){ $header="Añadir jugador"; }else{$header="Editar jugador";} ?>
    <div class="card-header"><?= $header ?></div>
    <div class="card-body">

      <?php if($_GET['view'] == 'add_player'){ ?>
      <form action="#add">
      <?php }elseif ($_GET['view'] == 'edit_player') { ?>
        <form action="#update">
      <?php } ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" value="<?= isset($nombre) ? $nombre : ''; ?>">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="dorsal" name="dorsal" min="0" value="<?= isset($dorsal) ? $dorsal : 0; ?>">
                  <label for="dorsal">Dorsal</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="goals" name="goals" min="0" value="<?= isset($goals) ? $goals : 0; ?>">
                  <label for="goals">Goles</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-label-group">
                  <input type="number" class="form-control" style="height: 50px;" id="asists" name="asists" min="0" value="<?= isset($asists) ? $asists : 0; ?>">
                  <label for="asists">Asist.</label>
              </div>
            </div>
          </div>
          <div class="form-row" style="margin-top: 15px;">
            <div class="col-md-12">
              <div class="form-group">
                <select id="team" name="team" class="form-control" style="height: 50px; top: 10px;">
                  <?php for($i=1; $i < 21; $i++) { ?>
                    <option value="<?= $i ?>">Equipo <?= $i ?></option>.
                  <?php } ?>
                </select>
              </div>
            </div>
            
          </div>
        </div>

        <?php if($_GET['view'] == 'add_player'){ ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Añadir">
          </div>
        <?php }elseif ($_GET['view'] == 'edit_player') { ?>
          <div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
            <a href="#delete" class="btn btn-primary">Eliminar</a>
          </div>
        <?php } ?>
        
      </form>
    </div>
  </div>
</div>