<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio de Sesión - Navibus</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Nunito.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/login.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-12 col-lg-5">

                <!-- Lado izquierdo -->
                <div id="auth-left">

                    <!-- Logo y título -->
                    <div class="auth-logo"><img src="<?php echo constant('URL'); ?>assets/img/logo/logo-navibus.png" alt="Logo" width="147" height="48"></div>
                    <h1 class="auth-title">Ingresa</h1>
                    <p class="auth-subtitle mb-5">Inicia sesión con tus credenciales de acceso.</p>
                    <?php $this->showMessages();?>

                    <!-- Formulario de inicio de sesión -->
                    <form action="<?php echo constant('URL'); ?>login/authenticate" method="post">
                        <div><?php (isset($this->errorMessage))?  $this->errorMessage : '' ?></div>

                        <!-- Input del nombre de usuario -->
                        <div id="usernameDiv" class="form-group position-relative has-icon-left mb-4">
                            <input id="username" class="form-control form-control form-control-xl" type="text" placeholder="Usuario" name="username" required autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <!-- Input de la contraseña -->
                        <div id="passwordDiv" class="form-group position-relative has-icon-left mb-4">
                            <input id="password" class="form-control form-control form-control-xl" type="password" placeholder="Contraseña" name="password" required autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <!-- Botón de inicio de sesión -->
                        <button id="login-btn" class="btn btn-primary btn-lg shadow-lg btn-block mt-3" type="submit">Iniciar sesión</button>

                        <!-- Link para recuperar contraseña -->
                        <div class="fs-4 text-center mt-5 text-lg">
                            <p><a id="forgot-pass" class="font-bold" href="#">¿Olvidó su contraseña?</a></p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Lado derecho -->
            <div class="col-lg-7 d-none d-lg-block" id="col-right">
                <div id="auth-right">
                    <!-- Carrusel -->
                    <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false" data-bs-keyboard="false" data-bs-touch="false" id="carousel-1">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo constant('URL'); ?>assets/img/bg/bg1.jpg" alt="Ferry de Navibus"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="<?php echo constant('URL'); ?>assets/img/bg/bg2.jpg" alt="Extremo de un ferry"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="<?php echo constant('URL'); ?>assets/img/bg/bg3.jpg" alt="Vista lateral de un ferry de Navibus"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/pages/log-in.js"></script>
</body>

</html>