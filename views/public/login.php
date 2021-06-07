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
    <link rel="stylesheet" type="text/css" href="../../resources/css/login/login_style.css">
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
    <title>Form Login | Green Zone Store</title>
</head>
<body>

   
    <div class="container-all">
        <div class= "ctn-form">
            <img src="../../resources/img/logos/lg_head.png" class="logo">
            <h1 class="title"> Iniciar sesión</h1>

            <form method="post" id="session-form">
                
                <!-- Ingresar nombre de usuario -->
                <label for="username"><i class="material-icons prefix">email</i> Correo</label>
                <input type="text" placeholder="Ingresa tu email" id="correo" name="correo" class="validate" required>
                <!-- Ingresar contresenia de usuario -->
                <label for="password"><i class="material-icons prefix">security</i> Contraseña</label>
                <input type="password" placeholder="Ingresa tu contraseña" id="clave" name="clave" class="validate" required>
                <input type="submit" value="Log In">

            </form>
            <!-- Recuperacion de contrasenia -->
            <span class="text-footer">¿Perdiste tu contraseña?
                <a href="Recuperacion.php">Recupérala</a>
            </span>
            <!-- Registro -->
            <span class="text-footer">¿No tienes una cuenta?
                <a href="Registro.php">Créala</a>
            </span>
        </div>
        <div class="ctn-text">

            <div class="capa"></div>
            <h1 class="title-description">Evita lo pasajero, piensa en el mañana</h1>

        </div>
    </div>

    <!-- Agregamos SCRIPTS -->
    <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/login.js"></script>
</body>
</html>