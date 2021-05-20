<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/Producto.php');

if (isset($_GET['action'])) {
    session_start();
    $producto = new Producto;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado'])) {
        
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay productos registrados';
                    }
                }
                break;

                case 'readEstados':
                    if ($result['dataset'] = $producto->readEstados()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay estados registrados';
                        }
                    }
                break;

                case 'readCategoria':
                    if ($result['dataset'] = $producto->readCategoria()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay categorias registradas';
                        }
                    }
                    break;

                    case 'readMarca':
                        if ($result['dataset'] = $producto->readMarca()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay marcas registrados';
                            }
                        }
                        break;

                        case 'readProveedor':
                            if ($result['dataset'] = $producto->readProveedor()) {
                                $result['status'] = 1;
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'No hay proveedores registrados';
                                }
                            }
                            break;

            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchRows($_POST['search'])) {
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
                    $_POST = $producto->validateForm($_POST);
                    if($producto->setcateg($_POST['categoria'])){
                        if ($producto->createRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Categoria creada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                                }else{
                                    $result['message'] = 'Categoria Incorrecta';
                                }
                                break;

            }
            header('content-type: application/json; charset=utf-8');
            // Se imprime el resultado en formato JSON y se retorna al controlador.
            print(json_encode($result));
    }else{
        print(json_encode('Acceso denegado'));
    }
}else{
    print(json_encode('Recurso no disponible'));
}
