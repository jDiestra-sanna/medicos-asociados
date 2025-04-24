<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanna Web</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/Assets/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/Assets/css/custom.css">
    <link rel="stylesheet" href="/Assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/Assets/css/autocompleteBS.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="/Assets/img/logo.jpg" width="80" height="30" class="d-inline-block align-top" alt="">
                </a>
                    <input type="hidden" id="url" value="/">
                    <!-- Navbar Header-->
                    <!-- <a href="/Admin/Listar" class="navbar-brand">
                        <div class="brand-text brand-big visible"><strong class="text-primary">diurvan Consultores</div>
                    </a> -->
                    <!-- Sidebar Toggle Btn-->

                    <?php
                    if(!isset($_SESSION['medico_id'])){
                    ?>
                        <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
                    <?php
                    }
                    ?>
                </div>

                <?php
                    if(isset($_SESSION['medico_id'])){
                    ?>
                <div class="right-menu list-inline no-margin-bottom">
                    <h4>Bienvenido <b><?php echo $_SESSION["medico_nombre"]." ".$_SESSION["medico_apellido"]; ?></b></h4>
                </div>
                <?php
                    }
                    ?>

                <!-- Log out               -->
                <div class="list-inline-item logout">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#logout">Cerrar sesión</button>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        
        <div id="process" class="overlay">
        <div class="overlay-content">
            <img src="/Assets/img/waiting.gif" alt="Waiting" >
        </div>
        </div>
        <!-- Sidebar Navigation-->
        <!-- <?php if(isset($_SESSION['permisos'])){ ?> -->
            <nav id="sidebar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center p-1">
                    <!-- <div class="avatar" data-toggle="modal" data-target="#cambiarPass"><img src="/Assets/img/logo.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
                    <div class="title">
                        <h5 class="h5"><?php echo $_SESSION['usuario']; ?></h5>
                    </div>
                </div>
                <?php 
                    $permiso_10000 = false;$permiso_18000 = false; $permiso_19000 = false;
                    $permiso_17300 = false;$permiso_17301 = false; $permiso_17302 = false; $permiso_17303 = false; $permiso_17304 = false; $permiso_17305 = false; $permiso_17306 = false;
                    $permiso_paquete = false;
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 10000) { $permiso_10000 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 18000) { $permiso_18000 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 19000) { $permiso_19000 = true; break;} };

                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17300) { $permiso_17300 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17301) { $permiso_17301 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17302) { $permiso_17302 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17303) { $permiso_17303 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17304) { $permiso_17304 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17305) { $permiso_17305 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17306) { $permiso_17306 = true; break;} };
                    
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17306) { $permiso_17306 = true; break;} };
                    foreach($_SESSION['permisos'] as $key => $value){ if($value->cod_permiso == 17500) { $permiso_paquete = true; break;} };
                ?>
                <ul class="list-unstyled">
                    <?php if( $permiso_10000 ) { ?>
                        <!-- PERMISOS PARA PRODUCTOS CAPITADOS -->
                        <li><a href="#dropdownproductos" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-ambulance"></i> <strong class="text-white"> Productos</strong></a>
                            <ul id="dropdownproductos" class="collapse list-unstyled ">
                                <li><a href="/Productos/listar"><i class="fas fa-list-ul"></i> Listar</a></li>
                            </ul>
                        </li>

                        <li><a href="#dropdownconsulta" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-search"></i> <strong class="text-white"> Consulta</strong></a>
                            <ul id="dropdownconsulta" class="collapse list-unstyled ">
                                <li><a href="/Consulta/listar"><i class="fas fa-list-ul"></i> Listar</a></li>
                                <li><a href="/Graficas/listar"><i class="fas fa-chart-pie"></i> Gráficas</a></li>
                            </ul>
                        </li>

                        <li><a href="#dropdownmaestras" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-warehouse"></i> <strong class="text-white"> Maestras</strong></a>
                            <ul id="dropdownmaestras" class="collapse list-unstyled ">
                                <li><a href="/Beneficios/listar"><i class="fas fa-list-ul"></i> Beneficios</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if( $permiso_18000 ) { ?>
                        <!-- PERMISOS PARA SEGUIMIENTO -->
                        <li><a href="#dropdownlistado" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-poll"></i> <strong class="text-white"> Seguimiento</strong></a>
                            <ul id="dropdownlistado" class="collapse list-unstyled ">
                                <li><a href="/Seguimiento/listarS"><i class="fas fa-list-ul"></i> Laboratorio</a></li>
                                <li><a href="/Seguimiento/SeguimientoCovid"><i class="fas fa-list-ul"></i> Seguimiento</a></li>
                                <li><a href="/Seguimiento/reportesiteds"><i class="fas fa-chart-pie"></i> Reportes</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if( $permiso_19000 ) { ?>
                        <!-- PERMISOS PARA SEGUIMIENTO BCP -->
                        <li><a href="#dropdownlistadobcp" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-poll"></i> <strong class="text-white"> Seguimiento BCP</strong></a>
                            <ul id="dropdownlistadobcp" class="collapse list-unstyled ">
                                <li><a href="/Seguimiento/listar"><i class="fas fa-fist-raised"></i> Pacientes BCP</a></li>
                                <li><a href="/Seguimiento/seguimiento"><i class="fas fa-list-ul"></i> Seguimiento BCP</a></li>
                                <li><a href="/Seguimiento/reporte"><i class="fas fa-chart-pie"></i> Reportes</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if( $permiso_17300 ) { ?>
                        <!-- PERMISOS PARA MEDICOS ASOCIADOS -->
                        <li><a href="#dropdownlistadomedico" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-user-md"></i> <strong class="text-white"> Médicos Asociados</strong></a>
                            <ul id="dropdownlistadomedico" class="collapse list-unstyled ">
                                <?php if( $permiso_17301 ) { ?>
                                    <li><a href="/Medicos/Inscripcion"><i class="fas fa-stethoscope"></i> Inscripción</a></li>
                                <?php } ?>
                                <?php if( $permiso_17302 ) { ?>
                                    <li><a style="pointer-events: none" href="/Medicos/Disponibilidad"><i class="fas fa-calendar-alt"></i> Disponibilidad</a></li>
                                <?php } ?>
                                <?php if( $permiso_17303 ) { ?>
                                    <li><a style="pointer-events: none" href="/Medicos/Produccion"><i class="fas fa-rocket"></i> Producción</a></li>
                                <?php } ?>
                                <?php if( $permiso_17304 ) { ?>
                                    <li><a style="pointer-events: none" href="/Medicos/Consultas"><i class="fas fa-hand-paper"></i> Consultas e incidencias</a></li>
                                <?php } ?>
                                <?php if( $permiso_17305 ) { ?>
                                    <li><a href="/Medicos/Documentos"><i class="fas fa-folder-open"></i> Regularizar documentos</a></li>
                                <?php } ?>
                                <?php if( $permiso_17306 ) { ?>
                                    <li><a href="/Medicos/Administracion"><i class="fas fa-chalkboard"></i> Administración</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if( $permiso_paquete ) { ?>
                        <!-- PERMISOS PARA GESTION DE PAQUETES -->
                        <li><a href="#dropdownpaquetes" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-box-open"></i> <strong class="text-white"> Paquetes Promocionales</strong></a>
                            <ul id="dropdownpaquetes" class="collapse list-unstyled ">
                                <li><a href="/Paquetes/listarsolicitudes"><i class="fas fa-list-ul"></i> Listar solicitudes</a></li>
                                <li><a href="/Paquetes/listarpaquetes"><i class="fas fa-list-ul"></i> Listar paquetes</a></li>
                                <li><a href="/Paquetes/listarservicios"><i class="fas fa-list-ul"></i> Listar servicios</a></li>
                                <li><a href="/Paquetes/listaratributos"><i class="fas fa-list-ul"></i> Listar atributos</a></li>
                                <li><a href="/Paquetes/listarformaspago"><i class="fas fa-list-ul"></i> Listar formas pago</a></li>
                                <li><a href="/Paquetes/listarcategoria"><i class="fas fa-list-ul"></i> Listar categorías</a></li>
                                <li><a href="/Paquetes/listarMensajes"><i class="fas fa-envelope"></i> Mensajes de contacto</a></li>
                                <!-- <li><a href="/Paquetes/reporte"><i class="fas fa-chart-pie"></i> Reportes</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
            </nav>
        <!-- <?php } ?> -->