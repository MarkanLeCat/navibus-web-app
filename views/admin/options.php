<?php
    $user = $this->d['user'];
    $tView = $this->d['tView'];
    $lView = $this->d['lView'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Opciones - Navibus</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Iconly---Bold.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Nunito.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Footer-Basic-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/home.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/options.css">
</head>

<body id="page-top">
    <!-- Cuerpo de la App -->
    <div id="app">

        <!-- Llamada al Sidebar -->
        <?php require 'sidebar.php'; ?>

        <div id="main" class="layout-navbar">

            <!-- Llamada al Header -->
            <?php require 'header.php'; ?>

            <!-- Cabecera de la Página -->
            <main id="main-content">
                <div class="container-fluid">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <!-- Título de la Página -->
                                <div class="col-12 col-md-6 order-last order-md-1">
                                    <h3>Opciones</h3>
                                    <p class="text-muted text-subtitle"></p>
                                </div>
                                <!-- Breadcrumb de la Página -->
                                <div class="col-12 col-md-6 order-first order-md-2">
                                    <nav class="float-start float-md-end breadcrumb-header" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo constant('URL'); ?>"><span>Panel de usuarios</span></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><span>Opciones</span></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido de la Página -->
                    <?php $this->showMessages();?>
                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Sección para exportar base de datos -->
                            <div class="card shadow mb-3 export-db">
                                <div class="card-header py-3">
                                    <p class="fw-bold text-center text-primary m-0">Crear respaldo de la base de datos</p>
                                </div>

                                <!-- Formulario de Usuario -->
                                <div class="card-body">
                                    <form action="<?php echo constant('URL'); ?>admin/createDBBackup" method="POST">
                                        

                                        <div class="mb-3 text-center">
                                            <button id="save-basics" class="btn btn-primary btn-sm" type="submit">Crear respaldo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">

                            <div class="card shadow mb-3 import-db">
                                <div class="card-header py-3">
                                    <p class="fw-bold text-primary m-0 text-center">Importar respaldo de la base de datos</p>
                                </div>

                                <div class="card-body">
                                    <form action="<?php echo constant('URL'); ?>admin/importDBBackup" method="POST" enctype='multipart/form-data'>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-2">
                                                    <label class="form-label form-label" for="sqlBackup"><strong>Archivo .sql de respaldo:</strong></label>
                                                    <input class="form-control form-control" type="file" id="sqlBackup" name="database" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button id="save-basics" class="btn btn-primary btn-sm" type="submit" name="import" value="Import">Importar respaldo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Footer -->
                <?php require 'views/footer.php'; ?>
            </main>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/pages/profile.js"></script>
</body>