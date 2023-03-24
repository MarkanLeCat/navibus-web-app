<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Perfil - Navibus</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/Iconly---Bold.css">
    <link rel="stylesheet" href="../assets/css/Nunito.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/iconly/bold.css">
    <link rel="stylesheet" href="../assets/css/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/css/app.css">
    <link rel="stylesheet" href="../assets/css/Footer-Basic-icons.css">
    <link rel="stylesheet" href="../assets/css/pages/home.css">
</head>

<body id="page-top">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo"><a href="index.html"><img src="../assets/img/logo/logo-navibus.png" alt="Logo"></a></div>
                        <div class="toggler"><a class="d-block d-xl-none sidebar-hide" href="#"><i class="bi bi-x bi-middle"></i></a></div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menú</li>
                        <li class="sidebar-item"><a href="index.html" class="sidebar-link"><i class="bi bi-grid-fill"></i><span>Panel de Usuarios</span></a></li>
                    </ul>
                </div><button class="btn sidebar-toggler x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                <nav class="navbar navbar-light navbar-expand">
                    <div class="container-fluid"><a class="d-block burger-btn" href="#"><i class="fs-3 bi bi-justify"></i></a><button data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><h6 class="dropdown-header">Mail</h6></li>
                                        <li><a class="active dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><h6 class="dropdown-header">Notifications</h6></li>
                                        <li><a class="active dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown" id="dropdown-profile"><a class="dropdown-toggle d-flex" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Marcelo Millán</h6>
                                            <p class="mb-0 text-sm text-gray-600">2do Oficial</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md"><img src="../assets/img/faces/default-admin.png"></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">¡Hola, Marcelo!</h6><a class="dropdown-item" href="profile.html"><i class="icon-mid bi bi-person me-2"></i>Mi Perfil</a>
                                    <hr class="dropdown-divider"><a class="dropdown-item" href="../login/login.html"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <main id="main-content">
                <div class="container-fluid">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-6 order-last order-md-1">
                                    <h3>Perfil</h3>
                                    <p class="text-muted text-subtitle"></p>
                                </div>
                                <div class="col-12 col-md-6 order-first order-md-2">
                                    <nav class="float-start float-lg-end breadcrumb-header" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><span>Panel de Usuarios</span></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><span>Perfil</span></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="../assets/img/faces/default-admin.png" width="160" height="160">
                                    <h4 class="fw-bold text-secondary">Marcelo Millán</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="fw-bold text-primary m-0">Datos Básicos</p>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label form-label" for="username"><strong>Nombre de Usuario</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="username" name="username" disabled="" autocomplete="off" value="Nombre de Usuario">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label form-label" for="email"><strong>Correo Electrónico</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="email" id="email" name="email" autocomplete="off" required="" value="correo@mail.com">
                                                        <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label form-label" for="first_name"><strong>Nombre</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="first_name" name="first_name" value="Nombre" autocomplete="off" required="">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label form-label" for="last_name"><strong>Apellido</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="last_name" name="last_name" autocomplete="off" required="" value="Apellido">
                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label form-label" for="first_name"><strong>Número de Teléfono</strong></label>
                                                    <div class="form-group position-relative has-icon-left"><input class="form-control form-control" type="text" id="phone" name="phone" value="Teléfono" autocomplete="off" required="">
                                                        <div class="form-control-icon"><i class="bi bi-telephone"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Guardar Cambios</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="text-center">
                    <div class="container text-muted py-2">
                        <p class="mb-3">Inversiones Naviera del Caribe C.A. - RIF: J-29755030-5</p>
                        <ul class="list-inline">
                            <li class="list-inline-item me-4"><a href="https://www.facebook.com/Navibus/" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a></li>
                            <li class="list-inline-item me-4"><a href="https://twitter.com/Navibus/" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter"></i></a></li>
                            <li class="list-inline-item me-4"><a href="https://www.instagram.com/navibusoficial/" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a></li>
                        </ul>
                        <p class="mb-0">Copyright © 2023 Marcelo Millán</p>
                    </div>
                </footer>
            </main>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/js/main.js"></script>
    <script src="../assets/js/vendors/simple-datatables/simple-datatables.js"></script>
</body>

</html>