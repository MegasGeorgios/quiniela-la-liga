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
            <th>Victorias</th>
            <th>Empates</th>
            <th>Derrotas</th>
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
            <th>Victorias</th>
            <th>Empates</th>
            <th>Derrotas</th>
            <th>Goles marcados</th>
            <th>Goles concedidos</th>
            <th>Diferencial</th>
            <th>Puntos</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($standing as $index => $team) { ?>
            <tr>
              <td><?= $index+1; ?></td>
              <td><?= $team['teamName'] ?></td>
              <td><?= $team['wins'] ?></td>
              <td><?= $team['draws'] ?></td>
              <td><?= $team['loses'] ?></td>
              <td><?= $team['goalsF'] ?></td>
              <td><?= $team['goalsC'] ?></td>
              <td><?= $team['diffGoals'] ?></td>
              <td><?= $team['points'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>