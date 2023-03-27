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
    <title>Perfil - Navibus</title>
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
                                    <h3>Perfil</h3>
                                    <p class="text-muted text-subtitle"></p>
                                </div>
                                <!-- Breadcrumb de la Página -->
                                <div class="col-12 col-md-6 order-first order-md-2">
                                    <nav class="float-start float-md-end breadcrumb-header" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo constant('URL'); ?>"><span>Panel de tareas</span></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><span>Perfil</span></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido de la Página -->
                    <?php $this->showMessages();?>
                    <div class="row">

                        <!-- Imagen del Perfil -->
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow card-user-image">
                                    <img class="rounded-circle mb-3 mt-4" src="<?php echo constant('URL'); ?>assets/img/faces/default.png" width="160" height="160">
                                    <h4 class="fw-bold text-secondary"><?php echo $user->getName();?> <?php echo $user->getLastname();?></h4>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-8">

                            <!-- Datos del Perfil -->
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="fw-bold text-primary m-0">Datos básicos</p>
                                </div>

                                <!-- Formulario de Usuario -->
                                <div class="card-body">
                                    <form action="<?php echo constant('URL'); ?>operator/updateUserData" method="POST">
                                        <div class="row">
                                            <!-- Input nombre de usuario -->
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label form-label" for="username"><strong>Nombre de usuario</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="username" name="username" disabled="" autocomplete="off" value="<?php echo $user->getUsername(); ?>">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input correo electrónico -->
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label form-label" for="email"><strong>Correo electrónico</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="email" id="email" name="email" autocomplete="off" disabled="" value="<?php echo $user->getEmail();?>">
                                                        <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Input nombre -->
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label form-label" for="first_name"><strong>Nombre</strong></label>
                                                    <div id="firstnameDiv" class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="first_name" name="firstname" value="<?php echo $user->getName();?>" autocomplete="off" required="">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input apellido -->
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label form-label" for="last_name"><strong>Apellido</strong></label>
                                                    <div id="lastnameDiv" class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="last_name" name="lastname" autocomplete="off" required="" value="<?php echo $user->getLastname();?>">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Input número de teléfono -->
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label form-label" for="first_name"><strong>Número de teléfono</strong></label>
                                                    <div id="phoneDiv" class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="phone" name="phone" value="<?php echo $user->getPhone();?>" autocomplete="off" required="">
                                                        <div class="form-control-icon"><i class="bi bi-telephone"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button id="save-basics" class="btn btn-primary btn-sm" type="submit">Guardar cambios</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <!-- Actualización de Contraseña -->
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Actualizar contraseña</p>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo constant('URL'); ?>operator/updateUserPassword" method="POST">
                                        <div class="mb-3"><label class="form-label" for="current-password"><strong>Contraseña actual</strong></label>
                                            <div id="current-password-div" class="form-group position-relative has-icon-left"><input class="form-control" type="password" id="current-password" name="current-password" placeholder="Contraseña actual" required="" minlength="8" title="La contraseña debe tener al menos 8 caracteres, 1 minúscula, 1 mayúsculas y 1 símbolo." autocomplete="off">
                                                <div class="form-control-icon"><i class="bi bi-shield-shaded"></i></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div id="new-password-div" class="mb-3"><label class="form-label" for="new-password"><strong>Nueva contraseña</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control" type="password" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" id="new-password" name="new-password" placeholder="Nueva contraseña" required="" minlength="8" title="La contraseña debe tener al menos 8 caracteres, 1 minúscula, 1 mayúsculas, 1 número y 1 símbolo." autocomplete="off">
                                                        <div class="form-control-icon"><i class="bi bi-shield-lock"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div id="confirm-password-div" class="mb-3"><label class="form-label" for="confirm-password"><strong>Confirmar contraseña</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control" type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar contraseña" required="" minlength="8" autocomplete="off">
                                                        <div class="form-control-icon"><i class="bi bi-shield-check"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button id="save-password" class="btn btn-primary btn-sm" type="submit">Cambiar contraseña</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php require 'views/footer.php'; ?>
            </main>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/pages/profile.js"></script>
</body>