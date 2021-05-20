<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/Producto.php');

if (isset($_GET['action'])) {
    session_start();
    $Producto = new producto;
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
                        $result['exception'] = 'No hay productos registrados';
                    }
                }
                break;

                case 'readEstadoProducto':
                    if ($result['dataset'] = $Producto->readEstadoProducto()) {
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
                    if ($result['dataset'] = $Producto->readCategoria()) {
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
                        if ($result['dataset'] = $Producto->readMarca()) {
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
                            if ($result['dataset'] = $Producto->readProveedor()) {
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
                $_POST = $Producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $Producto->searchRows($_POST['search'])) {
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
                    $_POST = $Producto->validateForm($_POST);
                    if($Producto->setcateg($_POST['categoria'])){
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

            }

    }else{
        print(json_encode('Acceso denegado'));
    }
}else{
    print(json_encode('Recurso no disponible'));
}
