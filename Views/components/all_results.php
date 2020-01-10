<div class="card mb-3">
  <div class="card-header">
    <?php 
    $url = $_SERVER['HTTP_REFERER'];
    $pos = strpos($url, 'home.php');
    
    if ($pos === false) { ?>
      <form class="form-inline" action="page_admin.php?view=all_results" method="POST">
    <?php }else{ ?>
      <form class="form-inline" action="home.php?view=all_results" method="POST">
    <?php } ?>
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
        <select id="team" name="team_id" class="form-control">
          <option value="0">Todos los equipos</option>
          <?php if (isset($teams)) { ?>
          <?php foreach($teams as $team) { ?>
            <option value="<?= $team['id'];?>"><?= $team['name']; ?></option>.
          <?php } ?>
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
        <?php if (isset($matches)) 
        {  
            include_once('templates/tpl_all_results.php'); 
        } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>