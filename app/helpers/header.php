<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Codificacion de caracteres -->
    <meta charset="UTF-8">
    <!-- Espacio para agregar los LINK -->
    <!-- Iconos de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <!-- Agregamos CSS Style -->
    <link rel="stylesheet" href="../resources/css/style.css">
    <!-- Vista de Compatibilidad -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Optimizacion en equipos pequeñes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descripcion de nuestro sitio web -->
    <meta name="description" content="Green Zone, es una tienda en linea dedicada a la venta de productos ecoamigables, con el objetivo de promover el uso de estos y combatir pasivamente la contaminacion de ciertos produtos">
    <!-- Palabras claves de nuestro sitio web -->
    <meta name="keywords" content="Ecologico, Ambiente, Reciclaje, Tienda, Productos, Tienda en linea, Productos ecoamigables">
    <!-- Autor del sitio web -->
    <meta name="author" content="Green Zone Team">
    <!-- Copyright -->
    <meta name="copyright" content="Green Zone Team 2021">
    <!-- Titulo de nuestro Sitio Web -->
    <title>Green Zone Store</title>
</head>
<body>
    <!-- Header -->
    <header>
         <!-- Container para Header -->
        <div class="container-fluid">
            <div class="row ">  
                    <nav class="navbar navbar-expand-lg" id="mnSuperior">
                        <!-- Columna Logo -->
                        <div class="col-11 col-xs-11 col-sm-11 col-lg-2 col-xl-2 col-xxl-2 text-center">
                            <img src="../resources/img/logos/lg_head.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                            <button class="btn btn-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="Black" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                  </svg>  
                            </button>
                        </div>
                        
                        <!-- Columna Buscar -->
                        <div class="col-12 col-xs-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8 text-center" id="SearchBar">
                            <!-- Barra de Navegacion -->
                                    <!-- Categorias -->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Categorias</option>
                                        <option value="1">Accesorios</option>
                                        <option value="2">Bolsas</option>
                                        <option value="3">Botellas</option>
                                        <option value="4">Cuidado Personal</option>
                                        <option value="5">Limpieza</option>
                                    </select>
                                    <!-- Formulario -->
                                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
                                    <!-- Boton de buscar -->
                                    <button class="btn" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                   </button>
                        </div>
                        <!-- Iniciar Sesion -->
                        <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
                            <button class="btn btn-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="Black" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                  </svg> 
                                  Ingresar   
                            </button>
                        </div>
                    </nav>
            </div>
        </div> 
        
        <!-- Menu Inferior FULL CSS -->
        <div class="container-fluid" id="mnInferior">
            <!-- navegacion del menu inferior -->
            <nav class="menu" id="menu">
                <!-- Menu para desplegables Mobiles-->
                <div class="container contenedor-botones-menu">
                    <!-- Barras para Parte Menu Mobile -->
                    <button id="btn-menu-barras" class="btn-menu-barras">
                        <i class="fas fa-bars">

                        </i>
                    </button>                    
                    <button id="btn-menu-cerrar" class="btn-menu-cerrar">
                        <i class="fas fa-times">

                        </i>
                    </button>

                </div>

                

                <!-- Contenedor de los Enlaces -->
                <div class="container contenedor-enlaces-nav">
                    <div class="btn-categorias" id="btn-categorias">
                        <h7>Navegar por <span>Categorias</span></h7>
                        <i class="fas fa-caret-down"></i>
                    </div>

                    <div class="enlaces">
                        <a href="#">Inicio</a>
                        <a href="#">Ofertas</a>
                        <a href="#"> Marcas</a>
                        <a href="#"><i class="fas fa-shopping-cart"></i>  Carrito</a>
                    </div>

                </div>

                <!-- COLAPSABLE -->
                <div class="container contenedor-grid">
                    <div class="grid" id="grid">
                        <div class="categorias">
                            
                        </div>
                        <div class="contenedor-subcategorias"></div>
                    </div>
                </div>

            </nav>
        </div>
       
    </header>

    <main>