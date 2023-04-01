<?php
    $user = $this->d['user'];
    $tasks = $this->d['tasks'];
    $tView = $this->d['tView'];
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

            <main id="main-content">

                <!-- Cabecera de la Página -->
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <!-- Título de la Página -->
                            <div class="col-12 col-md-6 order-last order-md-1">
                                <h3>Panel de tareas</h3>
                            </div>
                            <!-- Breadcrumb de la Página -->
                            <div class="col-12 col-md-6 order-first order-md-2">
                                <nav class="float-start float-md-end breadcrumb-header" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><span>Panel de tareas</span></li>
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

                            <!-- Tareas por Hacer -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Por hacer</h4>
                                    </div>
                                    <div class="card-body" id="porHacer">
                                        <?php
                                        foreach($tasks as $task){
                                            if($task->getStatus() == 'Por hacer'){ ?>

                                                <!-- Link para abrir el modal con la información de la tarea -->
                                                <a class="a-task-info" href="#taskInfo-<?php echo $task->getTaskId(); ?>" data-id="<?php echo $task->getTaskId(); ?>" data-status="<?php echo $task->getStatus(); ?>" data-bs-toggle="modal" role="button">
                                                    <div class="tasks">
                                                        <h6 class="text-truncate"><?php echo $task->getTitle(); ?></h6>
                                                        <div class="d-flex task-user"><img class="rounded-circle flex-shrink-0 me-3 fit-cover task-user_image" width="50" height="50" src="<?php echo constant('URL'); ?>assets/img/faces/default.png" draggable="false">
                                                            <div class="task-user_name">
                                                                <p class="fw-bold mb-0"><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></p>
                                                                <p class="text-muted mb-0"><?php echo $task->getUserPosition(); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Modal con la información de la Tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="taskInfo-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel-4"><?php echo $task->getTitle(); ?></h5><button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>
                                                                        <div class="col-12 modal-task_details">
                                                                            <div class="table-responsive">
                                                                                <table class="table mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th colspan="2">Detalles</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Asignado a:</td>
                                                                                            <td><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Creado por:</td>
                                                                                            <td><?php echo $task->getUserCreatedName(); ?> <?php echo $task->getUserCreatedLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Estado:</td>
                                                                                            <td><?php echo $task->getStatus(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prioridad:</td>
                                                                                            <td><?php echo $task->getPriority(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Lapso:</td>
                                                                                            <td><?php echo $task->getLapse(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Duración estimada:</td>
                                                                                            <td><?php echo $task->getHours(); ?> horas</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Embarcación:</td>
                                                                                            <td><?php echo $task->getShip(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de creación:</td>
                                                                                            <td><?php echo $task->getCreatedAt(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Última edición:</td>
                                                                                            <td><?php echo $task->getUpdatedAt(); ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tareas en Curso -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">En curso</h4>
                                    </div>
                                    <div class="card-body" id="enCurso">
                                        <?php
                                        foreach($tasks as $task){
                                            if($task->getStatus() == 'En curso'){ ?>

                                                <!-- Link para abrir el modal con la información de la tarea -->
                                                <a class="a-task-info" href="#taskinfo-<?php echo $task->getTaskId(); ?>" data-id="<?php echo $task->getTaskId(); ?>" data-status="<?php echo $task->getStatus(); ?>" data-bs-toggle="modal" role="button">
                                                    <div class="tasks">
                                                        <h6 class="text-truncate"><?php echo $task->getTitle(); ?></h6>
                                                        <div class="d-flex task-user"><img class="rounded-circle flex-shrink-0 me-3 fit-cover task-user_image" width="50" height="50" src="<?php echo constant('URL'); ?>assets/img/faces/default.png" draggable="false">
                                                            <div class="task-user_name">
                                                                <p class="fw-bold mb-0"><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></p>
                                                                <p class="text-muted mb-0"><?php echo $task->getUserPosition(); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Modal con la información de la Tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="taskinfo-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel-4"><?php echo $task->getTitle(); ?></h5><button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>
                                                                        <div class="col-12 modal-task_details">
                                                                            <div class="table-responsive">
                                                                                <table class="table mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th colspan="2">Detalles</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Asignado a:</td>
                                                                                            <td><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Creado por:</td>
                                                                                            <td><?php echo $task->getUserCreatedName(); ?> <?php echo $task->getUserCreatedLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Estado:</td>
                                                                                            <td><?php echo $task->getStatus(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prioridad:</td>
                                                                                            <td><?php echo $task->getPriority(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Lapso:</td>
                                                                                            <td><?php echo $task->getLapse(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Duración estimada:</td>
                                                                                            <td><?php echo $task->getHours(); ?> horas</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Embarcación:</td>
                                                                                            <td><?php echo $task->getShip(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de creación:</td>
                                                                                            <td><?php echo $task->getCreatedAt(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Última edición:</td>
                                                                                            <td><?php echo $task->getUpdatedAt(); ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tareas Finalizadas -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Finalizadas</h4>
                                    </div>
                                    <div class="card-body" id="finalizadas">
                                        <?php
                                        foreach($tasks as $task){
                                            if($task->getStatus() == 'Finalizada'){ ?>

                                                <!-- Link para abrir el modal con la información de la tarea -->
                                                <a class="a-task-info" href="#taskinfo-<?php echo $task->getTaskId(); ?>" data-id="<?php echo $task->getTaskId(); ?>" data-status="<?php echo $task->getStatus(); ?>" data-bs-toggle="modal" role="button">
                                                    <div class="tasks">
                                                        <h6 class="text-truncate"><?php echo $task->getTitle(); ?></h6>
                                                        <div class="d-flex task-user"><img class="rounded-circle flex-shrink-0 me-3 fit-cover task-user_image" width="50" height="50" src="<?php echo constant('URL'); ?>assets/img/faces/default.png" draggable="false">
                                                            <div class="task-user_name">
                                                                <p class="fw-bold mb-0"><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></p>
                                                                <p class="text-muted mb-0"><?php echo $task->getUserPosition(); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Modal con la información de la Tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="taskinfo-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel-4"><?php echo $task->getTitle(); ?></h5><button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>
                                                                        <div class="col-12 modal-task_details">
                                                                            <div class="table-responsive">
                                                                                <table class="table mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th colspan="2">Detalles</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Asignado a:</td>
                                                                                            <td><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Creado por:</td>
                                                                                            <td><?php echo $task->getUserCreatedName(); ?> <?php echo $task->getUserCreatedLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Estado:</td>
                                                                                            <td><?php echo $task->getStatus(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prioridad:</td>
                                                                                            <td><?php echo $task->getPriority(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Lapso:</td>
                                                                                            <td><?php echo $task->getLapse(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Duración estimada:</td>
                                                                                            <td><?php echo $task->getHours(); ?> horas</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Embarcación:</td>
                                                                                            <td><?php echo $task->getShip(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de creación:</td>
                                                                                            <td><?php echo $task->getCreatedAt(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Última edición:</td>
                                                                                            <td><?php echo $task->getUpdatedAt(); ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tareas Aprobadas -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Aprobadas</h4>
                                    </div>
                                    <div class="card-body" id="aprobadas">
                                        <?php
                                        foreach($tasks as $task){
                                            if($task->getStatus() == 'Aprobada'){ ?>

                                                <!-- Link para abrir el modal con la información de la tarea -->
                                                <a class="a-task-info" href="#taskinfo-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" role="button">
                                                    <div class="tasks">
                                                        <h6 class="text-truncate"><?php echo $task->getTitle(); ?></h6>
                                                        <div class="d-flex task-user"><img class="rounded-circle flex-shrink-0 me-3 fit-cover task-user_image" width="50" height="50" src="<?php echo constant('URL'); ?>assets/img/faces/default.png" draggable="false">
                                                            <div class="task-user_name">
                                                                <p class="fw-bold mb-0"><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></p>
                                                                <p class="text-muted mb-0"><?php echo $task->getUserPosition(); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Modal con la información de la Tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="taskinfo-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Header del modal -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel-4"><?php echo $task->getTitle(); ?></h5><button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Body del modal -->
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">

                                                                        <!-- Descripción de la tarea -->
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>

                                                                        <!-- Tabla con los detalles de la tarea -->
                                                                        <div class="col-12 modal-task_details">
                                                                            <div class="table-responsive">
                                                                                <table class="table mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th colspan="2">Detalles</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Asignado a:</td>
                                                                                            <td><?php echo $task->getUserFirstName(); ?> <?php echo $task->getUserLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Creado por:</td>
                                                                                            <td><?php echo $task->getUserCreatedName(); ?> <?php echo $task->getUserCreatedLastName(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Estado:</td>
                                                                                            <td><?php echo $task->getStatus(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prioridad:</td>
                                                                                            <td><?php echo $task->getPriority(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Lapso:</td>
                                                                                            <td><?php echo $task->getLapse(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Duración estimada:</td>
                                                                                            <td><?php echo $task->getHours(); ?> horas</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Embarcación:</td>
                                                                                            <td><?php echo $task->getShip(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de creación:</td>
                                                                                            <td><?php echo $task->getCreatedAt(); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Última edición:</td>
                                                                                            <td><?php echo $task->getUpdatedAt(); ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
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
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/axios/axios.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sortablejs/Sortable.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/pages/operator-task.js"></script>
</body>

</html>