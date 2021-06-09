<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Carrito de compras');
?>


<section>
        <div class="container-fluid">
            <!-- Espacio para links de regresar a comprar y cosas extras -->
            <div class="container">
                <div class="row">
                    <div class="col-6 text-start" id="regresar">
                        <div class="bkl">
                            <i class="fas fa-chevron-left"></i><a href="">
                                <h6>Regresar</h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 text-end" id="regresar">
                        <div class="bkl2">
                            <a href="">
                                <h6>Contactanos</h6>
                            </a>
                            <i class="fas fa-chevron-right"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="container p4">
    <!-- Divisiones principales -->
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8">
                    <!-- titulo del carrito de compra -->
                    <div class="row">
                        <div class="col-12 fondo text-left">
                            <h1>Carrito de Compras</h1>
                        </div>
                        <!-- Tabla con sus productos -->
                        <div class="col-12 text-center">
                            <br>
                            <table class="table table-dark table-striped">
                                <thead>

                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col"></th>
                                    </tr>

                                </thead>

                                <tbody id="tbody-rows">

                                </tbody>


                            </table>

                            <br>

                        </div>
                    </div>
                </div>
                <!-- Columna de Total a pagar -->
                <div class="col-12 col-xs-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 text-center">
                    <div class="col-12 fondo">
                        <h1>Total a Pagar:</h1>
                    </div>
                    <br>
                    <div class="col-12 fondoHijo text-start">
                        
                        <h6>Precio de Final:  <b id="pago"></b></h6>
                    </div>
                    <br>
                    <!-- Botones de comprar -->
                    <div class="col-12 fondoHijo2">
                        <div class="row">
                            <div class="col-6">
                            <button type="button" onclick="finishOrder()" class="btn waves-effect blue tooltipped" data-tooltip="Finalizar pedido"><i class="material-icons">payment</i></button>
                            </div>
                            <div class="col-6">
                            <a href="index.php" class="btn waves-effect indigo tooltipped" data-tooltip="Seguir comprando"><i class="material-icons">store</i></a>
                            </div>
                            
                        </div>
                        

                        
                    </div>
                    <form method="post" id="item-form"> 
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                                <div class="form-group d-none">
                                    <label for="formGroupExampleInput">ID:</label>
                                    <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1"  type="text"
                                         class="validate" id="id_detalle_pedido" name="id_detalle_pedido" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Cantidad:</label>
                                    <input type="number" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="cantidad" 
                                        name="cantidad" min="1" class="validate" required>
                                </div>

                        </div>
                        </form>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



                    
                </div>
            </div>
            <br> 
            <!-- Banner de Publicidad -->
            <div class="row">
                <div class="col-12">
                    <img src="../../resources/img/banners/banner-1.png" class="img-fluid" alt="1">
                </div>
                
            </div>
            <br>
        </div>
    </section>



    <?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('cart.js');
?>