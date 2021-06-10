<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/valoraciones.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action'])){
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $val = new Valoraciones;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_cliente_user'])) {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $val->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay valoraciones registrados';
                    }
                }
                break;
            case 'create':
                $_POST = $val->validateForm($_POST);
                if ($val->setIdCliente($_SESSION['id_cliente_user'])) {
                    if($val->setIdProducto($_POST['id_producto'])){
                        if($val->setComentario($_POST['valoraciones'])){
                            if($val->setPuntuaciones($_POST['puntuacion'])){
                                if ($val->createRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Comentario enviado, esta siendo evaluado por los empleados correspondientes.';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                            }else{
                                $result['message'] = 'Comentario Incorrecto';
                            }
                        }else{
                            $result['message'] = 'Comentario Incorrecto';
                        }
                    } else{
                        $result['message'] = 'Producto Incorrecto';
                    }    
                } else{
                    $result['message'] = 'Cliente Incorrecto';
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