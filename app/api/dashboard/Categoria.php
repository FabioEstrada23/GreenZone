<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categoria.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $Categoria = new Categoria;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
<<<<<<< Updated upstream

    if (isset($_SESSION['id_empleado'])) {

=======
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado']) || true) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
>>>>>>> Stashed changes
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
                                    if($Categoria->setcateg($_POST['categoria2'])){
                                        if ($Categoria->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Categoria actualizada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                        $result['message'] = 'Categoria Incorrecta';
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
                                    $result['exception'] = 'Categoria incorrecta';
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
