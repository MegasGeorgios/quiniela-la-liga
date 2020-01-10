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
          <?php if (isset($players))
          {  
            include_once('templates/tpl_top_players.php'); 
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>