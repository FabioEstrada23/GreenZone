<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Dashboard_Page
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web y del contenido principal).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
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
        
            <title>'. $title.' </title>
        </head>
        <body>
                                
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_empleado'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'private_login.php' && $filename != 'register.php') {
                print('
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
                                                <i class="material-icons left">verified_user</i>Usuario: <b>'. ($_SESSION['alias_emp']) .'</b>
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
                                    <a href="../../views/dashboard/empleados.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Usuarios</a>
                                    <a href="../../views/dashboard/valoraciones.php" class="d-block text-light p-3"><i class="icon ion-md-star mr-2 lead"></i> Valoraciones</a>
                                    <a href="../../views/dashboard/pedidos.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Pedidos</a>
                                    <a href="../../views/dashboard/categorias.php" class="d-block text-light p-3"><i class="icon ion-md-apps mr-2 lead"></i> Categorías</a>      
                                    <a href="../../views/dashboard/clientes.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i> Clientes</a>
                            </nav>
                        </div>
                    </header>        
                        <main>                     
                    ');
                
            } else {
                header('location: private_index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'private_login.php' && $filename != 'register.php') {
                header('location: private_login.php');
            } else {
                print('
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
                    <link rel="stylesheet" type="text/css" href="../../resources/css/private_login.css">
                        <link rel="stylesheet" type="text/css" href="../../resources/css/register.css">
                
                    <title>'. $title.' </title>
                </head>
                <body>
                <header>
                    <div class="row">
                                <div id="cabecera">
                                <a href="private_login.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                                </div>
                    </div>
                </header>
                ');
            }
        }
    }    
       
    
    /*
    

    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se comprueba si existe una sesión de administrador para imprimir el pie respectivo del documento.
        if (isset($_SESSION['id_empleado'])) {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/menu/menu.js"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script src="../../app/controllers/dashboard/account.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script src="../../resources/js/menu/menu.js"></script>
                <script src="../../resources/js/MenuInferior/mnInferior.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            ';
        }
        print('
        </main>



        <aside class="text-center text-lg-start" id="ptFooter">
        
            <div class="container p-4  text-center">
        
                <div class="row">
                    <!-- Div para Informacion -->
                    <div class="col-12 col-lg-6 col-md-12">
                        <h1>¿Quienes Somos?</h1>
                        <p>Green Zone, es una tienda en linea dedicada a la venta de productos ecoamigables, con el objetivo
                            de promover el uso de estos y combatir pasivamente la contaminacion de ciertos produtos</p>
                    </div>
                    <!-- Div para Contacto -->
                    <div class="col-12 col-lg-3 col-md-6 ">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-uppercase">Contactanos</h5>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-phone fa-4x"></i>
                            </div>
                            <div class="col-4">
                                <i class="fab fa-whatsapp fa-4x"></i>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-envelope fa-4x"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Div para Redes Sociales -->
                    <div class="col-12 col-lg-3 col-md-6 mb-4 mb-md-0 ">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-uppercase">Nuestras Redes</h5>
                            </div>
                            <div class="col-6">
                                <i class="fab fa-instagram fa-4x"></i>
                            </div>
                            <div class="col-6">
                                <i class="fab fa-facebook-square fa-4x"></i>
                            </div>
                        </div>
                    </div>
        
                </div>
        
            </div>
        
            <footer>
                <!-- Derechos Reservados -->
                <div class="text-center p-3" id="ptDerechos">
                    @2021 Derechos Reservados:
                    <a class="text-white" href="#">Green Zone </a>
                </div>
            </footer>
        
        </aside>
    </div>    
        <!-- Agregamos SCRIPTS -->



                    ' . $scripts . '
                </body>
            </html>
        ');
    }

}  
?>  
    
