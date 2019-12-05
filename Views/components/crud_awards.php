<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Premios</div>
      <div class="card-body">
        <form action="#add">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-5">
                <div class="form-group">
                    <input type="number" class="form-control" id="position" name="position" min="0" placeholder="Posicion">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                    <input type="number" class="form-control" id="award" name="award" min="0" placeholder="€">
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
        Todos los premios:
        <hr>
        <form action="#update">
        <?php for ($i=1; $i <= 3 ; $i++) { ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                    <input type="number" class="form-control" id="position" name="position" min="0" placeholder="Posicion" value="<?= $i; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <input type="number" class="form-control" id="award" name="award" min="0" placeholder="€" value="<?= $i*100; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Actualizar">
                  <a href="#delete" class=" btn btn-primary">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
      	<?php } ?>
        </form>
      </div>
    </div>
  </div>