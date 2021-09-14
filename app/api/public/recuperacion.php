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

        }else {
            switch ($_GET['action']) {
                case 'recover':
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkUser($_POST['correo'])) {
                        if ($cliente->getIdEstadoCli()) { 
                                $codigo = $cliente->generarCodigoRecu(6);
                                if ($cliente->enviarCorreo($_POST['correo'], $codigo)) {
                                    if ($cliente->setCodigoRecu($codigo)) {
                                        if ($cliente->updateCodigo()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'El correo fue enviado satisfactoriamente. Favor de ingresar el código mandado en el siguiente formulario';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Hubo un problema al obtener el código';
                                    }
                                } else {
                                    $result['exception'] = $cliente->getCorreoError();
                                }
                            
                        } else {
                            $result['exception'] = 'La cuenta ha sido desactivada, no puede seguir con el proceso de recuperación de contraseña';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'El correo ingresado no tiene una cuenta creada en esta tienda';
                        }
                    }
                    break;
                    case 'restorePassword':
                            $id= $cliente->getIdClienteUser();
                            echo $id;
                            $_POST = $cliente->validateForm($_POST);
                            if ($cliente->checkCodigo($_POST['codigo_recu'])) {
                                if ($cliente->setPasswordNombreUsuario($_POST['clave_nueva_1'], $cliente->getCorreoCliUs())) {
                                    if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                                if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                                    if ($cliente->restorePassword()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Contraseña restaurada correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $cliente->getPasswordError();
                                                } 
                                            } else {
                                                $result['exception'] = 'Claves nuevas diferentes';
                                            }       
                                    } else {
                                        $result['exception'] = $cliente->getPasswordError();
                                    }        
                            } else {
                                $result['exception'] = 'Código ingresado erróneo';
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