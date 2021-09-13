<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Codificacion de caracteres -->
    <meta charset="UTF-8">
    <!-- Espacio para agregar los LINK -->
    <!-- Iconos de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
    <!-- Agregamos CSS Style -->
    <link rel="stylesheet" href="../../resources/css/Recuperacion/Recuperacion.css">
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
    <title>Form Recuperación de contraseña | Green Zone Store</title>
</head>
<body>

    <div class="container">
        <div class="Recu">
        <img src="../../resources/img/logos/lg_head.png" class="logo">
            <h1 class="title"> Recuperación de contraseña</h1>
            <form id="recuperacion-form" method="post">
            <!-- Ingresar correo de usuario -->
            <label for="mail">Correo</label>
            <input id="correo" name="correo" type="text" placeholder="Ingresa tu correo" class="validate" required>
            <input class='Enviar' type="submit" value="Enviar mensaje" >
            <span class="text-footer">¿Recordaste la contraseña?
                <a href="login.php">Ingresa</a>
            </span>               
            </form>
        </div>
    </div>

    <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/recuperacion.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
        
    
</body>
</html>