<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/usuarios.php');

    // Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])) {
        
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
                case 'logOut':
                    unset($_SESSION['id_empleado']);
                    $result['status'] = 1;
                    $result['message'] = 'Se ha cerrado la sesión';          
                break;
                case 'sessionTime':
                    if((time() - $_SESSION['tiempo_usuario']) < 300){
                        $_SESSION['tiempo_usuario'] = time();
                    } else{
                       unset($_SESSION['id_empleado'], $_SESSION['alias_emp'], $_SESSION['tiempo_usuario']);
                        $result['status'] = 1;
                        $result['message'] = 'Se ha cerrado la sesión por inactividad'; 
                    }
                break;

                case 'changePassword':
                    if ($usuario->setId($_SESSION['id_empleado'])) {
                        $_POST = $usuario->validateForm($_POST);
                       // if ($usuario->checkPassword($_POST['clave_actual'])) {
                            if ($_POST['clave_actual'] != $_POST['clave_nueva_1']) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                        if ($usuario->setPasswordAlias($_POST['clave_nueva_1'], $_SESSION['alias_emp'])) {
                                            if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                                if ($usuario->changePassword()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Contraseña cambiada correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $usuario->getPasswordError();
                                            }
                                        } else {
                                            $result['exception'] = $usuario->getPasswordError();
                                        }
                                        
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Intente ingresar una contraseña que no sea igual a la anterior';
                            }    
                        //} else {
                           //$result['exception'] = 'Clave actual incorrecta';
                        //}
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
            case 'readProfile':
                if ($result['dataset'] = $usuario->readProfile()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }
                break;
            case 'getDevices':
                        if ($result['dataset'] = $usuario->getDevices()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Usted no posee sesiónes registradas.';
                            }   
                        }
                        break;

            case 'readAll':
                if ($result['dataset'] = $usuario->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres_usuario'])) {
                    if ($usuario->setApellidos($_POST['apellidos_usuario'])) {
                        if ($usuario->setCorreo($_POST['correo_usuario'])) {
                            if ($usuario->setAlias($_POST['alias_usuario'])) {
                                if ($_POST['clave_emp'] == $_POST['confirmar_clave']) {
                                    if ($usuario->setClave($_POST['clave_usuario'])) {
                                        if ($usuario->setPasswordAlias($_POST['clave_nueva_1'], $_POST['alias_usuario'])) {
                                            if ($usuario->createRow()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = $usuario->getPasswordError();
                                        }
                                    } else {
                                        $result['exception'] = $usuario->getPasswordError();
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
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
                break;
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->readOne()) {
                        if ($usuario->setNombres($_POST['nombres_usuario'])) {
                            if ($usuario->setApellidos($_POST['apellidos_usuario'])) {
                                if ($usuario->setCorreo($_POST['correo_usuario'])) {
                                    if ($usuario->updateRow()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Usuario modificado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
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
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOne()) {
                            if ($usuario->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados';
                    }
                }
                break;
            case 'register':
                if ($usuario->readAll()) {
                    $result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['nombres'])) {
                            if ($usuario->setApellidos($_POST['apellidos'])) {
                                if ($usuario->setCorreo($_POST['correo'])) {
                                    if ($usuario->setAlias($_POST['alias'])) {
                                        if ($_POST['clave1'] == $_POST['clave2']) {
                                            if ($usuario->setPasswordAlias($_POST['clave_nueva_1'], $_POST['alias'])) {
                                                if ($usuario->setClave($_POST['clave1'])) {
                                                    if ($usuario->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Usuario registrado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $usuario->getPasswordError();
                                                }
                                            } else {
                                                $result['exception'] = $usuario->getPasswordError();
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
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
                    }
                }
                break;

            case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['username'])) {
                    if ($usuario->getIdEsUsE() == 1) {
                        if ($usuario->checkPassword($_POST['clave'])) {
                            $codigo = $usuario->generarCodigoRecu(6);
                            if ($usuario->enviarCorreo2($codigo)) {
                                if($usuario->updateCodigo2($codigo)){
                                    $_SESSION['correo_emp'] = $usuario->getCorreo();
                                    $result['status'] = 1;
                                    $result['message'] = 'Se ha enviado un codigo de confirmacion a su correo';
                                }else{
                                    $result['exception'] = 'Ocurrio un problema al actualizar el código';
                                }
                            } else {
                                $result['exception'] = $usuario->getCorreoError();
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
                        $result['exception'] = 'Alias incorrecto';
                    }
                }
                break;

                case 'comparar':
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->checkCodigo2($_POST['codigo'])){
                        $usuario->resetearIntentos();
                        $_SESSION['id_empleado'] = $usuario->getId();
                        $_SESSION['alias_emp'] = $usuario->getAlias();
                        $_SESSION['tiempo_usuario'] = time();
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        if($usuario->checkDevice()){
                            $result[''] = 'Ya hay dispositivos registrados';
                        } else{
                            $usuario->registrarDispositivos();
                        }
                            
                        
                        
                        
                        
                    }else {
                        $result['exception'] = 'codigo incorrecto, verifique otra vez';
                    }
                    
                    break;

                    case 'tiempocontra':
                        $_POST = $usuario->validateForm($_POST);
                        
                        if ($usuario->checkUser($_POST['username'])) {
                            if ($usuario->getIdEsUsE() == 1) {
                                if ($usuario->checkPassword($_POST['clave'])) {
                                    if($usuario->obtenerDiff()){
                                        $result['exception'] = 'Debe cambiar su contraseña';
                                    }else{
                                        $result['status'] = 1;
                                        $result['message'] = 'Su contraseña es valida';
                                    }

                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $usuario->agregarIntentosEmp();
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