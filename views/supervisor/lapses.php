<?php
    $user = $this->d['user'];
    $tasks = $this->d['tasks'];
    $users = $this->d['users'];
    $lapses = $this->d['lapses'];
    $lView = $this->d['lView'];
    $tView = $this->d['tView'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panel de lapsos - Navibus</title>
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

            <main id="main-content">
                
                <!-- Cabecera de la Página -->
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
                <?php $this->showMessages();?>
                <section class="section">

                    <!-- Nuevo lapso de tiempo -->
                    <div class="new-task">
                        <div class="row">
                            <div class="col">

                                <!-- Botón para crear un nuevo lapso de tiempo -->
                                <button class="btn btn-primary d-flex align-items-center float-end" type="button" data-bs-target="#createLapse" data-bs-toggle="modal"><i class="bi bi-plus-circle"></i>Crear nuevo lapso</button>
                                
                                <!-- Modal con formulario para crear un nuevo lapso de tiempo -->
                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="createLapse" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">

                                            <!-- Cabecera del modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel-4">Crear un nuevo lapso de tiempo</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Cuerpo del modal -->
                                            <div class="modal-body">
                                                <!-- Formulario para crear un nuevo lapso de tiempo -->
                                                <form action="<?php echo constant('URL'); ?>lapses/createLapse" method="POST">

                                                    <!-- Input del título del lapso -->
                                                    <div class="mb-3 lapseNameDiv">
                                                        <label class="form-label" for="lapseName"><strong>Nombre del lapso</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control lapseName" type="text" id="lapseName" name="lapsename" autocomplete="off" placeholder="Nombre del lapso" required="" maxlength="50">
                                                            <div class="form-control-icon"><i class="bi bi-bar-chart-steps"></i></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Input de la categoría del lapso -->
                                                    <div class="mb-3 lapseCategoryDiv">
                                                        <label class="form-label" for="lapseCategory"><strong>Categoría</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select lapseCategory" id="lapseCategory" name="lapsecategory" required="">
                                                                <option value="" selected="">Seleccione la categoría</option>
                                                                <option value="2">Semanal</option>
                                                                <option value="3">Mensual</option>
                                                                <option value="4">Trimestral</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la fecha de inicio del lapso -->
                                                    <div class="mb-3 lapseInitialDateDiv">
                                                        <label class="form-label" for="lapseInitialDate"><strong>Fecha de inicio</strong></label>
                                                        <div class="form-group">
                                                            <input class="form-control lapseInitialDate" id="lapseInitialDate" type="date" name="lapseinitialdate" required="" min="<?php echo date('Y-m-d'); ?>" disabled>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la fecha de finalización del lapso -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="lapseEndDate"><strong>Fecha de finalización</strong></label>
                                                        <div class="form-group">
                                                            <input class="form-control lapseEndDate" id="lapseEndDate" type="date" name="lapseenddate" required="" readonly>
                                                        </div>
                                                    </div>

                                                    <!-- Footer del modal -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal"><i class="d-block d-sm-none bx bx-x"></i><span class="d-none d-sm-block">Cerrar</span></button>
                                                        <button class="btn btn-primary ml-1 button-lapse" type="submit"><i class="d-block d-sm-none bx bx-check"></i><span class="d-none d-sm-block">Crear</span></button>
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
                            <div class="col">
                                <!-- Lista de Lapsos -->
                                <div class="card lapse-card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lista de lapsos</h4>
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
                                                                                        $lapseTasks = $tasks->getAllTasksByLapseId($lapse->getLapseId());
        
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
                                                                                                <td>
                                                                                                    <button class="btn btn-info btn-sm edit-task-button" type="button" data-bs-target="#editTask-<?php echo $task->getTaskId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-square">
                                                                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </td>
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
                                                                                    </td>
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
                                                                <button class="btn btn-info edit-button" type="button" data-bs-target="#editLapse-<?php echo $lapse->getLapseId(); ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar<i class="bi bi-pencil-square"></i></button>
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

                                                <!-- Modal para editar el lapso -->
                                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="editLapse-<?php echo $lapse->getLapseId(); ?>" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">

                                                            <!-- Cabecera del modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel-4">Editar el lapso de tiempo</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Cuerpo del modal -->
                                                            <div class="modal-body">
                                                                <!-- Formulario para editar el lapso de tiempo -->
                                                                <form action="<?php echo constant('URL'); ?>lapses/updateLapse" method="POST">

                                                                    <input type="hidden" name="lapseid" value="<?php echo $lapse->getLapseId(); ?>" required="">
                                                                    <input type="hidden" name="lapseinitialold" value="<?php echo date('Y-m-d', strtotime($lapse->getInitial())); ?>" required="">

                                                                    <!-- Input del título del lapso -->
                                                                    <div class="mb-3 lapseNameDiv">
                                                                        <label class="form-label" for="lapseName<?php echo $lapse->getLapseId(); ?>"><strong>Nombre del lapso</strong></label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input class="form-control lapseName" value="<?php echo $lapse->getLapseName(); ?>" type="text" id="lapseName<?php echo $lapse->getLapseId(); ?>" name="lapsename" autocomplete="off" placeholder="Nombre del lapso" required="" maxlength="50">
                                                                            <div class="form-control-icon"><i class="bi bi-bar-chart-steps"></i></div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!-- Input de la categoría del lapso -->
                                                                    <div class="mb-3 lapseCategoryDiv">
                                                                        <label class="form-label" for="lapseCategory<?php echo $lapse->getLapseId(); ?>"><strong>Categoría</strong></label>
                                                                        <div class="form-group">
                                                                            <select class="form-select lapseCategory" id="lapseCategory<?php echo $lapse->getLapseId(); ?>" name="lapsecategory" required="">
                                                                                <option value="">Seleccione la categoría</option>
                                                                                <option value="2" <?php if($lapse->getCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                <option value="3" <?php if($lapse->getCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                <option value="4" <?php if($lapse->getCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la fecha de inicio del lapso -->
                                                                    <div class="mb-3 lapseInitialDateDiv">
                                                                        <label class="form-label" for="lapseInitialDate<?php echo $lapse->getLapseId(); ?>"><strong>Fecha de inicio</strong></label>
                                                                        <div class="form-group">
                                                                            <!-- Input de tipo fecha con el atributo min para que no se pueda seleccionar una fecha anterior a la actual -->
                                                                            <input class="form-control lapseInitialDate" value="<?php echo date('Y-m-d', strtotime($lapse->getInitial())); ?>" id="lapseInitialDate<?php echo $lapse->getLapseId(); ?>" type="date" name="lapseinitialdate" required="" min="<?php echo date('Y-m-d', strtotime($lapse->getInitial())); ?>">
                                                                        </div>
                                                                    </div>

                                                                    <!-- Input de la fecha de finalización del lapso -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="lapseEndDate<?php echo $lapse->getLapseId(); ?>"><strong>Fecha de finalización</strong></label>
                                                                        <div class="form-group">
                                                                            <input class="form-control lapseEndDate" value="<?php echo date('Y-m-d', strtotime($lapse->getEnd())); ?>" id="lapseEndDate<?php echo $lapse->getLapseId(); ?>" type="date" name="lapseenddate" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Footer del modal -->
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#lapseInfo<?php echo $lapse->getLapseId(); ?>" data-bs-toggle="modal"><i class="d-block d-sm-none bx bx-x"></i><span class="d-none d-sm-block">Regresar</span></button>
                                                                        <button class="btn btn-primary ml-1 button-lapse" type="submit"><i class="d-block d-sm-none bx bx-check"></i><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Foreach para los modales de editar tareas -->
                                                <?php 
                                                $lapseTasks = $tasks->getAllTasksByLapseId($lapse->getLapseId());

                                                foreach($lapseTasks as $task) { ?>

                                                    <!-- Modal para editar tarea -->
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
                                                                    <form action="<?php echo constant('URL'); ?>tasks/updateTaskFromLapses" method="POST">

                                                                        <input type="hidden" name="taskid" value="<?php echo $task->getTaskId(); ?>" required="">
                                                                    
                                                                        <!-- Input del título de la tarea -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label form-label" for="taskName-<?php echo $task->getTaskId(); ?>"><strong>Título de la tarea</strong></label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <input class="form-control taskName" type="text" id="taskName-<?php echo $task->getTaskId(); ?>" name="taskname" autocomplete="off" value="<?php echo $task->getTaskTitle(); ?>" required="" maxlength="100">
                                                                                <div class="form-control-icon"><i class="bi bi-clipboard"></i></div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Input de la descripción de la tarea -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="taskDescription-<?php echo $task->getTaskId(); ?>"><strong>Descripción de la tarea</strong></label>
                                                                            <div class="form-group position-relative has-icon-left">
                                                                                <textarea class="form-control" id="taskDescription-<?php echo $task->getTaskId(); ?>" name="taskdescription" Value="<?php echo $task->getTaskDescription(); ?>" autocomplete="off" spellcheck="true" required="" maxlength="200"><?php echo $task->getTaskDescription(); ?></textarea>
                                                                                <div class="form-control-icon"><i class="bi bi-file-text"></i></div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Input del status de la tarea -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="taskStatus-<?php echo $task->getTaskId(); ?>"><strong>Estado de la tarea</strong></label>
                                                                            <div class="form-group">
                                                                                <select class="form-select" id="taskStatus-<?php echo $task->getTaskId(); ?>" name="status" required="">
                                                                                    <option value="">Seleccione el estado</option>
                                                                                    <option value="1" <?php if($task->getStatus() === 'Por hacer') echo 'selected'; ?>>Por hacer</option>
                                                                                    <option value="2" <?php if($task->getStatus() === 'En curso') echo 'selected'; ?>>En curso</option>
                                                                                    <option value="3" <?php if($task->getStatus() === 'Finalizada') echo 'selected'; ?>>Finalizada</option>
                                                                                    <option value="4" <?php if($task->getStatus() === 'Aprobada') echo 'selected'; ?>>Aprobada</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Input de la prioridad de la tarea -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="taskPriority-<?php echo $task->getTaskId(); ?>"><strong>Prioridad</strong></label>
                                                                            <div class="form-group">
                                                                                <select class="form-select" id="taskPriority-<?php echo $task->getTaskId(); ?>" name="taskpriority" required="">
                                                                                    <option value="">Seleccione la prioridad</option>
                                                                                    <option value="Mínima" <?php if($task->getTaskPriority() === 'Mínima') echo 'selected'; ?>>Mínima</option>
                                                                                    <option value="Media" <?php if($task->getTaskPriority() === 'Media') echo 'selected'; ?>>Media</option>
                                                                                    <option value="Elevada" <?php if($task->getTaskPriority() === 'Elevada') echo 'selected'; ?>>Elevada</option>
                                                                                    <option value="Urgente" <?php if($task->getTaskPriority() === 'Urgente') echo 'selected'; ?>>Urgente</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Input de la categoría de la tarea -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="taskCategory-<?php echo $task->getTaskId(); ?>"><strong>Categoría</strong></label>
                                                                            <div class="form-group">
                                                                                <select class="form-select" id="taskCategory-<?php echo $task->getTaskId(); ?>" name="taskcategory" required="">
                                                                                    <option value="">Seleccione la categoría</option>
                                                                                    <option value="1" <?php if($task->getTaskCategory() === 'Diaria') echo 'selected'; ?>>Diaria</option>
                                                                                    <option value="2" <?php if($task->getTaskCategory() === 'Semanal') echo 'selected'; ?>>Semanal</option>
                                                                                    <option value="3" <?php if($task->getTaskCategory() === 'Mensual') echo 'selected'; ?>>Mensual</option>
                                                                                    <option value="4" <?php if($task->getTaskCategory() === 'Trimestral') echo 'selected'; ?>>Trimestral</option>
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
                                                                                        <option value="<?php echo $lapse->getLapseId(); ?>" <?php if($task->getTaskLapseId() === $lapse->getLapseId()) echo 'selected'; ?>><?php echo $lapse->getLapseName(); ?></option>
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
                                                                                            <option value="<?php echo $user->getId(); ?>" <?php if($task->getTaskUserId() === $user->getId()) echo 'selected'; ?>><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?> - <?php echo $user->getPosition(); ?></option>
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
                                                                                    <option value="">Seleccione las horas</option>
                                                                                    <option value="1" <?php if($task->getTaskHours() == '1') echo 'selected'; ?>>1 hora</option>
                                                                                    <option value="2" <?php if($task->getTaskHours() == '2') echo 'selected'; ?>>2 horas</option>
                                                                                    <option value="3" <?php if($task->getTaskHours() == '4') echo 'selected'; ?>>4 horas</option>
                                                                                    <option value="4" <?php if($task->getTaskHours() == '8') echo 'selected'; ?>>8 horas</option>
                                                                                </select></div>
                                                                        </div>

                                                                        <!-- Footer del modal -->
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#lapseInfo<?php echo $task->getTaskLapseId(); ?>" data-bs-toggle="modal"><span class="d-none d-sm-block">Regresar</span></button>
                                                                            <button class="btn btn-primary ml-1" type="submit"><span class="d-none d-sm-block">Guardar cambios</span></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } ?>
                                            <?php
                                            } ?>
                                        </div>
                                        
                                        <!-- <button class="btn btn-danger d-flex float-end align-items-center export-pdf" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-pdf">
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                                <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                            </svg>Exportar a PDF</button> -->
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
    <script src="<?php echo constant('URL'); ?>assets/js/pages/lapsesform.js"></script>

    <!-- Script para crear los datatables -->
    <?php foreach ($lapses as $lapse) { ?>
        <script>
            // Simple Datatable
            let dataTable<?php echo $lapse->getLapseId(); ?> = new simpleDatatables.DataTable(document.querySelector('#dataTable<?php echo $lapse->getLapseId(); ?>'));
        </script>
    <?php
    } ?>
</body>

</html>