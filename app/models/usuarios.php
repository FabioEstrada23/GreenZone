<?php
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
    private $idEsUsE = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
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
            $this->idEsUsE = $value;
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
        return $this->idEsUsE;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */

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
        $sql = 'SELECT id_empleado FROM empleado_user WHERE alias_emp = ?';
        $params = array($alias);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_empleado'];
            $this->alias = $alias;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Método para verificar contraseña.
    */
    public function checkPassword($password)
    {
        $sql = 'SELECT clave_emp FROM empleado_user WHERE id_empleado = ?';
        $params = array($this->id);

        if ($data = Database::getRow($sql, $params)) {
            if($password == $data['clave_emp']){
               return true; 
            }
            else{
                return false;
            }
            
        } else {
            return false;
        }


        /*$data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_emp'])) {
            
            return true;
        } else {
            return false;
        }*/
    }

    public function readProfile()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp
                FROM empleado_user
                WHERE id_empleado = ?';
        $params = array($_SESSION['id_empleado']);
        return Database::getRow($sql, $params);
    }
    
}
