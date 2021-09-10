<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Codificacion de caracteres -->
    <meta charset="UTF-8">
    <!-- Espacio para agregar los LINK -->
    <!-- Iconos de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
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
            <form method="post" id="register-form">
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
            <h1 class="title"> Registro</h1>
            <label for="nombre"><i class="material-icons prefix">person</i> Nombre</label>
            <input type="text" placeholder="Ingresa tu nombre" name="nombres" class="validate" autocomplete="off" required>
            <!-- Ingresar apellidos de la persona -->
            <label for="apellidos">Apellidos</label>
            <input type="text" placeholder="Ingresa tus apellidos" name="apellidos" class="validate" autocomplete="off" required>
            <!-- Ingresar nombre de usuario -->
            <label for="username">Nombre de usuario</label>
            <input type="text" placeholder="Ingresa tu nombre de usuario" name="usuario" class="validate" autocomplete="off" required/>
            <!-- Ingresar correo electronico -->
            <label for="correo"><i class="material-icons prefix">email</i> Correo</label>
            <input type="text" placeholder="Ingresa tu correo electrónico" name="correo" class="validate" autocomplete="off" required>
            <!-- Ingresar DUI -->
            <label for="correo"><i class="material-icons prefix">how_to_reg</i> DUI</label>
            <input type="text" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" name="dui" class="validate" autocomplete="off" required>
            <!-- Ingresar fecha de nacimiento-->
            <label for="start"><i class="material-icons prefix">cake</i> Fecha de nacimiento:</label>    
            <input type="date" id="nacimiento_cliente" name="nacimiento_cliente" class="validate" autocomplete="off" required/>
                <div>
                    <h1 class="title"> Llenado de contraseña</h1>
                </div>
                
                <!-- Ingresar contraseña -->
                <label for="password"><i class="material-icons prefix">security</i> Contraseña</label>
                <input class='password'type="password" placeholder="Ingresa tu contraseña" name="clave_cliente" class="validate" required>
                <!-- Ingresar contraseña -->
                <label for="passwordConfirm">Confirmar Contraseña</label>
                <input class='Confirm' type="password" placeholder="Ingresa nuevamente tu contraseña" name="confirmar_clave" class="validate" required>
                <label class="text-center">
                    <input type="checkbox" id="condicion" name="condicion" required/>
                    <span>Acepto <a href="#terminos" data-bs-toggle="modal" id="terms"
                                data-bs-target="#terminos">términos y condiciones</a></span>
                </label>
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
        <div class="modal fade" id="terminos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="save-form">
                            <div class="mb-3">
                                <label for="marca" class="col-form-label"> BLABLABLABLA</label>
                                <input type="text" class="form-control" id="n-marca" name="n-marca">
                            </div>
                            <div class="modal-footer">
                                
                                <button type="submit" class="btn btn-primary">Ok</button>
                            </div>
                            </form>
                        </div>
                        
                    </div>
            </div> 
    </div>

    <!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LeBqFccAAAAAKKKyrQri1N3nktSRu1YR8TC2iNs"></script>
    <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/registro.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
        
</body>
</html>