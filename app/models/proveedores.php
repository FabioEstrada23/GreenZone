<?php 

class Proveedor extends Validator
{
    /* Declaramos las variables */
    private $id_proveedor = null;
    private $direccion_prov = null;
    private $correo_prov = null;
    private $telefono_prov = null;
    private $nombre_prov = null;

    /* Metodos para asginar */ 

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->direccion_prov = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail($value){
        if ($this->validateEmail($value)) {
            $this->correo_prov = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value){
        if ($this->validatePhone($value)) {
            $this->telefono_prov = $value;
            return true;
        } else {
            return false;
        }
    }

    
    public function setNombre($value){
        if ($this->validateString($value, 1, 250)) {
            $this->nombre_prov = $value;
            return true;
        } else {
            return false;
        }
    }

    /* Metodos para recibir */

    public function getId()
    {
        return $this->id_proveedor;
    }

    public function getDireccion()
    {
        return $this->direccion_prov;
    }

    public function getEmail()
    {
        return $this->correo_prov;
    }

    public function getTelefono()
    {
        return $this->telefono_prov;
    }

    public function getNombre()
    {
        return $this->nombre_prov;
    }

     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {   
        $sql = 'SELECT id_proveedor, direccion_prov, correo_prov, telefono_prov, nombre_prov
         from proveedor where nombre_prov ILIKE ? order by nombre_prov;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO proveedor(direccion_prov, correo_prov, telefono_prov, nombre_prov)
                VALUES(?, ?, ?, ?)';
        $params = array($this->direccion_prov, $this->correo_prov, $this->telefono_prov, $this->nombre_prov);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_proveedor, direccion_prov, correo_prov, telefono_prov, nombre_prov
                FROM proveedor order by nombre_prov';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_proveedor, direccion_prov, correo_prov, telefono_prov, nombre_prov
                FROM proveedor 
                WHERE id_proveedor = ? ';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE proveedor
                SET  direccion_prov = ?, correo_prov = ?, telefono_prov  = ?, nombre_prov = ?
                WHERE id_proveedor = ?';
        $params = array($this->direccion_prov, $this->correo_prov, $this->telefono_prov, $this->nombre_prov, $this->id_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::executeRow($sql, $params);
    }






    

    




}

