<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Todos los usuarios</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Registrado</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Registrado</th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < 100; $i++) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $i; ?>">Tiger Nixon <?= $i; ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $i; ?>">X<?= $i.mt_rand(100,900);?>Y</a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $i; ?>">tigernixon<?= $i;?>@hotmail.com</a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $i; ?>"><?= date("Y-m-d", mt_rand(0, 500000000)); ?></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>