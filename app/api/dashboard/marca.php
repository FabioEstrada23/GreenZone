<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/marca.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $marca = new Marca;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $marca->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay marcas registradas';
                    }
                }
                break;
            case 'search':
                $_POST = $marca->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $marca->searchRows($_POST['search'])) {
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
                $_POST = $marca->validateForm($_POST);
                if($marca->setNombre($_POST['n-marca'])){
                    if ($marca->createRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Marca creada correctamente';
                        
                    } else {
                        $result['exception'] = Database::getException();
                    }
                }else{
                    $result['message'] = 'Marca Incorrecta';
                }
                break;
            case 'readOne':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($result['dataset'] = $marca->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Marca inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
            case 'update':
                $_POST = $marca->validateForm($_POST);
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if($marca->setNombre($_POST['n-marca-up'])){
                            if ($marca->updateRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Marca actualizada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['message'] = 'Marca Incorrecta';
                        }
                    }
                }   
                break;
            case 'delete':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if ($marca->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Marca eliminada correctamente';

                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
            break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
