<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/Empleado.php');

    // Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $Empleado = new empleado;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])){
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $Empleado->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay empleados registrados';
                    }
                }
                break;

                case 'readTipoEmpleado':
                    if ($result['dataset'] = $Empleado->readTipoEmpleado()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay tipos de empleados registrados';
                        }
                    }
                    break;

                    
                case 'readEstadoEmpleado':
                    if ($result['dataset'] = $Empleado->readEstadoEmpleado()) {
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
                    $_POST = $Empleado->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $Empleado->searchRows($_POST['search'])) {
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
                    $_POST = $Empleado->validateForm($_POST);
                        if($Empleado->setNombres($_POST['nombres_emp'])){
                            if($Empleado->setApellidos($_POST['apellidos_emp'])){
                                if($Empleado->setCorreo($_POST['correo_emp'])){
                                    if($Empleado->setAlias($_POST['alias_emp'])){
                                        if($Empleado->setClave($_POST['clave_emp'])){
                                            if(isset($_POST['tipo_empleado'])){
                                                if($Empleado->setTipoEmp($_POST['tipo_empleado'])){
                                                    if(isset($_POST['estado_emp'])){
                                                        if($Empleado->setEstado($_POST['estado_emp'])){
                                                            if ($Empleado->createRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Usuario creado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        }else{
                                                            $result['message'] = 'Estado Empleado Incorrecto';    
                                                        }
                                                    }else{
                                                        $result['message'] = 'Seleccione un estado empleado';
                                                    }
                                                }else{
                                                $result['message'] = 'Tipo Empleado Incorrecto';    
                                                }
                                            }else{
                                                $result['message'] = 'Seleccione un tipo empleado';
                                            }
                                        }else{
                                            $result['message'] = 'Clave Incorrecto';    
                                        }
                                    }else{
                                        $result['message'] = 'Alias Incorrecto';    
                                    }
                                }else{
                                    $result['message'] = 'Correo Incorrecto';    
                                }
                            }else{
                                $result['message'] = 'Apellidos Incorrectos';    
                            }
                        }else{
                            $result['message'] = 'Nombres Incorrectos';
                        }
                        break;
                case 'readOne':
                    if ($Empleado->setId($_POST['id_empleado'])) {
                        if ($result['dataset'] = $Empleado->readOne()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Empleado inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Empleado incorrecto';
                    }
                    break;
                case 'update':
                    $_POST = $Empleado->validateForm($_POST);
                    if ($Empleado->setId($_POST['id_empleado'])) {
                        if ($data = $Empleado->readOne()) {
                            if($Empleado->setNombres($_POST['nombres_emp2'])){
                                if($Empleado->setApellidos($_POST['apellidos_emp2'])){
                                    if($Empleado->setCorreo($_POST['correo_emp2'])){
                                        if($Empleado->setAlias($_POST['alias_emp2'])){
                                            if($Empleado->setTipoEmp($_POST['tipo_empleado2'])){
                                                if($Empleado->setEstado($_POST['estado_emp2'])){
                                                    if ($Empleado->updateRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Empleado actualizado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                }else{
                                                    $result['message'] = 'Estado Incorrecto';
                                                }
                                            }else{
                                                $result['message'] = 'Tipo empleado Incorrecto';
                                            }
                                        }else{
                                            $result['message'] = 'Alias Incorrecto';
                                        }
                                
                                    }else{
                                        $result['message'] = 'Correo Incorrecto';
                                    }
                                }else{
                                    $result['message'] = 'Apellidos Incorrectos';
                                }   
                            }else{
                                $result['message'] = 'Nombre Incorrecto';
                            }
                        }
                    }   
                    break;
                case 'delete':
                    if ($Empleado->setId($_POST['id_empleado'])) {
                        if ($data = $Empleado->readOne()) {
                            if ($Empleado->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Empleado eliminado correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Empleado inexistente';
                        }
                    } else {
                        $result['exception'] = 'Empleado incorrecto';
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