<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../../libraries/phpmailer/src/Exception.php';
require '../../../libraries/phpmailer/src/PHPMailer.php';
require '../../../libraries/phpmailer/src/SMTP.php';


/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $alias = null;
    private $clave = null;
    private $idTiUsE = null;
    private $id_estado_cli = null;
    private $correoError = null;
    private $passwordAlias = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setPasswordAlias($value, $alias)
    {
        if ($this->validatePasswordAlias($value, $alias)) {
            return true;
        } else {
            return false;
        }
    }

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAlias($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->alias = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTiUsE($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTiUsE = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEsUsE($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getIdTiUsE()
    {
        return $this->idTiUsE;
    }

    public function getIdEsUsE()
    {
        return $this->id_estado_cli;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */

    public function getCorreoError()
    {
        return $this->correoError;
    }


    public function readAll()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, id_tipo_empleado, id_estado_emp
                FROM empleado_user
                ORDER BY apellidos_emp';
        $params = null;
        return Database::getRows($sql, $params);
    }

    /*
    *   Método para verificar el alias.
    */
    public function checkUser($alias)
    {
        $sql = 'SELECT id_empleado, id_estado_emp, correo_emp FROM empleado_user WHERE alias_emp = ?';
        $params = array($alias);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_empleado'];
            $this->id_estado_cli = $data['id_estado_emp'];
            $this->alias = $alias;
            $this->correo = $data['correo_emp'];
            return true;
        } else {
            return false;
        }
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO empleado_user(nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, id_tipo_empleado, id_estado_emp)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash, 1, 1);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Método para verificar contraseña.
    */
    public function checkPassword($password)
    {
        $sql = 'SELECT clave_emp FROM empleado_user WHERE id_empleado = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_emp'])) {
            
            return true;
        } else {
            return false;
        }
    }

    public function readProfile()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp
                FROM empleado_user
                WHERE id_empleado = ?';
        $params = array($_SESSION['id_empleado']);
        return Database::getRow($sql, $params);
    }

    public function changePassword()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE empleado_user SET clave_emp = ? WHERE id_empleado = ?';
        $params = array($hash, $_SESSION['id_empleado']);
        return Database::executeRow($sql, $params);
    }

    //Funciones para contraseña

    public function generarCodigoRecu($longitud){
        //creamos la variable codigo
        $codigo = "";
        //caracteres a ser utilizados
        $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //el maximo de caracteres a usar
        $max=strlen($caracteres)-1;
        //creamos un for para generar el codigo aleatorio utilizando parametros min y max
        for($i=0;$i < $longitud;$i++)
        {
            $codigo.=$caracteres[rand(0,$max)];
        }
        //regresamos codigo como valor
        return $codigo;
    }

    public function enviarCorreo2($codigo){
        // Inicio
        $mail = new PHPMailer(true);

            // Configuracion SMTP
            $mail->SMTPDebug = 0;                      // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = 'greenzonesv8@gmail.com';                  // Usuario SMTP
            $mail->Password  = 'greenzone';	          // Contraseña SMTP
            $mail->SMTPSecure = 'tls';
            $mail->Port  = 587;
            $mail->setFrom("greenzonesv8@gmail.com", "Green Zone");                // Remitente del correo

            // Destinatarios
            $mail->addAddress($this->correo);  // Email y nombre del destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Código para restaurar contraseña';
            $mail->Body = 'Estimado cliente, ' .$this->correo .'gracias por preferirnos. 
                        Por este medio le enviamos el codígo de verificación para continuar con el proceso de restauración de contraseña
                        El cual es:<b>'.$codigo.'!</b>';

            if($mail->send()){
                return true;
            } else{
                return false;
            }
    }

    public function updateCodigo2($codigo_con)
    {
        $sql = 'UPDATE empleado_user SET codigo_recu = ? WHERE id_empleado = ?';
        $params = array($codigo_con, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function checkCodigo2($restauracion)
    {
        $sql = 'SELECT id_empleado, codigo_recu, alias_emp FROM empleado_user WHERE correo_emp = ?';
        $params = array($_SESSION['correo_emp']);
        $data = Database::getRow($sql, $params);
        if ($restauracion == $data['codigo_recu']) {
            $this->id = $data['id_empleado'];
            $this->alias = $data['alias_emp'];
            $sql = 'UPDATE empleado_user SET codigo_recu = null WHERE id_empleado = ?';
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    public function obtenerDiff()
    {
        $sql = 'SELECT fechacontra from empleado_user where id_empleado = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        $fechaHoy = date('Y-m-d');
        $dateDifference = abs(strtotime($fechaHoy) - strtotime($data['fechacontra']));
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

        if($days>=10){
            return true;
        }else{
            return false;
        }
    }

    public function registrarDispositivos()
    {
        $sql = 'INSERT INTO historial_sesion(id_empleado,dispositivo)
                VALUES(?,?)';
        $params = array($_SESSION['id_empleado'],php_uname());
        return Database::executeRow($sql, $params);
    }

    public function verificarDispositivos()    
    {        
        $sql = 'SELECT*FROM historial_sesion 
            WHERE dispositivo = ? 
            AND id_empleado = ?';        
        $params = array(php_uname(), $_SESSION['id_empleado']);        
        return Database::getRow($sql, $params);    
    }


    //Verificar si el dispositivo ya existe
    public function checkDevice()
    {
        $sql = 'SELECT*FROM historial_sesion WHERE dispositivo = ? AND id_empleado = ?';
        $params = array(php_uname(), $_SESSION['id_empleado']);
        return Database::getRow($sql, $params);
    }

    //Obtener las sesiones de un dispositivo
    public function getDevices()
    {
        $sql = 'SELECT*FROM historial_sesion WHERE id_empleado = ?';
        $params = array($_SESSION['id_empleado']);
        return Database::getRows($sql, $params);
    }    
}
