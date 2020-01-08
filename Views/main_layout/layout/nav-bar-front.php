<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <?php session_start(); ?>
    <a class="navbar-brand mr-1" href="home.php">Bienvenido <?php echo $_SESSION['user_name']; ?> !</a>
    <a class="navbar-brand mr-1 left-nav" href="#">La Liga</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_results">Calendario</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_players-goals">Goleadores</a>
    <a class="navbar-brand mr-1 left-nav" href="home.php?view=all_players-asists">Asistidores</a>
    <a class="navbar-brand mr-1 left-nav" href="#">Mis quinielas</a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-12">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="home.php?view=edit_user&user_id=<?= $_SESSION['user_id']; ?>">Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="page_admin.php?view=logout">Cerrar sesión</a>
        </div>
      </li>      
    </ul>

  </nav>