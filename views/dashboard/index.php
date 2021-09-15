<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Página principal');
?>
<main>
    
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