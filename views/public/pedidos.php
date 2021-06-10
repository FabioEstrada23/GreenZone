<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Pedidos');
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

            <!-- Modal detalle -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Detalles de pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                    <div class="col-12 text-center">
                            <br>
                            <table class="table table-dark table-striped">
                                <thead>

                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                    </tr>

                                </thead>

                                <tbody id="tbody-rows2">

                                </tbody>


                            </table>

                            <br>

                        </div>

                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                                </div>

                    
                        </div>
                    </div>
                </div>
            </div>

     </div>

</div>

<br>


</div>



<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('pedidos.js');
?>