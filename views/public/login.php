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
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
                <!-- Ingresar nombre de usuario -->
                <label for="username"><i class="material-icons prefix">email</i> Correo</label>
                <input type="text" placeholder="Ingresa tu email" id="correo" name="correo" autocomplete="off" class="validate" required>
                <!-- Ingresar contresenia de usuario -->
                <label for="password"><i class="material-icons prefix">security</i> Contraseña</label>
                <input type="password" placeholder="Ingresa tu contraseña" id="clave" name="clave" class="validate" required>
                <label class="text-center">
                    <input type="checkbox" id="verificacion" name="verificacion" required/>
                    <label id="verifica">Comprueba de que eres humano</label>
                </label>
                <input type="submit" value="Log In" onclick="openCambiarContra()">
            </form>


            <form method="post" id="confirmar-form">
                <!-- Modal -->
                <div class="modal fade" id="confirmar-modal" tabindex="-1" aria-labelledby="confirmar-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresa el codigo de confirmacion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-select" id="codigo" autocomplete="off" name="codigo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                            <button  type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Recuperacion de contrasenia -->
            <span class="text-footer">¿Perdiste tu contraseña?
                <a href="recuperacion.php">Recupérala</a>
            </span>
            <!-- Registro -->
            <span class="text-footer">¿No tienes una cuenta?
                <a href="registro.php">Créala</a>
            </span>
        </div>
        <div class="ctn-text">

            <div class="capa"></div>
            <h1 class="title-description">Evita lo pasajero, piensa en el mañana</h1>

        </div>
    </div>

    <!-- Agregamos SCRIPTS -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LeBqFccAAAAAKKKyrQri1N3nktSRu1YR8TC2iNs"></script>
    <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/login.js"></script>
</body>
</html>