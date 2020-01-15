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
            <th>*V</th>
            <th>*E</th>
            <th>*D</th>
            <th>*VL</th>
            <th>*EL</th>
            <th>*DL</th>
            <th>*VV</th>
            <th>*EV</th>
            <th>*DV</th>
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
            <th>*V</th>
            <th>*E</th>
            <th>*D</th>
            <th>*VL</th>
            <th>*EL</th>
            <th>*DL</th>
            <th>*VV</th>
            <th>*EV</th>
            <th>*DV</th>
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
              <td><?= $team['winsLocal'] ?></td>
              <td><?= $team['drawsLocal'] ?></td>
              <td><?= $team['losesLocal'] ?></td>
              <td><?= $team['winsVisit'] ?></td>
              <td><?= $team['drawsVisit'] ?></td>
              <td><?= $team['losesVisit'] ?></td>
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
  <div class="card-footer small text-muted">*V = Victorias, *E = Empates, *D = Derrotas</div>
  <div class="card-footer small text-muted">*VL = Victorias como local, *EL = Empates como local, *DL = Derrotas como local</div>
  <div class="card-footer small text-muted">*VV = Victorias como visitante, *EV = Empates como visitante, *DV = Derrotas como visitante</div>
</div>