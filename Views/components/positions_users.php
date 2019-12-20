<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Puntuación usuarios
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido(s)</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Puntos</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido(s)</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Puntos</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if (isset($users)) { ?>
          <?php foreach($users as $index => $user) { ?>
            <tr>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $index+1; ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['name'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['lastname'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['dni'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['email'] ?></a></td>
              <td><a href="page_admin.php?view=edit_user&user_id=<?= $user['id']; ?>"><?= $user['points'] ?></a></td>
            </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>