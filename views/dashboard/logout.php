<!-- Código para destruir la sesión debido a la inactividad en el sitio privado -->
<?php
session_start();
//Cerrar sesión
unset($_SESSION['id_empleado']); 
//Redirigir al login para que inicie sesión de nuevo
header("Location: private_login.php");
?>

