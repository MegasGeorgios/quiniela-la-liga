<div class="card mb-3">
  <div class="card-header">
    <form class="form-inline">
      <i class="fas fa-table"></i>
      Todos los resultados
      <div class="form-group" style="padding-left: 10px;">
        <select id="fixture" name="fixture" class="form-control">
          <option value="0">Todas las jornadas</option>
          <?php for($i=1; $i < 39; $i++) { ?>
            <option value="<?= $i ?>">Jornada <?= $i ?></option>.
          <?php } ?>
        </select>
      </div>
      <div class="form-group" style="padding-left: 10px; padding-right: 10px;">
        <select id="team" name="team" class="form-control">
          <option value="0">Todos los equipos</option>
          <?php for($i=1; $i < 21; $i++) { ?>
            <option value="<?= $i ?>">Equipo <?= $i ?></option>.
          <?php } ?>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" value="Buscar">
    </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Equipo local</th>
            <th>Resultado</th>
            <th>Equipo visitante</th>
            <th>Jornada</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Equipo local</th>
            <th>Resultado</th>
            <th>Equipo visitante</th>
            <th>Jornada</th>
            <th>Fecha</th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < 20; $i++) { ?>
            <tr>
              <td>
                <a href="page_admin.php?view=edit_team&team_id=<?= $i; ?>">Equipo<?= $i; ?>
                </a>
              </td>
              <td>
                <a href="page_admin.php?view=edit_result&result_id=<?= $i; ?>"><?= mt_rand(1,5).'-'.mt_rand(1,5);?>
                </a>
              </td>
              <td>
                <a href="page_admin.php?view=edit_team&team_id=<?= $i+1; ?>">Equipo<?= $i+1; ?>
                </a>
              </td>
              <td>
                <?= $i; ?>
              </td>
              <td>
                <?= date("Y-m-d", mt_rand(0, 500000000)); ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>