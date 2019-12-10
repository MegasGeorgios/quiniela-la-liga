<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    <?php 
    if($_GET['view'] == 'all_players-goals'){ 
      $header="Tabla de goleo"; 
      $cTable="Goles";
    }else{
      $header="Tabla de asistencias";
      $cTable="Asistencias";
    } 
    echo $header;
    ?>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dorsal</th>
            <th>Equipo</th>
            <th><?= $cTable; ?></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dorsal</th>
            <th>Equipo</th>
            <th><?= $cTable; ?></th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < 10; $i++) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $i; ?>"><?= $i+1; ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $i; ?>">Player <?= $i; ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $i; ?>"><?= mt_rand(1,30);?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $i; ?>">Equipo <?= $i; ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $i; ?>"><?= mt_rand(1,30); ?></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>