<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Dashboard_Page
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
                <meta charset="UTF-8">
                <title>Dashboard - ' . $title . '</title>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- CSS Bootstrap -->
                <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
                <!-- Agregamos CSS Style -->
                <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
                <link rel="stylesheet" type="text/css" href="../../resources/css/private_login.css">
                <title>Document</title>
            </head>
            <body>
            <header>
                        <div class="row">
                                    <div id="cabecera">
                                    <a href="private_login.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                                    </div>
                        </div>
            </header>
                    <main class="container">
                    
                        
        ');
    
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
        if (isset($_SESSION['id_empleado'])) {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/account.js"></script>
                <script src="../../resources/js/MenuInferior/mnInferior.js"></script>
                <script src="../../resources/js/MenuInferior/jquery-3.6.0.min.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
                <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
                <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
                <script src="../../resources/js/MenuInferior/mnInferior.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
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
        <!-- Agregamos SCRIPTS -->



                    ' . $scripts . '
                </body>
            </html>
        ');
    }

    
}  
?>  
    
