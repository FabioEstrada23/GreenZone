<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");

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
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col"></th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <tr class="table-light">
                                        <th scope="row"><img src="https://cosmeticanaturalkaylos.com/wp-content/uploads/foto-aceite-de-calendula-2.jpg" class="img-fluid" alt=""></th>
                                        <td>Crema Natural</td>
                                        <td>3</td>
                                        <td>4.50 $</td>
                                        <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>

                                    <tr class="table-light">
                                        <th scope="row"><img src="https://cosmeticanaturalkaylos.com/wp-content/uploads/foto-aceite-de-calendula-2.jpg" class="img-fluid" alt=""></th>
                                        <td>Crema Natural</td>
                                        <td>3</td>
                                        <td>4.50 $</td>
                                        <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>

                                    <tr class="table-light">
                                        <th scope="row"><img src="https://cosmeticanaturalkaylos.com/wp-content/uploads/foto-aceite-de-calendula-2.jpg" class="img-fluid" alt=""></th>
                                        <td>Crema Natural</td>
                                        <td>3</td>
                                        <td>4.50 $</td>
                                        <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>

                                    <tr class="table-light">
                                        <th scope="row"><img src="https://cosmeticanaturalkaylos.com/wp-content/uploads/foto-aceite-de-calendula-2.jpg" class="img-fluid" alt=""></th>
                                        <td>Crema Natural</td>
                                        <td>3</td>
                                        <td>4.50 $</td>
                                        <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                </tbody>


                            </table>

                            <br>

                        </div>
                    </div>
                </div>
                <!-- Columna de Total a pagar -->
                <div class="col-12 col-xs-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 text-center">
                    <div class="col-12 fondo">
                        <h1>Total a Pagar: </h1>
                    </div>
                    <br>
                    <div class="col-12 fondoHijo text-start">
                        
                        <h6>Precio Productos:</h6>
                        <br>
                        <h6>Precio de Envio:</h6>
                        <br>
                        <h6>Precio de Final:</h6>
                    </div>
                    <br>
                    <!-- Botones de comprar -->
                    <div class="col-12 fondoHijo2">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-light">Hacer Pedido</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-light">Volver</button>
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
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>