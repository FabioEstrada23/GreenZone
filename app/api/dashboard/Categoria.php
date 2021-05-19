<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/Categoria.php');

if (isset($_GET['action'])) {
    session_start();
    $Categoria = new categoria;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado']) || true) {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $Categoria->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay categorias registradas';
                    }
                }
                break;

            case 'search':
                    $_POST = $Categoria->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $Categoria->searchRows($_POST['search'])) {
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
                    $_POST = $Categoria->validateForm($_POST);
                    if($Categoria->setcateg($_POST['categoria'])){
                        if ($Categoria->createRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Categoria creada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                                }else{
                                    $result['message'] = 'Categoria Incorrecta';
                                }
                                break;

             case 'update':
                   $_POST = $Categoria->validateForm($_POST);
                   if ($Categoria->setId($_POST['id_categoria'])) {
                    if ($data = $Categoria->readOne()) {
                        if ($Categoria->updateRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Categoria actualizada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                            }else{
                                $result['message'] = 'Nombre Incorrecto';
                            }
                        }
                    }
                break;

            case 'readOne':
                if ($Categoria->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $Categoria->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Categoria inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Categoria incorrecto';
                }
                break;
           

            
            case 'delete':
                    if ($Categoria->setId($_POST['id_categoria'])) {
                        if ($data = $Categoria->readOne()) {
                            if ($Categoria->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Categoria eliminada correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Categoria inexistente';
                        }
                    } else {
                        $result['exception'] = 'Categoria incorrecta';
                    }
                break;
            
                case 'cantidadCategorias':
                    if ($result['dataset'] = $Categoria->cantidadCate()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
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
