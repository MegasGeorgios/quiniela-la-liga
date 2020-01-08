<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Bienvenido <?php echo $_SESSION['user_name']; ?> !</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-12">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="home.php">Ir al sitio</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="page_admin.php?view=logout">Cerrar sesión</a>
          <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>-->
        </div>
      </li>      
    </ul>

  </nav>