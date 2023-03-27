<!-- Header -->
<header class="mb-3">
  <!-- Navbar del Header -->
  <nav class="navbar navbar-light navbar-expand">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Icono para cerrar/abrir sidebar -->
        <a class="d-flex burger-btn" href="#"><i class="fs-3 bi bi-justify"></i></a><button data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <!-- Logo del Header -->
        <div class="logo d-xl-none">
            <a href="<?php echo constant('URL'); ?>"><img src="<?php echo constant('URL'); ?>assets/img/logo/logo-navibus.png" alt="Logo"></a>
        </div>

        <!-- Dropdown del Perfil -->
        <div class="dropdown" id="dropdown-profile">
          <a class="dropdown-toggle d-flex" aria-expanded="false" data-bs-toggle="dropdown" href="#">
            <div class="user-menu d-flex">
              <!-- Datos del Usuario -->
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600"><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?></h6>
                <p class="mb-0 text-sm text-gray-600"><?php echo $user->getPosition(); ?></p>
              </div>
              <!-- Imagen del Usuario -->
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md"><img src="<?php echo constant('URL'); ?>assets/img/faces/default-admin.png"></div>
              </div>
            </div>
          </a>
          <!-- Opciones del Perfil -->
          <div class="dropdown-menu dropdown-menu-end">
            <h6 class="dropdown-header">¡Hola, <?php echo $user->getName(); ?>!</h6>
            <!-- Enlace al Perfil -->
            <a class="dropdown-item" href="<?php echo constant('URL'); ?>admin/profile"><i class="icon-mid bi bi-person me-2"></i>Mi perfil</a>
            <hr class="dropdown-divider">
            <!-- Enlace para Cerrar Sesión -->
            <a class="dropdown-item" href="<?php echo constant('URL'); ?>logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>