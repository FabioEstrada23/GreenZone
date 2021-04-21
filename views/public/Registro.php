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
    <link rel="stylesheet" href="../../resources/css/Registro/Registro.css">
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
    <title>Form Registro de cuenta | Green Zone Store</title>
</head>
<body>
    <div class="container">
        <div class="signUp-box">
            <img src="../../resources/img/logos/lg_head.png" class="logo" alt="">
            <!-- Ingresar nombre de la persona -->
            <form>

            <h1 class="title"> Registro</h1>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Ingresa tu nombre">
            <!-- Ingresar apellidos de la persona -->
            <label for="apellidos">Apellidos</label>
            <input type="text" placeholder="Ingresa tus apellidos">
            <!-- Ingresar nombre de usuario -->
            <label for="username">Nombre de usuario</label>
            <input type="text" placeholder="Ingresa tu nombre de usuario">
            <!-- Ingresar correo electronico -->
            <label for="correo">Correo</label>
            <input type="text" placeholder="Ingresa tu correo electrónico">
            <!-- Ingresar fecha de nacimiento-->
            <label for="start">Fecha de nacimiento:</label>    
            <input type="date" id="start" name="trip-start"
                    value="2021-03-15"
                    min="2000-01-01" max="2021-12-31">
                <div>
                    <h1 class="title"> Llenado de contraseña</h1>
                </div>
                
                <!-- Ingresar contraseña -->
                <label for="password">Contraseña</label>
                <input class='password'type="password" placeholder="Ingresa tu contraseña">
                <!-- Ingresar contraseña -->
                <label for="passwordConfirm">Confirmar Contraseña</label>
                <input class='Confirm' type="password" placeholder="Ingresa nuevamente tu contraseña">
                <div class="text-center">
                    <input class='SignUp' type="submit" value="Registrar"></form>
                </div>
            <div class="text-center">
                <span class="text-footer">¿Ya tienes cuenta? 
                    <a href="login.php">Ingresa</a><br> 
                </span>
                 
            </div>
                          
            </form>
        </div>
    </div>
        
</body>
</html>