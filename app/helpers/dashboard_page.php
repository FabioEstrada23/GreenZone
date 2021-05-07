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
        
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: private_index.php");
            
        }
    
    }    
}  
?>  
    
