<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/cliente.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Cliente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $cliente->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay clientes registrados';
                    }
                }
                break;

                case 'readAllPedidoCliente':
                    if ($result['dataset'] = $cliente->readAllPedidoCliente()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay pedidos registrados';
                        }
                    }
                    break;

            case 'readEstados':
                    if ($result['dataset'] = $cliente->readEstados()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay estados registrados';
                        }
                    }
                break;

            case 'readCiudades':
                    if ($result['dataset'] = $cliente->readCiudades()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay ciudades registrados';
                        }
                    }
                break;



            case 'readOne':
                if ($cliente->setIdClienteUser($_POST['id_cliente_user'])) {
                    if ($result['dataset'] = $cliente->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'cliente inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'cliente incorrecto';
                }
                break;

            case 'search':
                    $_POST = $cliente->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $cliente->searchRows($_POST['search'])) {
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

            case 'update':
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->setIdClienteUser($_POST['id_cliente_user'])) {
                     if ($data = $cliente->readOne()) {
                         if($cliente->setIdEstadoCli($_POST['estado_cli'])){
                                     if ($cliente->updateRow()) {
                                            $result['status'] = 1;
                                             $result['message'] = 'Cliente actualizado correctamente';
                                     } else {
                                             $result['exception'] = Database::getException();
                                     }
                         }else{
                             $result['message'] = 'Estado Incorrecto';
                         }
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
