<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/historial.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action'])){
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $historialemp = new Historialemp;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado'])) {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $historialemp->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen registros de inicio de sesion, usted es kuaker';
                    }
                }
                break;

                case 'registrarDispositivos':

                    if ($historialemp->checkDevice()) {
    
                        $result['status'] = 1;
    
                        $result['message'] = 'Dispositivo registrado anteriormente.';
    
                    } else {
    
                        if (Database::getException()) {
    
                            $result['exception'] = Database::getException();
    
                        } else {
    
                            if ($historialemp->registrarDispositivos()) {
    
                                $result['status'] = 1;
    
                                $result['message'] = 'Dispositivo registrado.';
    
                            } else {
    
                                $result['exception'] = Database::getException();
    
                            }
    
                        }
    
                    }
    
                    break;

                    case 'getDevices':
                        if ($result['dataset'] = $historialemp->getDevices()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Usted no posee sesiónes registradas.';
                            }   
                        }
                        break;
    
    

            case 'create':
                $_POST = $historialemp->validateForm($_POST);
                if ($historialemp->setIdEmpleado($_SESSION['id_cliente_user'])) {
                    if($historialemp->setDispositivo($_POST['dispositivo'])){
                        if ($historialemp->createRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Sesion registrada correctamente.';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                    } else{
                        $result['message'] = 'Dispositivo Incorrecto';
                    }    
                } else{
                    $result['message'] = 'Empleado Incorrecto';
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
?>