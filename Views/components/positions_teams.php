<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Tabla de clasificación
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Equipo</th>
            <th>Goles marcados</th>
            <th>Goles concedidos</th>
            <th>Diferencial</th>
            <th>Puntos</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Equipo</th>
            <th>Goles marcados</th>
            <th>Goles concedidos</th>
            <th>Diferencial</th>
            <th>Puntos</th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < 20; $i++) { ?>
            <tr>
              <td><a href="#stats"><?= $i+1; ?></a></td>
              <td><a href="#stats">Equipo <?= $i; ?></a></td>
              <td><a href="#stats"><?= mt_rand(10,100);?></a></td>
              <td><a href="#stats"><?= mt_rand(10,100);?></a></td>
              <td><a href="#stats"><?= mt_rand(-10,10);?></a></td>
              <td><a href="#stats"><?= mt_rand(10,100);?></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">
    <form action="#update">
      <input type="submit" class="btn btn-primary" value="Actualizar tabla"> Updated yesterday at 11:59 PM
    </form>
  </div>
</div>