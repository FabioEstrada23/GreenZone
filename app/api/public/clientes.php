<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/cliente.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action'])){
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Cliente;
    
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_cliente_user'])) {
        
        switch ($_GET['action']) {

            case 'logOut':
                
                    unset($_SESSION['id_cliente_user']);
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                
                break;
            case 'sessionTime':
                    if((time() - $_SESSION['tiempo_usuario']) < 300){
                        $_SESSION['tiempo_usuario'] = time();
                    } else{
                       unset($_SESSION['id_cliente_user'], $_SESSION['correo_cli_us'], $_SESSION['tiempo_usuario']);
                        $result['status'] = 1;
                        $result['message'] = 'Se ha cerrado la sesión por inactividad'; 
                    }
                break;    
            case 'readCiudad':
                    if ($result['dataset'] = $cliente->readCiudad()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay ciudades registradas';
                        }
                    }
                break; 
            case 'readProfile':
                if ($result['dataset'] = $cliente->readProfile()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }
                break;

                case 'changePassword':
                    if ($cliente->setIdClienteUser($_SESSION['id_cliente_user'])) {
                        $_POST = $cliente->validateForm($_POST);
                        if ($cliente->checkPassword($_POST['clave_actual_cli'])) {
                            if ($_POST['clave_actual_cli'] != $_POST['clave_nueva_1_cli']) {
                                if ($_POST['clave_nueva_1_cli'] == $_POST['clave_nueva_2_cli']) {
                                    if ($cliente->setPasswordNombreUsuario($_POST['clave_nueva_1_cli'], $_SESSION['correo_cli_us'])) {
                                            if ($cliente->setClave($_POST['clave_nueva_1_cli'])) {
                                                if ($cliente->changePassword()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Contraseña cambiada correctamente. Por favor vuelva a iniciar sesión';
                                                    unset($_SESSION['id_cliente_user']);
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $cliente->getPasswordError();
                                            } 
                                        } else {
                                            $result['exception'] = $cliente->getPasswordError();
                                        }      
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Intente ingresar una contraseña que no sea igual a la anterior';
                            }    
                        } else {
                            $result['exception'] = 'Clave actual incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;    
            case 'editProfile':  
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setDuiCli($_POST['dui_cli'])){
                    if ($cliente->setTelefonoCli($_POST['telefono_cli'])) {
                        if ($cliente->setClienteUser($_POST['user'])) {
                            if ($cliente->setCorreo($_POST['correo'])) {
                                if ($cliente->setNombres($_POST['nombres_cli'])) {
                                    if ($cliente->setApellidos($_POST['apellidos_cli'])) {
                                        if ($cliente->setDireccion($_POST['direccion_cli'])) {
                                            if ($cliente->setIdCiudad($_POST['ciudad'])) {
                                                if ($cliente->setCodigoPostal($_POST['codigo_pos_cli'])) {
                                                    if ($cliente->setNacimiento($_POST['fecha_nac_cli'])) {
                                                        if ($cliente->setGenero($_POST['genero'])) {
                                                            if ($cliente->editProfile()) {
                                                                $result['status'] = 1;
                                                                $_SESSION['alias_usuario'] = $cliente->getClienteUser();
                                                                $result['message'] = 'Perfil modificado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else{
                                                            $result['exception'] = 'Generoincorrecto';
                                                        }  
                                                    } else{
                                                        $result['exception'] = 'Fecha de nacimiento incorrecto';
                                                    }  
                                                } else{
                                                    $result['exception'] = 'Código postal incorrecto';
                                                }  
                                            } else{
                                                $result['exception'] = 'Ciudad incorrecta';
                                            } 
                                        } else{
                                            $result['exception'] = 'Dirección incorrecta';
                                        } 
                                    } else{
                                        $result['exception'] = 'Apellidos incorrecto';
                                    } 
                                } else{
                                    $result['exception'] = 'Nombres incorrecto';
                                } 
                            } else{
                                $result['exception'] = 'Correo incorrecto';
                            }  
                        } else{
                            $result['exception'] = 'Usuario incorrecto';
                        }  
                    } else{
                        $result['exception'] = 'Télefono incorrecto';
                    }   
                } else{
                    $result['exception'] = 'Dui incorrecto';
                }     
                break;    
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    }else {
        $clienteTemp = null;
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                // Se sanea el valor del token para evitar datos maliciosos.
                $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                if ($token) {
                    $secretKey = '6LeBqFccAAAAADTwGbfo-lrZJb3p6lb0T6_m8Lkf';
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $data = array(
                        'secret' => $secretKey,
                        'response' => $token,
                        'remoteip' => $ip
                    );

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );

                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $captcha = json_decode($response, true);

                    if ($captcha['success']) {
                        if ($cliente->setNombres($_POST['nombres'])) {
                            if ($cliente->setApellidos($_POST['apellidos'])) {
                                if ($cliente->setCorreo($_POST['correo'])) {
                                        if ($cliente->setDuiCli($_POST['dui'])) {
                                            if ($cliente->setNacimiento($_POST['nacimiento_cliente'])) {
                                                    if ($_POST['clave_cliente'] == $_POST['confirmar_clave']) {
                                                        if ($cliente->setPasswordNombreUsuario($_POST['clave_cliente'], $_POST['correo'])) {
                                                                if ($cliente->setClave($_POST['clave_cliente'])) {
                                                                        if ($cliente->createRow()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Cliente registrado correctamente';
                                                                        } else {
                                                                            $result['exception'] = Database::getException();
                                                                        } 
                                                            } else {
                                                                $result['exception'] = $cliente->getPasswordError();
                                                            }
                                                        } else {
                                                            $result['exception'] = $cliente->getPasswordError();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Claves diferentes';
                                                    }
                                            } else {
                                                $result['exception'] = 'Fecha de nacimiento incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'DUI incorrecto';
                                        }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['recaptcha'] = 1;
                        $result['exception'] = 'No eres un humano';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                }
                break;
                case 'logIn':
                    $_POST = $cliente->validateForm($_POST);
                    // Se sanea el valor del token para evitar datos maliciosos.
                    $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                    if ($token) {
                        $secretKey = '6LeBqFccAAAAADTwGbfo-lrZJb3p6lb0T6_m8Lkf';
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $data = array(
                            'secret' => $secretKey,
                            'response' => $token,
                            'remoteip' => $ip
                        );

                        $options = array(
                            'http' => array(
                                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method'  => 'POST',
                                'content' => http_build_query($data)
                            ),
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false
                            )
                        );

                        $url = 'https://www.google.com/recaptcha/api/siteverify';
                        $context  = stream_context_create($options);
                        $response = file_get_contents($url, false, $context);
                        $captcha = json_decode($response, true);

                        if ($captcha['success']) {
                            $_POST = $cliente->validateForm($_POST);
                            if ($cliente->checkUser($_POST['correo'])) {
                                if ($cliente->getIdEstadoCli() == 1) {
                                    if ($cliente->checkPassword($_POST['clave'])) {
                                        $codigo = $cliente->generarCodigoRecu(6);
                                        if ($cliente->enviarCorreo($_POST['correo'], $codigo)) {
                                            if($cliente->updateCodigo2($codigo)){
                                                $_SESSION['correo_cli_us'] = $cliente->getCorreoCliUs();
                                                $result['status'] = 1;
                                                $result['message'] = 'Se ha enviado un codigo de confirmacion a su correo';
                                            }else{
                                                $result['exception'] = 'Ocurrio un problema al actualizar el código';
                                            }
                                        } else {
                                            $result['exception'] = $cliente->getCorreoError();
                                        } 
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'Clave incorrecta';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'La cuenta ha sido desactivada';
                                }
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            }
                        } else {
                            $result['recaptcha'] = 1;
                            $result['exception'] = 'No eres un humano';
                        }
                    } else {
                        $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                    }
                    break;

                        case 'tiempocontra':
                            $_POST = $cliente->validateForm($_POST);
                            
                            if ($cliente->checkUser($_POST['correo'])) {
                                if ($cliente->getIdEstadoCli() == 1) {
                                    if ($cliente->checkPassword($_POST['clave'])) {
                                        if($cliente->obtenerDiff()){
                                            $result['exception'] = 'Debe cambiar su contraseña';
                                        }else{
                                            $result['status'] = 1;
                                            $result['message'] = 'Su contraseña es valida';
                                        }

                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'Clave incorrecta';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'La cuenta ha sido desactivada';
                                }
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            }
                            break;
                        
                            
        
                        case 'comparar':
                            $_POST = $cliente->validateForm($_POST);
                            if($cliente->checkCodigo2($_POST['codigo'])){
                                $_SESSION['id_cliente_user'] = $cliente->getIdClienteUser();
                                $_SESSION['tiempo_usuario'] = time();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                                
                            }else {
                                $result['exception'] = 'codigo incorrecto, verifique otra vez';
                            }
                            
                            break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
?>