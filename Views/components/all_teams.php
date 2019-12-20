<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Todos los equipos</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Slug</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nombre</th>
            <th>Slug</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if (isset($teams)) { ?>
          <?php foreach($teams as $team) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_team&team_id=<?= $team['id'];?>"><?= $team['name']; ?></a></td>
              <td><a href="page_admin.php?view=edit_team&team_id=<?= $team['id'];?>"><?= $team['slug']; ?></a></td>
            </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>