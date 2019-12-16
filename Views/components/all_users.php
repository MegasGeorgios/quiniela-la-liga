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
          <?php foreach($users as $user) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['name'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['dni'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['email'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['created'] ?></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>