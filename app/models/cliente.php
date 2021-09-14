<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../../libraries/phpmailer/src/Exception.php';
require '../../../libraries/phpmailer/src/PHPMailer.php';
require '../../../libraries/phpmailer/src/SMTP.php';

class Cliente extends validator{

    // Declaración de atributos (propiedades).

    private $id_cliente_user = null;
    private $dui_cli = null;
    private $telefono_cli = null;
    private $correo_cli_us = null;
    private $contra_cli_us = null;
    private $nombres_cli = null;
    private $apellidos_cli = null;
    private $direccion_cli = null;
    private $id_ciudad = null;
    private $codigo_pos_cli = null;
    private $fecha_nac_cli = null;
    private $genero = null;
    private $id_estado_cli = null;
    private $correoError = null;
    private $codigo_recu = null;
    private $clienteUser = null;


    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setPasswordNombreUsuario($value, $alias)
    {
        if ($this->validatePasswordAlias($value, $alias, 16)) {
            return true;
        } else {
            return false;
        }
    }

    public function setCodigoRecu($value){
        if($this->validateAlphanumeric($value, 1, 6)){
            $this->codigo_recu = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setPasswordNombreUsuario($value, $alias)
    {
        if ($this->validatePasswordAlias($value, $alias, 16)) {
            return true;
        } else {
            return false;
        }
    }

    public function setIdClienteUser($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente_user = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDuiCli($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefonoCli($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo_cli_us = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->contra_cli_us = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value){
        if($this->validateAlphabetic($value, 1, 30)){
            $this->nombres_cli = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setClienteUser($value){
        if($this->validateAlphabetic($value, 1, 30)){
            $this->clienteUser = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setApellidos($value){
        if($this->validateAlphabetic($value, 1, 30)){
            $this->apellidos_cli = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 150)) {
            $this->direccion_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCiudad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_ciudad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigoPostal($value)
    {
        if ($this->validateAlphanumeric($value, 1, 6)) {
            $this->codigo_pos_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_nac_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setGenero($value)
    {
        if ($this->validateAlphabetic($value, 1, 1)) {
            $this->genero = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEstadoCli($value)
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

    public function getCorreoError()
    {
        return $this->correoError;
    }

    public function getIdClienteUser()
    {
        return $this->id_cliente_user;
    }

    public function getDuiCli()
    {
        return $this->dui_cli;
    }

    public function getTelefonoCli()
    {
        return $this->telefono_cli;
    }

    public function getCorreoCliUs()
    {
        return $this->correo_cli_us;
    }

    public function getClave()
    {
        return $this->contra_cli_us;
    }

    public function getNombresCli()
    {
        return $this->nombres_cli;
    }

    public function getApellidosCli()
    {
        return $this->apellidos_cli;
    }

    public function getDireccion()
    {
        return $this->direccion_cli;
    }

    public function getIdCiudad()
    {
        return $this->id_ciudad;
    }

    public function getCodigoPostal()
    {
        return $this->codigo_postal_cli;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nac_cli;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getIdEstadoCli()
    {
        return $this->id_estado_cli;
    }

    public function getCodigoRecu()
    {
        return $this->codigo_recu;
    }

    public function getClienteUser()
    {
        return $this->clienteUser;
    }


    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, ciudad.ciudad, codigo_pos_cli, fecha_nac_cli, genero, estado_cli.estado_cli  from cliente_user
        INNER JOIN ciudad ON cliente_user.id_ciudad = ciudad.id_ciudad
        INNER JOIN estado_cli ON cliente_user.id_estado_cli = estado_cli.id_estado_cli 
        WHERE cliente_user ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, ciudad.ciudad, codigo_pos_cli, fecha_nac_cli, genero, estado_cli  from cliente_user
        INNER JOIN ciudad ON cliente_user.id_ciudad = ciudad.id_ciudad
        INNER JOIN estado_cli ON cliente_user.id_estado_cli = estado_cli.id_estado_cli
        
        order by id_cliente_user asc ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, cliente_user.id_ciudad, codigo_pos_cli, fecha_nac_cli, genero, cliente_user.id_estado_cli  from cliente_user
        INNER JOIN ciudad ON cliente_user.id_ciudad = ciudad.id_ciudad
        INNER JOIN estado_cli ON cliente_user.id_estado_cli = estado_cli.id_estado_cli 
        WHERE id_cliente_user = ?';
        $params = array($this->id_cliente_user);
        return Database::getRow($sql, $params);
    }

    public function readEstados()
    {
        $sql = 'SELECT id_estado_cli, estado_cli FROM estado_cli';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCiudades()
    {
        $sql = 'SELECT id_ciudad, ciudad FROM ciudad';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE cliente_user SET id_estado_cli = ? WHERE id_cliente_user = ?';
        $params = array($this->id_estado_cli, $this->id_cliente_user);
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->contra_cli_us, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente_user(DUI_cli, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, fecha_nac_cli, id_estado_cli)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->dui_cli, $this->correo_cli_us, $hash, $this->nombres_cli, $this->apellidos_cli, $this->fecha_nac_cli, 1);
        return Database::executeRow($sql, $params);
    }

    public function checkUser($correo_cli_us)
    {
        $sql = 'SELECT id_cliente_user, id_estado_cli FROM cliente_user WHERE correo_cli_us = ?';
        $params = array($correo_cli_us);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_cliente_user = $data['id_cliente_user'];
            $this->id_estado_cli = $data['id_estado_cli'];
            $this->correo_cli_us = $correo_cli_us;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT contra_cli_us FROM cliente_user WHERE id_cliente_user = ?';
        $params = array($this->id_cliente_user);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['contra_cli_us'])) {
            
            return true;
        } else {
            return false;
        }
    }

    public function readAllPedidoCliente()
    {
        $sql = 'SELECT id_pedido, fecha_pedido, fecha_entrega, id_estado_pedido from pedido 
        INNER JOIN cliente_user using(id_cliente_user) 
        where pedido.id_cliente_user = cliente_user.id_cliente_user and id_cliente_user = ?';
        $params = array($this->id_cliente_user);
        return Database::getRows($sql, $params);
    }

    public function readProfile()
    {
        $sql = 'SELECT id_cliente_user, dui_cli, telefono_cli, cliente_user, correo_cli_us, nombres_cli, apellidos_cli, direccion_cli, id_ciudad, codigo_pos_cli, fecha_nac_cli, genero
                FROM cliente_user
                WHERE id_cliente_user = ?';
        $params = array($_SESSION['id_cliente_user']);
        return Database::getRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE cliente_user
                SET dui_cli = ?, telefono_cli = ?, cliente_user = ?, correo_cli_us = ?, nombres_cli = ?, apellidos_cli = ?, direccion_cli = ?, id_ciudad = ?, codigo_pos_cli = ?, fecha_nac_cli = ?, genero = ?
                WHERE id_cliente_user = ?';
        $params = array($this->dui_cli, $this->telefono_cli, $this->cliente_user, $this->correo_cli_us, $this->nombres_cli, $this->apellidos_cli, $this->direccion_cli, $this->id_ciudad, $this->codigo_pos_cli, $this->fecha_nac_cli, $this->genero, $_SESSION['id_cliente_user']);
        return Database::executeRow($sql, $params);
    }

    public function readCiudad()
    {
        $sql = 'SELECT id_ciudad, ciudad FROM ciudad';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function changePassword()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->contra_cli_us, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente_user SET contra_cli_us = ? WHERE id_cliente_user = ?';
        $params = array($hash, $_SESSION['id_cliente_user']);
        return Database::executeRow($sql, $params);
    }

    
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

    public function enviarCorreo($correo, $codigo){
        // Inicio
        $mail = new PHPMailer(true);

            // Configuracion SMTP
            $mail->SMTPDebug = 0;                      // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = '20fernandoaquino02@gmail.com';                  // Usuario SMTP
            $mail->Password  = 'mainkra123';	          // Contraseña SMTP
            $mail->SMTPSecure = 'tls';
            $mail->Port  = 587;
            $mail->setFrom("20160393@ricaldone.edu.sv", "Green Zone");                // Remitente del correo

            // Destinatarios
            $mail->addAddress($correo);  // Email y nombre del destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Código para restaurar contraseña';
            $mail->Body = 'Estimado cliente, ' .$correo .'gracias por preferirnos. 
                        Por este medio le enviamos el codígo de verificación para continuar con el proceso de restauración de contraseña
                        El cual es:<b>'.$codigo.'!</b>';

            if($mail->send()){
                return true;
            } else{
                return false;
            }
    }

    public function updateCodigo()
    {
        $sql = 'UPDATE cliente_user SET codigo_recu = ? WHERE id_cliente_user = ?';
        $params = array($this->codigo_recu, $this->id_cliente_user);
        return Database::getRows($sql, $params);
    }

    public function updateCodigo2($codigo_con)
    {
        $sql = 'UPDATE cliente_user SET codigo_recu = ? WHERE id_cliente_user = ?';
        $params = array($codigo_con, $this->id_cliente_user);
        return Database::executeRow($sql, $params);
    }

    public function checkCodigo($restauracion)
    {
        $sql = 'SELECT id_cliente_user, correo_cli_us FROM cliente_user WHERE codigo_recu = ?';
        $params = array($restauracion);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_cliente_user = $data['id_cliente_user'];
            $this->correo_cli_us = $data['correo_cli_us'];
            return true;
        } else {
            return false;
        }
    }
    public function checkCodigo2($restauracion)
    {
        $sql = 'SELECT id_cliente_user, codigo_recu FROM cliente_user WHERE correo_cli_us = ?';
        $params = array($_SESSION['correo_cli_us']);
        $data = Database::getRow($sql, $params);
        if ($restauracion == $data['codigo_recu']) {
            $this->id_cliente_user = $data['id_cliente_user'];
            $sql = 'UPDATE cliente_user SET codigo_recu = null WHERE id_cliente_user = ?';
            $params = array($this->id_cliente_user);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    

    public function restorePassword()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->contra_cli_us, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente_user SET contra_cli_us = ? WHERE id_cliente_user = ?';
        $params = array($hash, $this->id_cliente_user);
        return Database::executeRow($sql, $params);
    }
}

   


?>