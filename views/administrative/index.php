<?php
    $user = $this->d['user'];
    $tasks = $this->d['tasks'];
    $tView = $this->d['tView'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Iconly---Bold.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Nunito.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Footer-Basic-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/home.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo"><a href="index.html"><img src="<?php echo constant('URL'); ?>assets/img/logo/logo-navibus.png" alt="Logo"></a></div>
                        <div class="toggler"><a class="d-block d-xl-none sidebar-hide" href="#"><i class="bi bi-x bi-middle"></i></a></div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menú</li>
                        <li class="sidebar-item"><a href="index.html" class="sidebar-link"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a></li>
                    </ul>
                </div><button class="btn sidebar-toggler x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            <header>
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
                                            <div class="avatar avatar-md"><img src="<?php echo constant('URL'); ?>assets/img/faces/default-administrative.png"></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">¡Hola, Marcelo!</h6><a class="dropdown-item" href="profile.html"><i class="icon-mid bi bi-person me-2"></i>Mi Perfil</a>
                                    <hr class="dropdown-divider"><a class="dropdown-item" href="<?php echo constant('URL'); ?>login/login.html"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <main id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-last order-md-1">
                                <h3>Estadísticas Generales</h3>
                                <p class="text-muted text-subtitle"></p>
                            </div>
                            <div class="col-12 col-md-6 order-first order-md-2">
                                <nav class="float-start float-lg-end breadcrumb-header" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <div class="new-task">
                        <div class="row">
                            <div class="col"><a class="btn btn-danger export-pdf" role="button" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-pdf">
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                    </svg>Exportar a PDF</a></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple"><i class="iconly-boldShow"></i></div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue"><i class="iconly-boldProfile"></i></div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green"><i class="iconly-boldAdd-User"></i></div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red"><i class="iconly-boldBookmark"></i></div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center"><svg class="bi text-primary" width="32" height="32" fill="blue" style="width: 10px;">
                                                        <use xlink:href="<?php echo constant('URL'); ?>assets/img/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"></use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center"><svg class="bi text-success" width="32" height="32" fill="blue" style="width: 10px;">
                                                        <use xlink:href="<?php echo constant('URL'); ?>assets/img/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"></use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center"><svg class="bi text-danger" width="32" height="32" fill="blue" style="width: 10px;">
                                                        <use xlink:href="<?php echo constant('URL'); ?>assets/img/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"></use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3"><div class="d-flex align-items-center"><div class="avatar avatar-md"><img src="images/faces/5.jpg"></div><p class="font-bold ms-3 mb-0">Si Cantik</p></div></td>
                                                        <td class="col-auto"><p class=" mb-0">Congratulations on your graduation!</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3"><div class="d-flex align-items-center"><div class="avatar avatar-md"><img src="images/faces/2.jpg"></div><p class="font-bold ms-3 mb-0">Si Ganteng</p></div></td>
                                                        <td class="col-auto"><p class=" mb-0">Wow amazing design! Can you make another                                                                tutorial for                                                                this design?</p></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl"><img src="images/faces/1.jpg" alt="Face 1"></div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">John Duck</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Recent Messages</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="d-flex recent-message px-4 py-3">
                                    <div class="avatar avatar-lg"><img src="images/faces/4.jpg"></div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="d-flex recent-message px-4 py-3">
                                    <div class="avatar avatar-lg"><img src="images/faces/5.jpg"></div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="d-flex recent-message px-4 py-3">
                                    <div class="avatar avatar-lg"><img src="images/faces/1.jpg"></div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4"><button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start Conversation</button></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
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
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/main.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/simple-datatables/simple-datatables.js"></script>
</body>

</html>