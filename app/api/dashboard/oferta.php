<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/oferta.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $oferta = new Oferta;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $oferta->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay ofertas registrados';
                    }
                }
                break;

                case 'readProductos':
                    if ($result['dataset'] = $oferta->readProductos()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay producto registrados';
                        }
                    }
                    break;

            case 'search':
                    $_POST = $oferta->validateForm($_POST);
                    if ($_POST['search'] != '' || $_POST['search2'] != '') {
                        if ($result['dataset'] = $oferta->searchRows($_POST['search'],$_POST['search2'])) {
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
                        $result['exception'] = 'Hay campos vacios';
                    }
                    break;

            case 'create':
                $_POST = $oferta->validateForm($_POST);
                if($oferta->setDescuento($_POST['descuento'])){
                    if(isset($_POST['nombre_pro'])){
                        if($oferta->setProducto($_POST['nombre_pro'])){
                          if($oferta->setPrecioDescuento($_POST['precio_descuento'])){
                            if($oferta->setPrecioAnterior($_POST['precio_anterior'])){
                                if($oferta->createRow()){
                                    $result['status'] = 1;
                                    $result['message'] = 'Proveedor creado correctamente';
                                }else{
                                    $result['exception'] = Database::getException();;
                                }
                            }else{
                                $result['exception'] = 'No existe un precio anterior';
                            }
                        }else{
                            $result['exception'] = 'No hay un precio de descuento';
                        }  
                        }else{
                            $result['exception'] = 'Producto Incorrecto';
                        }
                        
                    }else{
                        $result['exception'] = 'Seleccione una categoría';
                    }
                }else{
                    $result['exception'] = 'Descuento Incorrecto';
                }
                break;

            case 'update':
                $_POST = $oferta->validateForm($_POST);
                if($oferta->setId($_POST['id_oferta'])){
                    if($data = $oferta->readOne()){
                        if($oferta->setDescuento($_POST['descuento2'])){
                            if($oferta->setProducto($_POST['nombre_pro2'])){
                                
                                if($oferta->setPrecioDescuento($_POST['precio_descuento2'])){
                                    if($oferta->setPrecioAnterior($_POST['precio_anterior2'])){
                                        if($oferta->updateRow()){
                                            $result['status'] = 1;
                                            $result['message'] = 'Proveedor actualizado correctamente';
                                        }else{
                                            $result['exception'] = Database::getException();;
                                        }
                                    }else{
                                        $result['exception'] = 'No existe un precio anterior';
                                    }
                                }else{
                                    $result['exception'] = 'No hay un precio de descuento';
                                }
                            }else{
                                $result['exception'] = 'Seleccione una categoría';
                            }
                        }else{
                            $result['exception'] = 'Descuento Incorrecto';
                        }
                    }else{
                        $result['message'] = 'No se han leido datos';
                    }
                }else{
                    $result['message'] = 'Id Incorrecto';
                }
                break;

            case 'readOne':
                if ($oferta->setId($_POST['id_oferta'])) {
                    if ($result['dataset'] = $oferta->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Oferta inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Oferta incorrecto';
                }
                break;

                case 'readProducto':
                    
                    if ($oferta->setProducto($_POST['id_producto'])) {
                        if ($result['dataset'] = $oferta->readProducto()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Producto inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    break;

            case 'delete':
                    if ($oferta->setId($_POST['id_oferta'])) {
                        if ($data = $oferta->readOne()) {
                            if ($oferta->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Oferta eliminada correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Oferta inexistente';
                        }
                    } else {
                        $result['exception'] = 'Oferta incorrecto';
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
