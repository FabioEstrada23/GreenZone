<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
include("../../app/helpers/private_header.php");
?>
<main>
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
        <br>

    </div>
    <br>
    <!-- Se muestra un saludo de acuerdo con la hora del empleado -->
        <div class="row">
            <h4 class="text-center blue-text" id="greeting"></h4>
        </div>

        <!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
        <div class="row">
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                <canvas id="chartCategorias"></canvas>
            </div>
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
                <canvas id="chartPastelCategorias"></canvas>
            </div>
            <br>
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de barras con la cantidad de productos por marca -->
                <canvas id="charMarcas"></canvas>
            </div>
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de pastel con el porcentaje de productos por marca -->
                <canvas id="chartPastelMarcas"></canvas>
            </div>
            <br>
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de barras con la cantidad de de los cinco producto más comprados -->
                <canvas id="charMostSelling"></canvas>
            </div>
            <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Se muestra una gráfica de pastel con el porcentaje de los cinco producto más comprados -->
                <canvas id="chartPastelMostSelling"></canvas>
            </div>
        </div>
    </main>
    <script src="../../resources/js/menu/menu.js"></script>
    <!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('main.js');
?>