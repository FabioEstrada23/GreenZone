<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidocliente.php');

if (isset($_GET['action'])) {
    session_start();
    $pedido = new Pedido;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_cliente_user'])) {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $pedido->readAll()) {
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
                    if ($result['dataset'] = $pedido->readEstados()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay estados registrados';
                        }
                    }
                break;

            case 'search':
                    $_POST = $pedido->validateForm($_POST);
                    if ($_POST['search'] != '' || $_POST['search2'] != '') {
                        if ($result['dataset'] = $pedido->searchRows($_POST['search'],$_POST['search2'])) {
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