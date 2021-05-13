<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/proveedores.php');

if (isset($_GET['action'])) {
    session_start();
    $proveedores = new Proveedor;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado']) || true) {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $proveedores->readAll()) {
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
                    $_POST = $proveedores->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $proveedores->searchRows($_POST['search'])) {
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
                    $_POST = $proveedores->validateForm($_POST);
                    if($proveedores->setDireccion($_POST['direccion_prov'])){
                        if($proveedores->setEmail($_POST['correo_prov'])){
                            if($proveedores->setTelefono($_POST['telefono_prov'])){
                                if($proveedores->setNombre($_POST['nombre_prov'])){
                                    if ($proveedores->createRow()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Proveedor creado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }else{
                                    $result['message'] = 'Nombre Incorrecto';
                                }
                            }else{
                                $result['message'] = 'Telefono Incorrecto';
                            }

                        }else{
                            $result['message'] = 'Correo Incorrecto';
                        }
                    }else{
                        $result['message'] = 'Direccion Incorrecta';
                    }
                    break;

             case 'update':
                   $_POST = $proveedores->validateForm($_POST);
                   if ($proveedores->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedores->readOne()) {
                        if($proveedores->setDireccion($_POST['direccion_prov'])){
                            if($proveedores->setEmail($_POST['correo_prov'])){
                                if($proveedores->setTelefono($_POST['telefono_prov'])){
                                    if($proveedores->setNombre($_POST['nombre_prov'])){
                                        if ($proveedores->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Proveedor actualizado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                        $result['message'] = 'Nombre Incorrecto';
                                    }
                                }else{
                                    $result['message'] = 'Telefono Incorrecto';
                                }
    
                            }else{
                                $result['message'] = 'Correo Incorrecto';
                            }
                        }else{
                            $result['message'] = 'Direccion Incorrecta';
                        }
                    }
                   }
                break;

            case 'readOne':
                if ($proveedores->setId($_POST['id_proveedor'])) {
                    if ($result['dataset'] = $proveedores->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
           

            
            case 'delete':
                    if ($proveedores->setId($_POST['id_proveedor'])) {
                        if ($data = $proveedores->readOne()) {
                            if ($proveedores->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Proveedor eliminado correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    } else {
                        $result['exception'] = 'Proveedor incorrecto';
                    }
                break;
            
                case 'cantidadProveedoresCategoria':
                    if ($result['dataset'] = $proveedores->cantidadProductosCategoria()) {
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
