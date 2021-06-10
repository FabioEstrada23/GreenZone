<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Tu tienda en línea de productos ecoamigables');
?>

    <!-- Comenzamos a poner los elementos del main  -->
    <section>
            <div class="container">
                <!-- fila de tu Slider -->
                <div class="row" id="caberceraSlider">
                    <!-- columna de slider -->
                    <div class="col-12 d-none d-lg-block">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!-- primera imagen con texto -->
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <div class="row">
                                        <div class="col-4" id="texto-medio">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1>Bienvenido a <br> Green Zone</h1>
                                                </div>
                                                <div class="col-12">
                                                    <h6>Los mejores precios, increibles resultados</h6>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <img src="../../resources/img/slider/slider-5.png" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>

                                </div>
                                <!-- segunda imagen con texto -->
                                <div class="carousel-item" data-bs-interval="2000">
                                    <div class="row">
                                        <div class="col-4" id="texto-derecha">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1>Temporada de <br> Cremas</h1>
                                                </div>
                                                <div class="col-12">
                                                    <h5>Las mejores cremas ahora <br>
                                                        a mejor precio</h5>
                                                </div>
                                                <div class="col-12">
                                                    <br>
                                                    <a href="#"> Visitar</a>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <img src="../../resources/img/slider/slider-2.png" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- tercera imagen con texto -->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4" id="texto-izquierda">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1>Nuevas bolsas <br> economicas</h1>
                                                </div>
                                                <div class="col-12">
                                                    <h5>Encuentra nuestras nuevas bolsas <br> ecologicas a un mejor
                                                        precio</h5>
                                                </div>
                                                <div class="col-12">
                                                    <br>
                                                    <a href="#"> Visitar</a>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <img src="../../resources/img/slider/slider-3.png" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="prev">

                                <i class="fas fa-arrow-left" id="elementID"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <i class="fas fa-arrow-right" id="elementID"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 d-lg-none">
                        <img src="../../resources/img/banners/slider-4.jpeg" class="img-fluid" alt="1">

                    </div>
                </div>
                <br>
                <!-- fila de principales productos -->
                <div class="row ">



                    <div class="col-s12 p-4 text-center" id="textoLine">
                        <h1>Nuevos ingresos</h1>
                    </div>
                    <div class="col-s12 p-4">

                        <div class="row">

                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        </div>


                    </div>
                    
                    <div class="col-12 p-4">
                        <div class="row" id="fondoOferta">
                            
                            <div class="col-12 col-xs-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 text-center" id="TextoOferta">
                                <h1>¡NUEVAS OFERTAS!</h1>
                                <br>
                                <p>El verano se acerca y el nuestras ofertas se presentan, no dejes de aprovechar nuestras ofertas de verano.</p>
                                <br>
                                    <a href=""> VAMOS </a>
                                
                                
                                
                        
                            </div>

                            <div class="col-12 col-xs-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8 text-center">
                                <img src="https://d20ga1agp72kf9.cloudfront.net/bewe/blog/2018-04-productos-ecologicos-para-peluqueria-1-full.jpg" class="img-fluid" alt="">
                            </div>

                            
                        </div>
                        <br>
                    </div>
                    
                    <div class="col-s12 p-4 text-center" id="textoLine">
                        
                        <h1>Productos mas vendidos</h1>
                    </div>

                    




                    <div class="col-12 p-4">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="box">
                                    <!-- caja de imagenes -->
                                    <div class="slider-img">
                                        <img src="https://www.regalosfrikis.com/wp-content/uploads/2013/04/regalos-frikis-sombrero-de-paja-luffy-one-piece.jpg"
                                            alt="1">
                                        <!-- overlay -->
                                        <div class="overlay">
                                            <!-- comprar-btn -->
                                            <a href="" class="buy-btn">Compralo</a>
                                        </div>
                                    </div>
                                    <!-- detalles del producto -->
                                    <div class="detail-box">
                                        <!-- tipo -->
                                        <div class="type">
                                            <a href="">Sombrero de paja 1</a>
                                            <span>Disponible</span>
                                        </div>
                                        <!-- Precio -->
                                        <a href="#" class="price">10$</a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        </div>

                        </div>
                        
                    </div>


                    <div class="col-12 text-center0 p-4">
                        <img src="../../resources/img/banners/banner-1.png" class="img-fluid" alt="1">
                    </div>

                    


                </div>


                <br>
            </div>



            <?php

            
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('index.js');
?>

