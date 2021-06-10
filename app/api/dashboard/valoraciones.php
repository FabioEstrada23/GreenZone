<?php

    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/valoraciones.php');

    if (isset($_GET['action'])) {
        session_start();
        $valoraciones = new Valoraciones;
        $result = array('status' => 0, 'message' => null, 'exception' => null);
    
        if (isset($_SESSION['id_empleado'])) {
    
            switch ($_GET['action']) {
                case 'readAll':
                    if ($result['dataset'] = $valoraciones->readAll()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay valoraciones registrados';
                        }
                    }
                    break;
                    
                case 'update':
                $_POST = $valoraciones->validateForm($_POST);
                if ($valoraciones->setId($_POST['id_valoracion2'])) {
                    if ($data = $valoraciones->readOne()) {
                        if($valoraciones->setEstadoVal($_POST['estado_val'])){
                            if ($valoraciones->updateRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Estado actualizado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['message'] = 'Estado Incorrecto';
                        }
                    }
                }   
                break;    
                case 'search':
                        $_POST = $valoraciones->validateForm($_POST);
                        if ($_POST['search'] != '') {
                            if ($result['dataset'] = $valoraciones->searchRows($_POST['search'])) {
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
                
                case 'readOne':
                    if ($valoraciones->setId($_POST['id_valoracion'])) {
                        if ($result['dataset'] = $valoraciones->readOne()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Valoración inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Valoración incorrecto';
                    }
                    break;
               
    
                
                case 'delete':
                        if ($valoraciones->setId($_POST['id_valoracion'])) {
                            if ($data = $valoraciones->readOne()) {
                                if ($valoraciones->deleteRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Valoración eliminada correctamente';
        
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Valoración inexistente';
                            }
                        } else {
                            $result['exception'] = 'Valoración incorrecto';
                        }
                    break;
                
                    
                    default:
                        $result['exception'] = 'Acción no disponible dentro de la sesión';
    
            }
            header('content-type: application/json; charset=utf-8');
            // Se imprime el resultado en formato JSON y se retorna al controlador.
            print(json_encode($result));
    
        } else {
            print(json_encode('Acceso denegado'));
        } 
    
    
    } else {
        print(json_encode('Recurso no disponible'));
    }
    
?>