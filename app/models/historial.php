<?php 

class Historialemp extends Validator
{
    /* Declaramos las variables */
    private $id_historial = null;
    private $id_empleado = null;
    private $dispositivo = null;
    /* Metodos para asginar */ 

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_historial = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEmpleado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_empleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDispositivo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 250)) {
            $this->dispositivo = $value;
            return true;
        } else {
            return false;
        }
    }


    /* Metodos para recibir */

    public function getId()
    {
        return $this->id_historial;
    }

    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }

    public function getDispositivo()
    {
        return $this->dispositivo;
    }


     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function RegistrarDispositivos()
    {
        $sql = 'INSERT INTO historial_sesion(id_empleado,dispositivo)
                VALUES(?,?)';
        $params = array($_SESSION['id_empleado'],php_uname());
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_historial, his.id_empleado, dispositivo, fecha
                FROM historial_sesion his
                INNER JOIN empleado_user emp on emp.id_empleado = his.id_empleado
                order by categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }

}

