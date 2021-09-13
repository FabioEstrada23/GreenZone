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
    <link rel="stylesheet" href="../../resources/css/recuperacion/recuperacion.css">
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
    <title>Form Recuperación de contraseña | Green Zone Store</title>
</head>
<body>

    <div class="container">
        <div class="Recu">
        <img src="../../resources/img/logos/lg_head.png" class="logo">
            <h1 class="title"> Recuperación de contraseña</h1>
            <form id="recuperacion-form" method="post">
            <!-- Ingresar correo de usuario -->
            <label for="mail">Correo</label>
            <input id="correo" name="correo" type="text" placeholder="Ingresa tu correo"  class="validate" required>
            <input class='Enviar' id="enviar" type="submit" value="Enviar mensaje" >
            <button type="button" id="introducir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recuperacion-modal">Introducir código</button>
            <span class="text-footer">¿Recordaste la contraseña?
                <a href="login.php">Ingresa</a>
            </span>               
            </form>
        </div>
    </div>
    <div class="modal" id="recuperacion-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"> Restauración de contraseña</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="restore-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        
                                            
                                            <label for="clave_actual"><i class="fas fa-key"></i> Introduzca el código enviado:</label>   
                                            <input id="codigo_recu" type="text" name="codigo_recu" class="validate form-control" required/>
                                            
                                        
                                    </div>
                                    
                                    <div class="center-align">
                                        <label>CLAVE NUEVA</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                            
                                            <label for="clave_nueva_1"><i class="fas fa-shield-alt"></i> Contraseña</label>
                                            <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                            
                                            
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                            
                                            <label for="clave_nueva_2"><i class="fas fa-shield-alt"></i></i> Confirmar contraseña</label>   
                                            <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                            
                                    </div>        
                                </div>  
                            <div class="modal-footer">
                            
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Verificar</button>
                                </div>
                            </form>
                        </div>
                    </div>

    <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
    <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../app/controllers/public/recuperacion.js"></script>
    <script type="text/javascript" src="../../app/helpers/components.js"></script>
        
    
</body>
</html>