<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    <?php 
    if($_GET['view'] == 'all_players-goals'){ 
      $header="Top goleadores"; 
    }else{
        $header="Top asistidores";
    } 
    echo $header;?></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dorsal</th>
            <th>Equipo</th>
            <?php if($_GET['view'] == 'all_players-goals'){ ?>
            <th>Goles</th>
            <?php }else{ ?>
            <th>Asistencias</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($players)) { ?>
          <?php foreach($players as $index => $player) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $index+1 ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['name'] ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['dorsal'] ?></a></td>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['name_team'] ?></a></td>
              <!--Si estamos en la vista de top goleadores pintamos los goles si no las asistencias-->
              <?php if($_GET['view'] == 'all_players-goals'){ ?>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['goals'] ?></a></td>
              <?php }else{ ?>
              <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['asists'] ?></a></td>
              <?php } ?>
            </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>