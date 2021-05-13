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
                <link rel="stylesheet" type="text/css" href="../../resources/css/register.css">
                
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
                    
                    
                        
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_empleado'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'private_login.php' && $filename != 'register.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                self::modals();
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                ');
            } else {
                header('location: private_index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'private_login.php' && $filename != 'register.php') {
                header('location: private_login.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                ');
            }
        }
    }    
}  
?>  
    
