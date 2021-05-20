<?php

class cliente extends validator{

    // Declaración de atributos (propiedades).

    private $id_cliente_user = null;
    private $dui_cli = null;
    private $telefono_cli = null;
    private $cliente_user = null;
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


    /*
    *   Métodos para asignar valores a los atributos.
    */

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

    public function setClienteUser($value){
        if($this->validateAlphanumeric($value, 1, 25)){
            $this->cliente_user = $value;
            return true;
        }else{
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

    public function getClienteUser()
    {
        return $this->cliente_user;
    }

    public function getCorrepCliUs()
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

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, cliente_user, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, ciudad.ciudad, codigo_pos_cli, fecha_nac_cli, genero, estado_cli.estado_cli  from cliente_user
        INNER JOIN ciudad ON cliente_user.id_ciudad = ciudad.id_ciudad
        INNER JOIN estado_cli ON cliente_user.id_estado_cli = estado_cli.id_estado_cli 
        WHERE cliente_user ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, cliente_user, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, ciudad.ciudad, codigo_pos_cli, fecha_nac_cli, genero, estado_cli  from cliente_user
        INNER JOIN ciudad ON cliente_user.id_ciudad = ciudad.id_ciudad
        INNER JOIN estado_cli ON cliente_user.id_estado_cli = estado_cli.id_estado_cli 
        order by id_cliente_user asc ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente_user, DUI_cli, telefono_cli, cliente_user, correo_cli_us, contra_cli_us, nombres_cli, apellidos_cli, direccion_cli, cliente_user.id_ciudad, codigo_pos_cli, fecha_nac_cli, genero, cliente_user.id_estado_cli  from cliente_user
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

}

?>