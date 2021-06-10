<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Tu tienda en línea de productos ecoamigables');
?>


<div class="container" id="ContainerBusqueda">
    <!-- row principal -->
    <div class="row">

        <div class="col-12 col-1 col-xs-12 col-sm-12 d-lg-none">

        </div>

        <!-- Barra de Navegacion Lateral -->
       
        <div class="col-12 fondo text-center">
                            <h1 id="title"></h1>
        </div>

        <div class="col-12 col-xs-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8">
            
            <div class="row" id="productos">

                

            </div>

        </div>


    </div>
</div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('productos.js');
?>


