<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
include("../../app/helpers/header.php");

?>


<div class="container">

<div class="row">


    <div class="col-12 text-center" id="infoProveedor">
        <h1>Pedidos</h1>
     </div>

    <br>


     <div class="col-12">

     <div class="col-12 p- text-center">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped" id="tabla">
                                    <thead>

                                        <tr>
                                            <th scope="col">Pedido</th>
                                            <th scope="col">Fecha del Pedido</th>
                                            <th scope="col">Estado</th>
                                            <th class="actions-column">Acciones</th>
                                        </tr>

                                    </thead>

                                    <tbody id="tbody-rows">

                                    </tbody>
                                </table>



                            </div>

     </div>

</div>

<br>


</div>



<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('pedidos.js');
?>