<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/ofertacliente.php');

if (isset($_GET['action'])) {
    session_start();
    $oferta = new Ofertascliente;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_cliente_user']) ) {

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
