<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/cliente.php');

if (isset($_GET['action'])) {
    session_start();
    $cliente = new cliente;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado'])) {

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

            case 'readOne':
                if ($oferta->setId($_POST['id_cliente_user'])) {
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
                   if ($cliente->setId($_POST['id_cliente_user'])) {
                    if ($data = $cliente->readOne()) {
                        if($cliente->setEstadoCliente($_POST['estado_cliente'])){
                                    if ($cliente->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cliente actualizado correctamente';
                                    } else {
                                            $result['exception'] = Database::getException();
                                    }
                        }else{
                            $result['message'] = 'Direccion Incorrecta';
                        }
                    }
                   }
                break;



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
