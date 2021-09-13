<!-- Código para destruir la sesión debido a la inactividad en el sitio publico -->
<?php
session_start();
//Cerrar sesión
unset($_SESSION['id_cliente_user']); 
//Redirigir al login para que inicie sesión de nuevo
header("Location: login.php");
?>