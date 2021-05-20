<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../resources/css/plantillasCSS/PlantillaPrivada.css">
    <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
    <link rel="stylesheet" type="text/css" href="../../resources/css/private_index.css">

    <title>Página principal</title>
</head>
<body>

<div class="container-fluid">
    <header>
        <div class="row">

            <nav class="navbar fixed-top navbar-light bg-light">

                <div class="container-fluid">
                    <img class="hamburguer" src="../../resources/img/menu.png">
                    <button id="nada">
                        
                    </button>
                    <div>
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a id="configuracion" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons left">verified_user</i>Usuario: <b><?php echo ucwords($_SESSION['alias_emp']); ?></b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    <li><a class="dropdown-item" href="#" onclick="logOut()">Cerrar sesión</a></li>
                                </ul>
                            </li>
                        </ul>            
                    </div>            
                </div>               
            </nav>
            
        </div>
        <div class="row">
            <nav class="menu-navegacion">
                
                    <img src="../../resources/img/logos/lg_head.png" class="logo img-fluid">
                    <a href="../../views/dashboard/private_index.php" class="d-block text-light p-3"><i class="icon ion-md-home mr-2 lead"></i> Inicio</a>
                    <a href="../../views/dashboard/agregar_producto.php" class="d-block text-light p-3"><i class="icon ion-md-cart mr-2 lead"></i> Productos</a>
                    <a href="../../views/dashboard/marca.php" class="d-block text-light p-3"><i class="icon ion-md-pricetag mr-2 lead"></i> Marcas</a>
                    <a href="../../views/dashboard/proveedores.php" class="d-block text-light p-3"><i class="icon ion-md-globe mr-2 lead"></i> Proveedores</a>
                    <a href="../../views/dashboard/oferta.php" class="d-block text-light p-3"><i class="icon ion-md-cart mr-2 lead"></i> Oferta</a>
                    <a href="#" class="d-block text-light p-3"><i class="icon ion-md-clipboard mr-2 lead"></i> Reportes</a>
                    <a href="../../views/dashboard/empleados.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Usuarios</a>
                    <a href="../../views/dashboard/valoraciones.php" class="d-block text-light p-3"><i class="icon ion-md-star mr-2 lead"></i> Valoraciones</a>
                    <a href="../../views/dashboard/pedidos.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Pedidos</a>
                    <a href="../../views/dashboard/categorias.php" class="d-block text-light p-3"><i class="icon ion-md-apps mr-2 lead"></i> Categorías</a>
            </nav>
        </div>
    </header>        
        <main>
    
    
