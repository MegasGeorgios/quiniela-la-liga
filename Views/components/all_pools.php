<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    <?php if (isset($_GET['view']) && $_GET['view']=='show_pools') { ?>
      Quinielas
    <?php }else{ ?>
      Tus quinielas
    <?php } ?>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Aciertos</th>
            <th>ESTADO</th>
            <th>Premio</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($pools)) { ?>
          <?php foreach ($pools as $index => $pool) { ?>
            <tr>
              <td><?= $index+1; ?></td>
              <?php $date = date_create($pool['created']); ?>
              <td><?= date_format($date, 'd-m-Y'); ?></td>
              <?php if (isset($_GET['view']) && $_GET['view']=='show_pools') { ?>
                <td><a href="page_admin.php?view=show_pool&pool_id=<?= $pool['pool_id']; ?>">
                  <?= $pool['successes'].'/'.$pool['num_matches']; ?></a>
                </td>
              <?php }else{ ?>
                <td><a href="home.php?view=pool&pool_id=<?= $pool['pool_id']; ?>">
                  <?= $pool['successes'].'/'.$pool['num_matches']; ?></a>
                </td>
              <?php } ?>
              <td><?= $pool['state']; // CERRADA/ABIERTA ?></td>
              <td><?= $pool['award']; ?></td>
            </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>