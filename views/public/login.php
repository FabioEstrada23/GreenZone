<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Iniciar sesión');
?>

<body class="login">

   
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
                <input type="submit" value="Log In" data-bs-toggle="modal" data-bs-target="#recuperacion-modal">
                
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