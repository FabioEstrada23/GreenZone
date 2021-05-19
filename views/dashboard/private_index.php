<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../resources/css/private_index.css">
    <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
    <title>Página principal</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-light bg-light">

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
                    <a href="#" class="d-block text-light p-3"><i class="icon ion-md-cart mr-2 lead"></i> Productos</a>
                    <a href="../../views/dashboard/marca.php" class="d-block text-light p-3"><i class="icon ion-md-pricetag mr-2 lead"></i> Marcas</a>
                    <a href="../../views/dashboard/proveedores.php" class="d-block text-light p-3"><i class="icon ion-md-globe mr-2 lead"></i> Proveedores</a>
                    <a href="../../views/dashboard/oferta.php" class="d-block text-light p-3"><i class="icon ion-md-cart mr-2 lead"></i> Oferta</a>
                    <a href="#" class="d-block text-light p-3"><i class="icon ion-md-clipboard mr-2 lead"></i> Reportes</a>
                    <a href="#" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Usuarios</a>
                    <a href="../../views/dashboard/valoraciones.php" class="d-block text-light p-3"><i class="icon ion-md-star mr-2 lead"></i> Valoraciones</a>
                    <a href="#" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Pedidos</a>
                
            </nav>
        </div>
        <br>
        <section>
            <h1>Bienvenido</h1>
        </section>
    </div>
    <script src="../../resources/js/menu/menu.js"></script>
    <script src="../../app/controllers/dashboard/account.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>
</html>