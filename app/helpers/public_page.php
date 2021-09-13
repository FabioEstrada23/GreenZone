<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Public_Page
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
        <title>GreenZone - '.$title.'</title>
        <link rel="stylesheet" type="text/css" href="../../resources/css/login/login_style.css">
        <!-- Codificacion de caracteres -->
        <meta charset="UTF-8">
        <!-- Espacio para agregar los LINK -->
        <!-- Iconos de Google -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
        <!-- Agregamos CSS Style -->
        <link rel="stylesheet" type="text/css" href="../../resources/css/plantillasCSS/PlantillaPublica.css">
        <link rel="stylesheet" type="text/css" href="../../resources/css/plantillasCSS/PlantillaPrivada.css">
        <link rel="stylesheet" href="../../resources/css/plantillasCSS/reportes.css">
        <!-- Vista de Compatibilidad -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Optimizacion en equipos pequeñes -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descripcion de nuestro sitio web -->
        <meta name="description"
            content="Green Zone, es una tienda en linea dedicada a la venta de productos ecoamigables, con el objetivo de promover el uso de estos y combatir pasivamente la contaminacion de ciertos produtos">
        <!-- Palabras claves de nuestro sitio web -->
        <meta name="keywords"
            content="Ecologico, Ambiente, Reciclaje, Tienda, Productos, Tienda en linea, Productos ecoamigables">
        <!-- Autor del sitio web -->
        <meta name="author" content="Green Zone Team">
        <!-- Copyright -->
        <meta name="copyright" content="Green Zone Team 2021">
    </head>

    <body>
    
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_cliente_user'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'login.php' && $filename != 'registro.php' && $filename != 'codigo.php' && $filename != 'recuperacion.php') {
                print('
                <!-- Header -->
                <header>
                    <!-- Container para Header -->
                    <div class="container-fluid">
                        <div class="row ">
                            <nav class="navbar fixed-top navbar-expand-lg" id="mnSuperior">
                                <!-- Columna Logo -->
                                <div class="col-11 col-xs-11 col-sm-11 col-lg-2 col-xl-2 col-xxl-2 text-center">
                                    <img src="../../resources/img/logos/lg_head.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                                    <button class="btn btn-primary ">
                                        <i class="far fa-user"></i>
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
                                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                                        aria-describedby="basic-addon1">
                                    <!-- Boton de buscar -->
                                    <button class="btn" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black"
                                            class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Iniciar Sesion -->
                                <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
                                    <button class="btn btn-primary ">
                                        <a href="#" onclick="openProfileDialog()"class="btn waves-effect blue tooltipped" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile"><i class="far fa-user"></i> Perfil</a>
                                    </button>
                                    <button class="btn btn-primary ">
                                        <a href="#" onclick=""class="btn waves-effect blue tooltipped" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal-cli"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a>
                                    </button>
                                    <button class="btn btn-primary ">
                                        <a href="#" onclick="logOut()"><i class="fas fa-times"></i> Cerrar sesión</a>
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
                                    <i class="fas fa-bars"></i> Navegacion
                                </button>
                                <button id="btn-menu-cerrar" class="btn-menu-cerrar">
                                    <i class="fas fa-times"></i>
                                </button>
            
                            </div>
            
            
            
                            <!-- Contenedor de los Enlaces -->
                            <div class="container contenedor-enlaces-nav">
                                <div class="btn-categorias" id="btn-categorias">
                                    <h7>Navegar por <span>Categorias</span></h7>
                                    <i class="fas fa-caret-down"></i>
                                </div>
            
                                <div class="enlaces">
                                    <a href="../../views/public/index.php"><i class="fas fa-home"></i> Inicio</a>
                                    <a href="#"><i class="fas fa-percentage"></i> Ofertas</a>
                                    <a href="#"><i class="fas fa-ticket-alt"></i> Marcas</a>
                                    <a href="../../views/public/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
                                    <a href="../../views/public/pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos</a>
                                </div>
            
                            </div>
            
                            <!-- COLAPSABLE -->
                            <div class="container contenedor-grid">
                                <div class="grid" id="grid">
                                    <div class="categorias">
                                        <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                        <h3 class="subtitulo">Navegacion</h3>
            
                                        <a href="productos.php?id=1&nombre=Accesorios" data-categoria="accesorios">Accesorios <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=2&nombre=Bolsas" data-categoria="bolsas">Bolsas <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=3&nombre=Botellas" data-categoria="botellas">Botellas <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=4&nombre=Cuidado%20personal" data-categoria="cuidado-personal">Cuidado Personal <i
                                                class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=5&nombre=Limpieza" data-categoria="limpieza">Limpieza <i class="fas fa-angle-right"></i></a>
            
            
                                    </div>
                                    <div class="contenedor-subcategorias">
            
                                        <div class="subcategoria activo" data-categoria="accesorios">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Accesorios</h3>
                                                </a>
                                                <a href="">
                                                    <p>Los mejores accesorios para tu vida cotidiana con la ventaja de ayudar al
                                                        ecosistema</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="http://1.bp.blogspot.com/-udWJtfuDVe0/T0R1TnigfOI/AAAAAAAAAEA/xuG3kaIgYs4/s1600/IMG_2141.JPG"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
            
            
                                        <div class="subcategoria " data-categoria="bolsas">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Bolsas</h3>
                                                </a>
                                                <a href="">
                                                    <p>Dejemos de contaminar el medio ambiente, con estas bolsas biodegradables todo
                                                        sera mejor</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://gen-es.org/wp-content/uploads/2020/01/porque-debo-usas-bolsas-ecologicas.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="botellas">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Botellas</h3>
                                                </a>
                                                <a href="">
                                                    <p>El plastico va y viene, nuestras botellas se mantienen </p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://ecoosfera.com/wp-content/imagenes/2018/05/botellas-agua-reutilizables-mas-ecologicas-diferencias-.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="cuidado-personal">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Cuidado Personal</h3>
                                                </a>
                                                <a href="">
                                                    <p>Que lo artificial no limite tu bellesa natura, nuestros productos solo
                                                        reflejan tu "yo" verdadero</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://ezoco.org/loliyelamos/wp-content/uploads/sites/406/2020/02/shutterstock_114522214_2000x.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="limpieza">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Limpieza</h3>
                                                </a>
                                                <a href="">
                                                    <p>Evita los quimicos dañinos, usa lo que la naturaleza nos dio</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://www.zschimmer-schwarz.es/app/uploads/2020/10/productos-de-limpieza-sostenibles-detergentes-ecologicos-certificaciones-sostenibles-1280x720.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                            <!-- Termina Colapsable -->
            
                        </nav>
                    </div>
            
                </header>

                <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="profile-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="formGroupExampleInput1"><i class="material-icons prefix">how_to_reg</i> DUI</label>
                                <input type="text" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" name="dui_cli" id="dui_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                <label for="correo"><i class="material-icons prefix">phone</i> Teléfono</label>
                                <input type="text" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" id="telefono_cli" name="telefono_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                <label for="correo"><i class="material-icons prefix">email</i> Correo</label>
                                <input type="text" placeholder="Ingresa tu correo electrónico" id="correo" name="correo" class="validate" required>
                                </div>
                                <div class="form-group">
                                <label for="nombre"><i class="material-icons prefix">person</i> Nombres</label>
                                <input type="text" placeholder="Ingresa tu nombre" id="nombres_cli" name="nombres_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                <label for="nombre"><i class="material-icons prefix">person</i> Apellidos</label>
                                <input type="text" placeholder="Ingresa tu apellido" id="apellidos_cli" name="apellidos_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                <label for="nombre"><i class="material-icons prefix">my_location</i> Dirección</label>
                                <input type="text" placeholder="Ingresa tu dirección" id="direccion_cli" name="direccion_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="marca2"> Ciudad</label>
                                    <select class="form-select" aria-label="Select" id="ciudad" name="ciudad">
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="nombre"> Código postal</label>
                                <input type="text" placeholder="Ingresa código postal" id="codigo_pos_cli" name="codigo_pos_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Fecha Nacimiento:</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="fecha_nac_cli"
                                        name="fecha_nac_cli" class="validate" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="marca2"> Género</label>
                                    <select class="form-select" aria-label="Select" id="genero" name="genero">
                                        <option disabled selected>Seleccione una opción</option>
                                        <option value="M">Mujer</option>
                                        <option value="H">Hombre</option>
                                    </select>
                                </div>
                        </div>
                        


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="password-modal-cli" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="password-form-cli" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_actual">Clave actual</label>   
                                            <input id="clave_actual_cli" type="password" name="clave_actual_cli" class="validate form-control" required/>
                                            
                                        
                                    </div>
                                    <br>
                                    <div class="center-align">
                                        <label>CLAVE NUEVA</label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_1">Clave</label>
                                            <input id="clave_nueva_1_cli" type="password" name="clave_nueva_1_cli" class="validate form-control" required/>
                                            
                                            
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_2">Confirmar clave</label>   
                                            <input id="clave_nueva_2_cli" type="password" name="clave_nueva_2_cli" class="validate form-control" required/>
                                            
                                    </div>        
                                </div>  
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>                 
                <main>
                ');
            } else {
                header('location: index.php');
            }
        } else {

            if($filename != 'login.php' && $filename != 'codigo.php' && $filename != 'recuperacion.php') {
                print('
                <!-- Header -->
                <header>
                    <!-- Container para Header -->
                    <div class="container-fluid">
                        <div class="row ">
                            <nav class="navbar fixed-top navbar-expand-lg" id="mnSuperior">
                                <!-- Columna Logo -->
                                <div class="col-11 col-xs-11 col-sm-11 col-lg-2 col-xl-2 col-xxl-2 text-center">
                                    <img src="../../resources/img/logos/lg_head.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                                    <button class="btn btn-primary ">
                                        <i class="far fa-user"></i>
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
                                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                                        aria-describedby="basic-addon1">
                                    <!-- Boton de buscar -->
                                    <button class="btn" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black"
                                            class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Iniciar Sesion -->
                                <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
                                    <button class="btn btn-primary ">
                                        <a href="../../views/public/registro.php"><i class="far fa-user"></i> Crear cuenta</a>
                                    </button>
                                    <button class="btn btn-primary ">
                                        <a href="../../views/public/login.php"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
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
                                    <i class="fas fa-bars"></i> Navegacion
                                </button>
                                <button id="btn-menu-cerrar" class="btn-menu-cerrar">
                                    <i class="fas fa-times"></i>
                                </button>
            
                            </div>
            
            
            
                            <!-- Contenedor de los Enlaces -->
                            <div class="container contenedor-enlaces-nav">
                                <div class="btn-categorias" id="btn-categorias">
                                    <h7>Navegar por <span>Categorias</span></h7>
                                    <i class="fas fa-caret-down"></i>
                                </div>
            
                                <div class="enlaces">
                                <a href="../../views/public/index.php"><i class="fas fa-home"></i> Inicio</a>
                                <a href="#"><i class="fas fa-percentage"></i> Ofertas</a>
                                <a href="#"><i class="fas fa-ticket-alt"></i> Marcas</a>
                                <a href="../../views/public/carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
                                <a href="../../views/public/pedidos.php"><i class="fas fa-shopping-cart"></i> Pedidos</a>
                                </div>
            
                            </div>
            
                            <!-- COLAPSABLE -->
                            <div class="container contenedor-grid">
                                <div class="grid" id="grid">
                                    <div class="categorias">
                                        <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                        <h3 class="subtitulo">Navegacion</h3>
            
                                        <a href="productos.php?id=1&nombre=Accesorios" data-categoria="accesorios">Accesorios <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=2&nombre=Bolsas" data-categoria="bolsas">Bolsas <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=3&nombre=Botellas" data-categoria="botellas">Botellas <i class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=4&nombre=Cuidado%20personal" data-categoria="cuidado-personal">Cuidado Personal <i
                                                class="fas fa-angle-right"></i></a>
                                        <a href="productos.php?id=5&nombre=Limpieza" data-categoria="limpieza">Limpieza <i class="fas fa-angle-right"></i></a>
            
            
                                    </div>
                                    <div class="contenedor-subcategorias">
            
                                        <div class="subcategoria activo" data-categoria="accesorios">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Accesorios</h3>
                                                </a>
                                                <a href="">
                                                    <p>Los mejores accesorios para tu vida cotidiana con la ventaja de ayudar al
                                                        ecosistema</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="http://1.bp.blogspot.com/-udWJtfuDVe0/T0R1TnigfOI/AAAAAAAAAEA/xuG3kaIgYs4/s1600/IMG_2141.JPG"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
            
            
                                        <div class="subcategoria " data-categoria="bolsas">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Bolsas</h3>
                                                </a>
                                                <a href="">
                                                    <p>Dejemos de contaminar el medio ambiente, con estas bolsas biodegradables todo
                                                        sera mejor</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://gen-es.org/wp-content/uploads/2020/01/porque-debo-usas-bolsas-ecologicas.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="botellas">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Botellas</h3>
                                                </a>
                                                <a href="">
                                                    <p>El plastico va y viene, nuestras botellas se mantienen </p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://ecoosfera.com/wp-content/imagenes/2018/05/botellas-agua-reutilizables-mas-ecologicas-diferencias-.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="cuidado-personal">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Cuidado Personal</h3>
                                                </a>
                                                <a href="">
                                                    <p>Que lo artificial no limite tu bellesa natura, nuestros productos solo
                                                        reflejan tu "yo" verdadero</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://ezoco.org/loliyelamos/wp-content/uploads/sites/406/2020/02/shutterstock_114522214_2000x.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subcategoria " data-categoria="limpieza">
                                            <div class="info-subcategoria">
                                                <button class="btn-regresar"><i class="fas fa-arrow-left"></i> Regresar</button>
                                                <a href="">
                                                    <h3 class="subtitulo">Limpieza</h3>
                                                </a>
                                                <a href="">
                                                    <p>Evita los quimicos dañinos, usa lo que la naturaleza nos dio</p>
                                                </a>
                                            </div>
                                            <div class="banner-subcategoria">
                                                <a href="#">
                                                    <img src="https://www.zschimmer-schwarz.es/app/uploads/2020/10/productos-de-limpieza-sostenibles-detergentes-ecologicos-certificaciones-sostenibles-1280x720.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                            <!-- Termina Colapsable -->
            
                        </nav>
                    </div>
            
                </header>
            
                <main>
                ');
            } else {
                
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
        if (isset($_SESSION['id_cliente_user'])) {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script src="../../resources/js/MenuInferior/mnInferior.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script src="../../app/controllers/public/cuenta.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/valoraciones.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script src="../../resources/js/MenuInferior/mnInferior.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/valoraciones.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/' . $controller . '"></script>
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
    
