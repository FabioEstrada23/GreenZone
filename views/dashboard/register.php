<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Registrar primer usuario');
?>

<!-- Formulario para registrar al primer usuario del dashboard -->

<section>
            
        <div class="container-reg">
                
                <div class= "register-form">
                    <img src="../../resources/img/logos/lg_head.png" class="logoreg img-fluid">
                    <h1 class="title"> Registrar primer usuario</h1>

                    <form method="post" id="register-form">
                        
                        <!-- Ingresar nombres de usuario -->
                        
                        <label for="nombres"><i class="material-icons prefix">person</i> Nombres:</label>
                        <input id="nombres" type="text" placeholder="Ingresa tus nombres" name="nombres" class="validate" autocomplete="off" required/>
                        <!-- Ingresar apellidos de usuario -->

                        <label for="apellidos">Apellidos:</label>
                        <input id="apellidos" type="text" placeholder="Ingresa tus apellidos" name="apellidos" class="validate" autocomplete="off" required/>

                        <!-- Ingresar correo de usuario -->

                        <label for="correo"><i class="material-icons prefix">email</i> Correo:</label>
                        <input id="correo" type="email" placeholder="Ingresa tu correo" name="correo" class="validate" autocomplete="off" required/>

                        <!-- Ingresar alias de usuario -->

                        <label for="alias">Nickname:</label>
                        <input id="alias" type="text" placeholder="Ingresa tu nickname" name="alias" class="validate" autocomplete="off" required/>
                        
                        <!-- Ingresar contraseña de usuario -->

                        <label for="clave1"><i class="material-icons prefix">security</i> Contraseña</label>
                        <input id="clave1" type="password" placeholder="Ingresa tu contraseña" name="clave1" class="validate" autocomplete="off" required/>
                        
                        <!-- Confirmar contraseña de usuario -->

                        <label for="clave2">Confirmar clave</label>
                        <input id="clave2" type="password" placeholder="Ingresa nuevamente tu contraseña" name="clave2" class="validate" autocomplete="off"required/>

                        <button type="submit" id="btn-registro" class="tooltipped" data-tooltip="Registrar">Registrar</button>

                    </form>
                </div>
        </div>

</section>
        <br>

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
<script type="text/javascript" src="../../resources/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../../app/helpers/components.js"></script>
<script type="text/javascript" src="../../app/controllers/dashboard/register.js"></script>

</body>

</html>