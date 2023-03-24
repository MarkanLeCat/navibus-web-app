<?php
    $user = $this->d['user'];
    $lapses = $this->d['lapses'];
    $tasks = $this->d['tasks'];
    $lView = $this->d['lView'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panel de tareas - Navibus</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Iconly---Bold.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Nunito.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/Footer-Basic-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/home.css">
</head>

<body>
    <!-- Cuerpo de la App -->
    <div id="app">

        <!-- Llamada al Sidebar -->
        <?php require 'sidebar.php'; ?>
        <div id="main" class="layout-navbar">

            <!-- Llamada al Header -->
            <?php require 'header.php'; ?>

            <!-- Cabecera de la Página -->
            <main id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <!-- Título de la Página -->
                            <div class="col-12 col-md-6 order-last order-md-1">
                                <h3>Lapsos de tiempo</h3>
                                <p class="text-muted text-subtitle"></p>
                            </div>
                            <!-- Breadcrumb de la Página -->
                            <div class="col-12 col-md-6 order-first order-md-2">
                                <nav class="float-start float-md-end breadcrumb-header" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo constant('URL'); ?>"><span>Panel de tareas</span></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><span>Panel de lapsos</span></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido de la Página -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!-- Lista de Lapsos -->
                                <div class="card lapse-card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lista de Lapsos</h4>
                                    </div>
                                    <div class="card-body">

                                        <!-- List Group donde van los lapsos, donde cada lapso es un botón -->
                                        <div class="list-group lapse-list">
                                            <?php foreach ($lapses as $lapse) { ?>

                                                <!-- Botón de un Lapso -->
                                                <button class="list-group-item list-group-item-action modal-lapse_body" type="button" data-bs-toggle="modal" data-bs-target="#lapseInfo<?php echo $lapse->getLapseId(); ?>" title="<?php echo $lapse->getLapseName(); ?>"><span><?php echo $lapse->getLapseName(); ?></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye-fill float-end">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                                                    </svg>
                                                </button>

                                                <!-- Modal con la información del lapso y sus tareas -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="lapseInfo<?php echo $lapse->getLapseId(); ?>" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen" role="document">
                                                        <div class="modal-content">
        
                                                            <!-- Header del Modal -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel-1"><?php echo $lapse->getLapseName(); ?></h5><button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
        
                                                            <!-- Cuerpo del Modal -->
                                                            <div class="modal-body modal-lapse_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
        
                                                                        <!-- DataTable con las Tareas del Lapso -->
                                                                        <div class="col-12 modal-lapse_description">
                                                                            <h6>Tareas</h6>
                                                                            <div>
                                                                                <table class="table table-striped" id="dataTable<?php echo $lapse->getLapseId(); ?>">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Título</th>
                                                                                            <th>Asignado a</th>
                                                                                            <th>Creado por</th>
                                                                                            <th>Estado</th>
                                                                                            <th>Fecha creación</th>
                                                                                            <th>Últ. actualización</th>
                                                                                        </tr>
                                                                                    </thead>
        
                                                                                    <!-- Cuerpo del DataTable -->
                                                                                    <tbody>
                                                                                        <?php 
                                                                                        $lapseTasks = $tasks->getAllTasksByUserAndLapseId($user->getId(), $lapse->getLapseId());
        
                                                                                        foreach($lapseTasks as $task) { ?>
                                                                                            <tr>
                                                                                                <td><?php echo $task->getTaskTitle(); ?></td>
                                                                                                <td><?php echo $task->getTaskUserFirstName(); ?> <?php echo $task->getTaskUserLastName(); ?></td>
                                                                                                <td><?php echo $task->getTaskUserCreatedName(); ?> <?php echo $task->getTaskUserCreatedLastName(); ?></td>
                                                                                                <td><span class="badge <?php 
                                                                                                    switch($task->getStatus()) {
                                                                                                        case 'Por hacer':
                                                                                                            echo 'bg-warning';
                                                                                                            break;
                                                                                                        case 'En curso':
                                                                                                            echo 'bg-primary';
                                                                                                            break;
                                                                                                        case 'Finalizada':
                                                                                                            echo 'bg-info';
                                                                                                            break;
                                                                                                        case 'Aprobada':
                                                                                                            echo 'bg-success';
                                                                                                            break;
                                                                                                    }
                                                                                                ?>"><?php echo $task->getStatus(); ?></span></td>
                                                                                                <td><?php echo $task->getTaskCreatedAt(); ?></td>
                                                                                                <td><?php echo $task->getTaskUpdatedAt(); ?></td>
                                                                                            </tr>
                                                                                        <?php
                                                                                        } ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Tabla de Detalles del Lapso -->
                                                                        <div class="col-12 modal-lapse_details">
                                                                            <div class="table-responsive">
                                                                                <table class="table mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th colspan="2">Detalles</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Creado por:</td>
                                                                                            <td><?php echo $lapse->getUserFirstName(); ?> <?php echo $lapse->getUserLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Categoría:</td>
                                                                                            <td><?php echo $lapse->getCategory(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Inicio:</td>
                                                                                            <td><?php echo $lapse->getInitial(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fin:</td>
                                                                                            <td><?php echo $lapse->getEnd(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Embarcación:</td>
                                                                                            <td><?php echo $lapse->getShip(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de creación:</td>
                                                                                            <td><?php echo $lapse->getCreatedAt(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Última edición:</td>
                                                                                            <td><?php echo $lapse->getUpdatedAt(); ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Footer del Modal -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                                                                <!-- Botón para exportar el lapso a PDF -->
                                                                <!-- <a class="btn btn-danger d-flex align-items-center export-pdf" role="button" target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-pdf">
                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                                                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                                                    </svg>Exportar a PDF
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>
                                        </div>

                                        <!-- Botón para exportar a PDF -->
                                        <!-- <button class="btn btn-danger d-flex float-end align-items-center export-pdf" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-pdf">
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                                <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                            </svg>Exportar a PDF
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            
            <!-- Footer -->
            <?php require 'views/footer.php'; ?>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>

    <!-- Script para crear los datatables -->
    <?php foreach ($lapses as $lapse) { ?>
        <script>
            // Simple Datatable
            let dataTable<?php echo $lapse->getLapseId(); ?> = document.querySelector('#dataTable<?php echo $lapse->getLapseId(); ?>');
            let dataTable = new simpleDatatables.DataTable(dataTable<?php echo $lapse->getLapseId(); ?>);
        </script>
    <?php
    } ?>
</body>

</html>