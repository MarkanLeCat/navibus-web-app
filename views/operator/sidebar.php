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
        <!-- Opción del Panel de Tareas -->
        <li class="sidebar-item <?php if($tView) echo 'active' ?>">
          <a class="sidebar-link" href="<?php echo constant('URL'); ?>"><i class="bi bi-grid-fill"></i><span>Panel de tareas</span></a>
        </li>
        <!-- Opción de la Vista de Lapsos -->
        <li class="sidebar-item <?php if($lView) echo 'active' ?>">
          <a href="<?php echo constant('URL'); ?>operator/lapses" class="sidebar-link"><i class="bi bi-bar-chart-steps"></i><span>Panel de lapsos</span></a>
        </li>
      </ul>
    </div><button class="btn sidebar-toggler x"><i data-feather="x"></i></button>
  </div>
</div>