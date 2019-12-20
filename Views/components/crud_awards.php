<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Premios</div>
      <div class="card-body">
        <form action="page_admin.php?view=store_award" method="POST">
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
        <?php if (isset($awards) && !empty($awards)) { ?>
        <?php foreach ($awards as $award) { ?>
          <form action="page_admin.php?view=update_award" method="POST">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="number" class="form-control" id="position-<?= $award['id']; ?>" name="position" min="0" placeholder="Posicion" value="<?= $award['position']; ?>">
                      <label for="position-<?= $award['id']; ?>">Posicion</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="number" class="form-control" id="award-<?= $award['id']; ?>" name="award" min="0" placeholder="€" value="<?= $award['award']; ?>">
                      <label for="award-<?= $award['id']; ?>">€</label>
                  </div>
                </div>
                <input type="hidden" name="award_id" value="<?= $award['id']; ?>">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar" style="height: 50px;">
                    <a href="page_admin.php?view=delete_award&award_id=<?= $award['id']; ?>" class=" btn btn-primary" style="height: 50px; padding-top: 12px;">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
      	<?php } ?>
        <?php }else{ ?>
          <p>No hay premios almacenados en base de datos!</p>
        <?php } ?>
      </div>
    </div>
  </div>