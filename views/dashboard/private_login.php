<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Iniciar sesión');
?>

<main>
    <section>
            
            <div class="container-all">
                
                <div class= "ctn-form">
                    <img src="../../resources/img/logos/lg_head.png" class="logo img-fluid">
                    <h1 class="title"> Iniciar sesión</h1>

                    <form method="post" id="session-form">
                        
                        <!-- Ingresar nombre de usuario -->
                        <label for="username">Usuario</label>
                        <input type="text" placeholder="Ingresa tu usuario" name="username" class="validate" required>
                        <!-- Ingresar contresenia de usuario -->
                        <label for="password">Contraseña</label>
                        <input type="password" placeholder="Ingresa tu contraseña" name="clave" class="validate" required>
                        <input type="submit" value="Log In">

                    </form>
                </div>
                <div class="ctn-text">

                    <div class="capa"></div>
                    <h1 class="title-description">Evita lo pasajero, piensa en el mañana</h1>

                </div>
            </div>
        </section>
        <br>

        </main>



<aside class="text-center text-lg-start" id="LoginFooter">

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
                        <i class="fas fa-phone fa-2x"></i>
                    </div>
                    <div class="col-4">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </div>
                    <div class="col-4">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                </div>
            </div>
            <!-- Div para Redes Sociales -->
            <div class="col-12 col-lg-3 col-md-6 mb-4 mb-md-0 ">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-uppercase">Nuestras Redes</h5>
                    </div>
                    <div class="col-7">
                        <i class="fab fa-instagram fa-2x"></i>
                    </div>
                    <div class="col-1">
                        <i class="fab fa-facebook-square fa-2x"></i>
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
<script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
<script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
</body>

</html>