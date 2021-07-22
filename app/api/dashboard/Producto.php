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
                    if($producto->setNombre($_POST['nombre_pro'])){
                        if(isset($_POST['estado_pro'])){
                            if($producto->setIdEstado($_POST['estado_pro'])){
                                if(isset($_POST['categoria'])){
                                    if($producto->setIdCategoria($_POST['categoria'])){
                                        if(isset($_POST['marca'])){
                                            if($producto->setIdMarca($_POST['marca'])){
                                                if($producto->setPrecioP($_POST['precio_pro'])){
                                                    if($producto->setOfertaPro($_POST['oferta_pro'])){
                                                        if($producto->setDescripcion($_POST['descripcion_pro'])){
                                                            if(isset($_POST['nombre_prov'])){
                                                                if($producto->setIdProveedor($_POST['nombre_prov'])){
                                                                    if($producto->setExistencias($_POST['existencias'])){
                                                                        if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                                            if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                                                if ($producto->createRow()) {
                                                                                    $result['status'] = 1;
                                                                                    if ($producto->saveFile($_FILES['archivo_producto'], $producto->getDireccion(), $producto->getImagen())) {
                                                                                        $result['message'] = 'Producto creado correctamente';
                                                                                    } else {
                                                                                        $result['message'] = 'Producto creado pero no se guardó la imagen';
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();;
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = $producto->getImageError();
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'Seleccione una imagen';
                                                                        }
                                                                    }else{
                                                                        $result['message'] = 'Existencias incorrecta';
                                                                    }
                                                                }else{
                                                                    $result['message'] = 'Proveedor Incorrecto';    
                                                                }
                                                            }else{
                                                                $result['message'] = 'Seleccione un Proveedor';
                                                            }
                                                        }else{
                                                            $result['message'] = 'Descripcion incorrecta';
                                                        }
                                                    }else{
                                                        $result['message'] = 'Oferta del producto incorrecto';
                                                    }

                                                }else{
                                                    $result['message'] = 'Precio del producto Incorrecto';
                                                }
                                            }else{
                                                $result['message'] = 'Marca Incorrecto';    
                                            }
                                        }else{
                                            $result['message'] = 'Seleccione una Marca';
                                        }
                                    }else{
                                        $result['message'] = 'Categoria Incorrecto';    
                                    }
                                }else{
                                    $result['message'] = 'Seleccione una Categoria';
                                }
                            }else{
                                $result['message'] = 'Estado producto Incorrecto';    
                            }
                        }else{
                            $result['message'] = 'Seleccione un estado producto';
                        }
                    }else{
                        $result['message'] = 'Nombres Incorrectos';
                    }
                break;




                case 'delete':
                    if ($producto->setId($_POST['id_producto'])) {
                        if ($data = $producto->readOne()) {
                            if ($producto->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Producto eliminado correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                break;
                
                case 'cantidadProductosCategoria':
                    if ($result['dataset'] = $producto->cantidadProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
                case 'cantidadProductosMarcas':
                    if ($result['dataset'] = $producto->cantidadProductosMarca()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;   
                case 'MostSelling':
                    if ($result['dataset'] = $producto->MostSelling()) {
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
    }else{
        print(json_encode('Acceso denegado'));
    }
}else{
    print(json_encode('Recurso no disponible'));
}
