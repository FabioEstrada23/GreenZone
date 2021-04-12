<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");
?>


<section class="user-profile-section">
    <div class="user-profile-header">
        <div class="user-profile-corver-page">
            <div class="user-profile-avatar">
                <!-- Imagen de perfil-->
                <img src="../../resources/img/icon_user.png" alt="img-avatar">
                <button type="button" class="button-avatar">
                        <i class="far fa-image"></i>
                </button>
            </div>
            <!-- Boton cambiar fondo-->
            <button type="button" class="button-cover-page">
                    <i class="far fa-image"></i> Cambiar fondo
            </button>
        </div>
    </div>
    <div class="user-profile-body">
            <div class="user-profile-bio">
                <!-- Biografia -->
                <h3 class="title">Fabio Lehilud Estrada Zuniga</h3>
                <p class="text">Ingeniero en sistemas y amante de los juegos de disparos. Le encantan las mujeres</p>
            </div>
            <div class="user-profile-footer">
                <!-- Datos del usuario -->
                <ul class="data-list">
                    <li><i class="icono fas fa-user"></i> Nombre de usuario: FabioEstrada</li>
                    <li><i class="icono fas fa-at"></i> Correo electrónico: FabioEstrada@gmail.com</li>
                    <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento: 02-03-2003</li>
                </ul>
                <ul class="data-list">
                    <li><i class="icono fas fa-map-marker-alt"></i> Ubicacion: San Salvador, mejicanos</li>
                    <li><i class="icono fas fa-phone-alt"></i> Teléfono: 2257-7777</li>
                </ul>
               <div class="editar">
                    <!-- Boton guardar -->
                    <button type="button" class="button-edit">
                        <i class="far fa-edit"></i> Editar
                    </button>
                </div>
            </div>

            
                
            <div class="social-media">
                <a href="" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>
        </div>  
</section>
<br>


<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>