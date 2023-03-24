<?php
    $user = $this->d['user'];
    $tasks = $this->d['tasks'];
    $users = $this->d['users'];
    $lapses = $this->d['lapses'];
    $tView = $this->d['tView'];
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
                <?php $this->showMessages();?>
                <section class="section">

                    <!-- Nuevas tareas -->
                    <div class="new-task">
                        <div class="row">

                            <div class="col">
                                <!-- Botón para crear una nueva tarea -->
                                <button class="btn btn-primary d-flex align-items-center float-end" type="button" data-bs-target="#createTask" data-bs-toggle="modal"><i class="bi bi-plus-circle"></i>Crear nueva tarea</button>
                                
                                <!-- Modal con formulario para crear nueva tarea -->
                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="createTask" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">

                                            <!-- Cabecera del modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel-5">Crear una nueva tarea</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Cuerpo del modal -->
                                            <div class="modal-body">
                                                <!-- Inicio del formulario para crear una nueva tarea -->
                                                <form action="<?php echo constant('URL'); ?>tasks/createTask" method="POST">

                                                    <!-- Input del título de la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label form-label" for="taskName"><strong>Título de la tarea</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control" type="text" id="taskName" name="taskname" autocomplete="off" placeholder="Nombre de la tarea" required="" maxlength="100">
                                                            <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la descripción de la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="taskDescription"><strong>Descripción de la tarea</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <textarea class="form-control" id="taskDescription" name="taskdescription" placeholder="Descripción de la tarea..." autocomplete="off" spellcheck="true" required="" maxlength="200"></textarea>
                                                            <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la categoría de la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="taskCategory"><strong>Categoría</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="taskCategory" name="taskcategory" required="">
                                                                <option value="" selected="">Seleccione la categoría</option>
                                                                <option value="1">Diaria</option>
                                                                <option value="2">Semanal</option>
                                                                <option value="3">Mensual</option>
                                                                <option value="4">Trimestral</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input del lapso de tiempo de la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="taskLapse"><strong>Lapso de tiempo</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="taskLapse" name="tasklapse" required="">
                                                                <option value="" selected="">Seleccione el lapso</option>
                                                                <?php foreach ($lapses as $lapse){ ?>
                                                                    <option value="<?php echo $lapse->getLapseId(); ?>"><?php echo $lapse->getLapseName(); ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input del usuario asignado a la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="taskUser"><strong>Usuario asignado</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="taskUser" name="taskuser" required="">
                                                                <option value="" selected="">Seleccione el usuario</option>
                                                                <?php foreach ($users as $user){ 
                                                                    if($user->getRole() !== 1 && $user->getRole() !== 4) { ?>
                                                                        <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la cantidad de horas estimadas de la tarea -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="taskHours"><strong>Cantidad estimada de horas</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="taskHours" name="taskhours" required="">
                                                                <option value="" selected="">Seleccione las horas</option>
                                                                <option value="1">1 hora</option>
                                                                <option value="2">2 horas</option>
                                                                <option value="3">4 horas</option>
                                                                <option value="4">8 horas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Footer del modal -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal"><span class="d-none d-sm-block">Cerrar</span></button>
                                                        <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Crear</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">

                                                                        <!-- Descripción de la tarea -->
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>

                                                                        <!-- Detalles de la tarea -->
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

                                                            <!-- Footer del modal -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-info edit-button" type="button" data-bs-target="#editTask-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar<i class="bi bi-pencil-square"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal para editar la tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="editTask-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Header del modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel-6">Editar la tarea</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body">

                                                                <!-- Formulario para editar la tarea -->
                                                                <form action="<?php echo constant('URL'); ?>tasks/updateTask" method="POST">

                                                                    <input type="number" name="taskid" value="<?php echo $task->getTaskId(); ?>" required="" hidden>
                                                                    <input type="number" name="status" value="<?php
                                                                        switch ($task->getStatus()) {
                                                                            case 'Por hacer':
                                                                                echo 1;
                                                                                break;
                                                                            case 'En curso':
                                                                                echo 2;
                                                                                break;
                                                                            case 'Finalizada':
                                                                                echo 3;
                                                                                break;
                                                                            case 'Aprobada':
                                                                                echo 4;
                                                                                break;
                                                                        }
                                                                    ?>" required="" hidden>
                                                                
                                                                    <!-- Input del título de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label form-label" for="taskName-<?php echo $task->getTaskId(); ?>"><strong>Título de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input class="form-control" type="text" id="taskName-<?php echo $task->getTaskId(); ?>" name="taskname" autocomplete="off" value="<?php echo $task->getTitle(); ?>" required="" maxlength="100">
                                                                            <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la descripción de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskDescription-<?php echo $task->getTaskId(); ?>"><strong>Descripción de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <textarea class="form-control" id="taskDescription-<?php echo $task->getTaskId(); ?>" name="taskdescription" Value="<?php echo $task->getDescription(); ?>" autocomplete="off" spellcheck="true" required="" maxlength="200"><?php echo $task->getDescription(); ?></textarea>
                                                                            <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la categoría de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskCategory-<?php echo $task->getTaskId(); ?>"><strong>Categoría</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskCategory-<?php echo $task->getTaskId(); ?>" name="taskcategory" required="">
                                                                                <option value="">Seleccione la categoría</option>
                                                                                <option value="1" <?php if($task->getCategory() === 'Diaria') echo 'selected'; ?>>Diaria</option>
                                                                                <option value="2" <?php if($task->getCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                <option value="3" <?php if($task->getCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                <option value="4" <?php if($task->getCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del lapso de tiempo de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskLapse-<?php echo $task->getTaskId(); ?>"><strong>Lapso de tiempo</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskLapse-<?php echo $task->getTaskId(); ?>" name="tasklapse" required="">
                                                                                <option value="">Seleccione el lapso</option>
                                                                                <?php foreach ($lapses as $lapse){?>
                                                                                    <option value="<?php echo $lapse->getLapseId(); ?>" <?php if($task->getLapse() === $lapse->getLapseName()) echo 'selected'; ?>><?php echo $lapse->getLapseName(); ?></option>
                                                                                <?php 
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del usuario asignado a la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskUser-<?php echo $task->getTaskId(); ?>"><strong>Usuario asignado</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskUser-<?php echo $task->getTaskId(); ?>" name="taskuser" required="">
                                                                                <option value="">Seleccione el usuario</option>
                                                                                <?php foreach ($users as $user){ 
                                                                                    if($user->getRole() !== 1 && $user->getRole() !== 4) { ?>
                                                                                        <option value="<?php echo $user->getId(); ?>" <?php if($task->getUserFirstName() === $user->getName() && $task->getUserLastName() === $user->getLastname() && $task->getUserPosition() === $user->getPosition()) echo 'selected'; ?>><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
                                                                                    <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la cantidad de horas de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskHours-<?php echo $task->getTaskId(); ?>"><strong>Cantidad estimada de horas</strong></label>
                                                                        <div class="form-group"><select class="form-select" id="taskHours-<?php echo $task->getTaskId(); ?>" name="taskhours" required="">
                                                                                <option value="">Seleccione las Horas</option>
                                                                                <option value="1" <?php if($task->getHours() == '1') echo 'selected'; ?>>1 hora</option>
                                                                                <option value="2" <?php if($task->getHours() == '2') echo 'selected'; ?>>2 horas</option>
                                                                                <option value="3" <?php if($task->getHours() == '4') echo 'selected'; ?>>4 horas</option>
                                                                                <option value="4" <?php if($task->getHours() == '8') echo 'selected'; ?>>8 horas</option>
                                                                            </select></div>
                                                                    </div>

                                                                    <!-- Footer del modal -->
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#taskInfo-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal"><span class="d-none d-sm-block">Regresar</span></button>
                                                                        <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                    </div>
                                                                </form>
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

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">

                                                                        <!-- Descripción de la tarea -->
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>

                                                                        <!-- Detalles de la tarea -->
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

                                                            <!-- Footer del modal -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-info edit-button" type="button" data-bs-target="#editTask-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar<i class="bi bi-pencil-square"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal para editar la tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="editTask-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Header del modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel-6">Editar la tarea</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body">

                                                                <!-- Formulario para editar la tarea -->
                                                                <form action="<?php echo constant('URL'); ?>tasks/updateTask" method="POST">

                                                                    <input type="number" name="taskid" value="<?php echo $task->getTaskId(); ?>" required="" hidden>
                                                                    <input type="number" name="status" value="<?php
                                                                        switch ($task->getStatus()) {
                                                                            case 'Por hacer':
                                                                                echo 1;
                                                                                break;
                                                                            case 'En curso':
                                                                                echo 2;
                                                                                break;
                                                                            case 'Finalizada':
                                                                                echo 3;
                                                                                break;
                                                                            case 'Aprobada':
                                                                                echo 4;
                                                                                break;
                                                                        }
                                                                    ?>" required="" hidden>

                                                                    <!-- Input del título de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label form-label" for="taskName-<?php echo $task->getTaskId(); ?>"><strong>Título de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input class="form-control" type="text" id="taskName-<?php echo $task->getTaskId(); ?>" name="taskname" autocomplete="off" value="<?php echo $task->getTitle(); ?>" required="" maxlength="100">
                                                                            <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la descripción de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskDescription-<?php echo $task->getTaskId(); ?>"><strong>Descripción de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <textarea class="form-control" id="taskDescription-<?php echo $task->getTaskId(); ?>" name="taskdescription" Value="<?php echo $task->getDescription(); ?>" autocomplete="off" spellcheck="true" required="" maxlength="200"><?php echo $task->getDescription(); ?></textarea>
                                                                            <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la categoría de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskCategory-<?php echo $task->getTaskId(); ?>"><strong>Categoría</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskCategory-<?php echo $task->getTaskId(); ?>" name="taskcategory" required="">
                                                                                <option value="">Seleccione la categoría</option>
                                                                                <option value="1" <?php if($task->getCategory() === 'Diaria') echo 'selected'; ?>>Diaria</option>
                                                                                <option value="2" <?php if($task->getCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                <option value="3" <?php if($task->getCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                <option value="4" <?php if($task->getCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del lapso de tiempo de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskLapse-<?php echo $task->getTaskId(); ?>"><strong>Lapso de tiempo</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskLapse-<?php echo $task->getTaskId(); ?>" name="tasklapse" required="">
                                                                                <option value="">Seleccione el lapso</option>
                                                                                <?php foreach ($lapses as $lapse){?>
                                                                                    <option value="<?php echo $lapse->getLapseId(); ?>" <?php if($task->getLapse() === $lapse->getLapseName()) echo 'selected'; ?>><?php echo $lapse->getLapseName(); ?></option>
                                                                                <?php 
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del usuario asignado a la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskUser-<?php echo $task->getTaskId(); ?>"><strong>Usuario asignado</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskUser-<?php echo $task->getTaskId(); ?>" name="taskuser" required="">
                                                                                <option value="">Seleccione el usuario</option>
                                                                                <?php foreach ($users as $user){ 
                                                                                    if($user->getRole() !== 1 && $user->getRole() !== 4) { ?>
                                                                                        <option value="<?php echo $user->getId(); ?>" <?php if($task->getUserFirstName() === $user->getName() && $task->getUserLastName() === $user->getLastname() && $task->getUserPosition() === $user->getPosition()) echo 'selected'; ?>><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
                                                                                    <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la cantidad de horas de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskHours-<?php echo $task->getTaskId(); ?>"><strong>Cantidad estimada de horas</strong></label>
                                                                        <div class="form-group"><select class="form-select" id="taskHours-<?php echo $task->getTaskId(); ?>" name="taskhours" required="">
                                                                                <option value="">Seleccione las Horas</option>
                                                                                <option value="1" <?php if($task->getHours() == '1') echo 'selected'; ?>>1 hora</option>
                                                                                <option value="2" <?php if($task->getHours() == '2') echo 'selected'; ?>>2 horas</option>
                                                                                <option value="3" <?php if($task->getHours() == '4') echo 'selected'; ?>>4 horas</option>
                                                                                <option value="4" <?php if($task->getHours() == '8') echo 'selected'; ?>>8 horas</option>
                                                                            </select></div>
                                                                    </div>

                                                                    <!-- Footer del modal -->
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#taskInfo-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal"><span class="d-none d-sm-block">Regresar</span></button>
                                                                        <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                    </div>
                                                                </form>
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

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">

                                                                        <!-- Descripción de la tarea -->
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>

                                                                        <!-- Detalles de la tarea -->
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

                                                            <!-- Footer del modal -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-info edit-button" type="button" data-bs-target="#editTask-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar<i class="bi bi-pencil-square"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal para editar la tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="editTask-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Header del modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel-6">Editar la tarea</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body">

                                                                <!-- Formulario para editar la tarea -->
                                                                <form action="<?php echo constant('URL'); ?>tasks/updateTask" method="POST">

                                                                    <input type="number" name="taskid" value="<?php echo $task->getTaskId(); ?>" required="" hidden>
                                                                    <input type="number" name="status" value="<?php
                                                                        switch ($task->getStatus()) {
                                                                            case 'Por hacer':
                                                                                echo 1;
                                                                                break;
                                                                            case 'En curso':
                                                                                echo 2;
                                                                                break;
                                                                            case 'Finalizada':
                                                                                echo 3;
                                                                                break;
                                                                            case 'Aprobada':
                                                                                echo 4;
                                                                                break;
                                                                        }
                                                                    ?>" required="" hidden>

                                                                    <!-- Input del título de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label form-label" for="taskName-<?php echo $task->getTaskId(); ?>"><strong>Título de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input class="form-control" type="text" id="taskName-<?php echo $task->getTaskId(); ?>" name="taskname" autocomplete="off" value="<?php echo $task->getTitle(); ?>" required="" maxlength="100">
                                                                            <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la descripción de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskDescription-<?php echo $task->getTaskId(); ?>"><strong>Descripción de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <textarea class="form-control" id="taskDescription-<?php echo $task->getTaskId(); ?>" name="taskdescription" Value="<?php echo $task->getDescription(); ?>" autocomplete="off" spellcheck="true" required="" maxlength="200"><?php echo $task->getDescription(); ?></textarea>
                                                                            <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la categoría de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskCategory-<?php echo $task->getTaskId(); ?>"><strong>Categoría</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskCategory-<?php echo $task->getTaskId(); ?>" name="taskcategory" required="">
                                                                                <option value="">Seleccione la categoría</option>
                                                                                <option value="1" <?php if($task->getCategory() === 'Diaria') echo 'selected'; ?>>Diaria</option>
                                                                                <option value="2" <?php if($task->getCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                <option value="3" <?php if($task->getCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                <option value="4" <?php if($task->getCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del lapso de tiempo de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskLapse-<?php echo $task->getTaskId(); ?>"><strong>Lapso de tiempo</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskLapse-<?php echo $task->getTaskId(); ?>" name="tasklapse" required="">
                                                                                <option value="">Seleccione el lapso</option>
                                                                                <?php foreach ($lapses as $lapse){?>
                                                                                    <option value="<?php echo $lapse->getLapseId(); ?>" <?php if($task->getLapse() === $lapse->getLapseName()) echo 'selected'; ?>><?php echo $lapse->getLapseName(); ?></option>
                                                                                <?php 
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del usuario asignado a la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskUser-<?php echo $task->getTaskId(); ?>"><strong>Usuario asignado</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskUser-<?php echo $task->getTaskId(); ?>" name="taskuser" required="">
                                                                                <option value="">Seleccione el usuario</option>
                                                                                <?php foreach ($users as $user){ 
                                                                                    if($user->getRole() !== 1 && $user->getRole() !== 4) { ?>
                                                                                        <option value="<?php echo $user->getId(); ?>" <?php if($task->getUserFirstName() === $user->getName() && $task->getUserLastName() === $user->getLastname() && $task->getUserPosition() === $user->getPosition()) echo 'selected'; ?>><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
                                                                                    <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la cantidad de horas de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskHours-<?php echo $task->getTaskId(); ?>"><strong>Cantidad estimada de horas</strong></label>
                                                                        <div class="form-group"><select class="form-select" id="taskHours-<?php echo $task->getTaskId(); ?>" name="taskhours" required="">
                                                                                <option value="">Seleccione las Horas</option>
                                                                                <option value="1" <?php if($task->getHours() == '1') echo 'selected'; ?>>1 hora</option>
                                                                                <option value="2" <?php if($task->getHours() == '2') echo 'selected'; ?>>2 horas</option>
                                                                                <option value="3" <?php if($task->getHours() == '4') echo 'selected'; ?>>4 horas</option>
                                                                                <option value="4" <?php if($task->getHours() == '8') echo 'selected'; ?>>8 horas</option>
                                                                            </select></div>
                                                                    </div>

                                                                    <!-- Footer del modal -->
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#taskInfo-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal"><span class="d-none d-sm-block">Regresar</span></button>
                                                                        <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                    </div>
                                                                </form>
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

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body modal-task_body">
                                                                <div class="container-fluid">
                                                                    <div class="row">

                                                                        <!-- Descripción de la tarea -->
                                                                        <div class="col-12 modal-task_description">
                                                                            <h6>Descripción</h6>
                                                                            <p><?php echo $task->getDescription(); ?></p>
                                                                        </div>

                                                                        <!-- Detalles de la tarea -->
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

                                                            <!-- Footer del modal -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                                                                <button class="btn btn-info edit-button" type="button" data-bs-target="#editTask-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar<i class="bi bi-pencil-square"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal para editar la tarea -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="editTask-<?php echo $task->getTaskId(); ?>" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Header del modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel-6">Editar la tarea</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body">

                                                                <!-- Formulario para editar la tarea -->
                                                                <form action="<?php echo constant('URL'); ?>tasks/updateTask" method="POST">

                                                                    <input type="number" name="taskid" value="<?php echo $task->getTaskId(); ?>" required="" hidden>
                                                                    <input type="number" name="status" value="<?php
                                                                        switch ($task->getStatus()) {
                                                                            case 'Por hacer':
                                                                                echo 1;
                                                                                break;
                                                                            case 'En curso':
                                                                                echo 2;
                                                                                break;
                                                                            case 'Finalizada':
                                                                                echo 3;
                                                                                break;
                                                                            case 'Aprobada':
                                                                                echo 4;
                                                                                break;
                                                                        }
                                                                    ?>" required="" hidden>

                                                                    <!-- Input del título de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label form-label" for="taskName-<?php echo $task->getTaskId(); ?>"><strong>Título de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input class="form-control" type="text" id="taskName-<?php echo $task->getTaskId(); ?>" name="taskname" autocomplete="off" value="<?php echo $task->getTitle(); ?>" required="" maxlength="100">
                                                                            <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la descripción de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskDescription-<?php echo $task->getTaskId(); ?>"><strong>Descripción de la tarea</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <textarea class="form-control" id="taskDescription-<?php echo $task->getTaskId(); ?>" name="taskdescription" Value="<?php echo $task->getDescription(); ?>" autocomplete="off" spellcheck="true" required="" maxlength="200"><?php echo $task->getDescription(); ?></textarea>
                                                                            <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la categoría de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskCategory-<?php echo $task->getTaskId(); ?>"><strong>Categoría</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskCategory-<?php echo $task->getTaskId(); ?>" name="taskcategory" required="">
                                                                                <option value="">Seleccione la categoría</option>
                                                                                <option value="1" <?php if($task->getCategory() === 'Diaria') echo 'selected'; ?>>Diaria</option>
                                                                                <option value="2" <?php if($task->getCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                <option value="3" <?php if($task->getCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                <option value="4" <?php if($task->getCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del lapso de tiempo de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskLapse-<?php echo $task->getTaskId(); ?>"><strong>Lapso de tiempo</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskLapse-<?php echo $task->getTaskId(); ?>" name="tasklapse" required="">
                                                                                <option value="">Seleccione el lapso</option>
                                                                                <?php foreach ($lapses as $lapse){?>
                                                                                    <option value="<?php echo $lapse->getLapseId(); ?>" <?php if($task->getLapse() === $lapse->getLapseName()) echo 'selected'; ?>><?php echo $lapse->getLapseName(); ?></option>
                                                                                <?php 
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input del usuario asignado a la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskUser-<?php echo $task->getTaskId(); ?>"><strong>Usuario asignado</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="taskUser-<?php echo $task->getTaskId(); ?>" name="taskuser" required="">
                                                                                <option value="">Seleccione el usuario</option>
                                                                                <?php foreach ($users as $user){ 
                                                                                    if($user->getRole() !== 1 && $user->getRole() !== 4) { ?>
                                                                                        <option value="<?php echo $user->getId(); ?>" <?php if($task->getUserFirstName() === $user->getName() && $task->getUserLastName() === $user->getLastname() && $task->getUserPosition() === $user->getPosition()) echo 'selected'; ?>><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
                                                                                    <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la cantidad de horas de la tarea -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="taskHours-<?php echo $task->getTaskId(); ?>"><strong>Cantidad estimada de horas</strong></label>
                                                                        <div class="form-group"><select class="form-select" id="taskHours-<?php echo $task->getTaskId(); ?>" name="taskhours" required="">
                                                                                <option value="">Seleccione las Horas</option>
                                                                                <option value="1" <?php if($task->getHours() == '1') echo 'selected'; ?>>1 hora</option>
                                                                                <option value="2" <?php if($task->getHours() == '2') echo 'selected'; ?>>2 horas</option>
                                                                                <option value="3" <?php if($task->getHours() == '4') echo 'selected'; ?>>4 horas</option>
                                                                                <option value="4" <?php if($task->getHours() == '8') echo 'selected'; ?>>8 horas</option>
                                                                            </select></div>
                                                                    </div>

                                                                    <!-- Footer del modal -->
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#taskInfo-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal"><span class="d-none d-sm-block">Regresar</span></button>
                                                                        <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                    </div>
                                                                </form>
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
    <script src="<?php echo constant('URL'); ?>assets/js/pages/supervisor-task.js"></script>
</body>

</html>