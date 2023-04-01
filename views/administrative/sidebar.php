<!-- Sidebar -->
<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <!-- Header del Sidebar -->
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <!-- Logo del Sidebar -->
        <div class="logo">
          <a href="<?php echo constant('URL'); ?>"><img src="<?php echo constant('URL'); ?>assets/img/logo/logo-navibus.png" alt="Logo"></a>
        </div>
        <div class="toggler">
          <a class="d-block d-xl-none sidebar-hide" href="#"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <!-- Menú del Sidebar -->
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menú</li>
        <!-- Opción del Dashboard -->
        <li class="sidebar-item <?php if($dView) echo 'active' ?>">
          <a class="sidebar-link" href="<?php echo constant('URL'); ?>"><i class="bi bi-grid-fill"></i><span>Estadísticas generales</span></a>
        </li>
      </ul>
    </div><button class="btn sidebar-toggler x"><i data-feather="x"></i></button>
  </div>
</div>