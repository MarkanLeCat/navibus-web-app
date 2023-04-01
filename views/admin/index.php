<?php
    $user = $this->d['user'];
    $users = $this->d['users'];
    $uView = $this->d['uView'];
    $lView = $this->d['lView'];
    $oView = $this->d['oView'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panel de usuarios - Navibus</title>
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
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/pages/admin.css">
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
                                <h3>Panel de usuarios</h3>
                            </div>
                            <!-- Breadcrumb de la Página -->
                            <div class="col-12 col-md-6 order-first order-md-2">
                                <nav class="float-start float-md-end breadcrumb-header" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><span>Panel de usuarios</span></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido de la Página -->
                <?php $this->showMessages();?>
                <section class="section">

                    <!-- Crear nuevo usuario --> 
                    <div class="new-task">
                        <div class="row">
                            <div class="col">

                                <!-- Botón para crear nuevo usuario -->
                                <button class="btn btn-primary d-flex align-items-center" type="button" data-bs-target="#createUser" data-bs-toggle="modal"><i class="bi bi-plus-circle"></i>Crear nuevo usuario</button>

                                <!-- Modal con formulario para crear nuevo usuario -->
                                <div class="modal fade text-left" role="dialog" tabindex="-1" id="createUser" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">

                                            <!-- Header del modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel-5">Crear un nuevo usuario</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Body del modal -->
                                            <div class="modal-body">
                                                <form action="<?php echo constant('URL'); ?>admin/createUser" method="POST">

                                                    <!-- Input del nombre -->
                                                    <div class="mb-3 userFirstNameDiv">
                                                        <label class="form-label" for="userFirstName"><strong>Nombre</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userFirstName" type="text" id="userFirstName" name="userfirstname" autocomplete="off" placeholder="Nombre" required="" maxlength="20">
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input del apellido -->
                                                    <div class="mb-3 userLastNameDiv">
                                                        <label class="form-label" for="userLastName"><strong>Apellido</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userLastName" type="text" id="userLastName" name="userlastname" autocomplete="off" placeholder="Apellido" required="" maxlength="20">
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input del nivel de usuario -->
                                                    <div class="mb-3 userRoleDiv">
                                                        <label class="form-label" for="userRole"><strong>Nivel de usuario</strong></label>
                                                        <div class="form-group">
                                                            <select class="form-select userRole" id="userRole" name="userrole" required="">
                                                                <option value="" selected="">Seleccione el nivel de usuario</option>
                                                                <option value="2">Supervisor</option>
                                                                <option value="3">Operador</option>
                                                                <option value="4">Administrativo</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input del nombre de usuario -->
                                                    <div class="mb-3 userNameDiv">
                                                        <label class="form-label" for="userName"><strong>Nombre de usuario (Username)</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userName" type="text" id="userName" name="username" autocomplete="off" placeholder="Username" required="" maxlength="20">
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input de la contraseña -->
                                                    <div class="mb-3 userPasswordDiv">
                                                        <label class="form-label" for="userPassword"><strong>Contraseña</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userPassword" type="password" id="userPassword" name="userpassword" placeholder="Contraseña" autocomplete="off" required="" minlength="8">
                                                            <div class="form-control-icon"><i class="bi bi-shield-lock"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input del email -->
                                                    <div class="mb-3 userEmailDiv">
                                                        <label class="form-label" for="userEmail"><strong>Correo electrónico</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userEmail" type="email" id="userEmail" name="useremail" placeholder="ejemplo@correo.com" autocomplete="off" required="" maxlength="50">
                                                            <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input del cargo -->
                                                    <div class="mb-3 userPositionDiv">
                                                        <label class="form-label" for="userPosition"><strong>Cargo</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userPosition" type="text" id="userPosition" name="userposition" autocomplete="off" placeholder="Cargo" required="" maxlength="30">
                                                            <div class="form-control-icon"><i class="bi bi-briefcase"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Input del número de teléfono -->
                                                    <div class="mb-3 userPhoneDiv">
                                                        <label class="form-label" for="userPhone"><strong>Número de teléfono</strong></label>
                                                        <div class="form-group position-relative has-icon-left">
                                                            <input class="form-control userPhone" type="text" id="userPhone-1" name="userphone" autocomplete="off" placeholder="Teléfono" required="" maxlength="20">
                                                            <div class="form-control-icon"><i class="bi bi-telephone"></i></div>
                                                        </div>
                                                    </div>

                                                    <!-- Footer del modal -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal"><span class="d-none d-sm-block">Cerrar</span></button>
                                                        <button class="btn btn-primary ml-1 button-create" type="submit"><span class="d-none d-sm-block">Crear</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container listUsers">
                        <div class="row">
                            <div class="col">

                                <!-- Lista de usuarios -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lista de usuarios</h4>
                                    </div>
                                    <div class="card-body">
                                        <div>

                                            <!-- Tabla de usuarios -->
                                            <table class="table table-striped" id="userTable">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre de usuario</th>
                                                        <th>Nivel de usuario</th>
                                                        <th>Estado</th>
                                                        <th>Nombre completo</th>
                                                        <th>Correo electrónico</th>
                                                        <th>Cargo</th>
                                                        <th>Teléfono</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($users as $user) { 
                                                        if($user->getId() == 1) continue; ?>
                                                        <tr>
                                                        <td><?php echo $user->getUsername(); ?></td>
                                                        <td><?php 
                                                            switch ($user->getRole()) {
                                                                case 1:
                                                                    echo "Administrador";
                                                                    break;
                                                                case 2:
                                                                    echo "Supervisor";
                                                                    break;
                                                                case 3:
                                                                    echo "Operador";
                                                                    break;
                                                                case 4:
                                                                    echo "Administrativo";
                                                                    break;
                                                            }
                                                        ?></td>
                                                        <td><span class="badge <?php if($user->getStatus() === 1) {echo 'bg-success'; } else {echo 'bg-secondary'; } ?>"><?php if($user->getStatus() === 1) {echo 'Habilitado'; } else {echo 'Deshabilitado'; }  ?></span></td>
                                                        <td><?php echo $user->getName(); ?> <?php echo $user->getLastname(); ?></td>
                                                        <td><?php echo $user->getEmail(); ?></td>
                                                        <td><?php echo $user->getPosition(); ?></td>
                                                        <td><?php echo $user->getPhone(); ?></td>
                                                        <td>
                                                            <form action="<?php echo constant('URL'); ?>admin/userProfile" method="POST">
                                                                <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
                                                                <button class="btn btn-info btn-sm edit-user-button" type="submit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-square">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <!-- Botón para exportar a PDF -->
                                        <!-- <a class="btn btn-danger d-flex float-end align-items-center export-pdf" role="button" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-pdf">
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                                <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                            </svg>
                                            Exportar a PDF
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Footer -->
                <?php require 'views/footer.php'; ?>
            </main>
        </div>
    </div>

    <script src="<?php echo constant('URL'); ?>assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/bs-init.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/js/mains.js"></script>
    <script src="<?php echo constant('URL'); ?>assets/js/pages/lapsesform.js"></script>

    <!-- Script para crear el datatable -->
    <script>
        // Simple Datatable
        let table = document.querySelector('#userTable');
        let dataTable = new simpleDatatables.DataTable(table);
    </script>
</body>

</html>