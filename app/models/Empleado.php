<?php

class Empleado extends Validator
{
    private $id_empleado = null;
    private $nombres_emp = null;
	private $apellidos_emp = null;
	private $correo_emp = null; 
	private $alias_emp = null;
    private $clave_emp = null;
    private $id_tipo_empleado = null;
    private $id_estado_emp = null;
    private $passwordAlias = null;

	/*
    *   Métodos para asignar valores a los atributos.
    */
    public function setPasswordEmpleado($value, $alias)
    {
        if ($this->validatePasswordAlias($value, $alias, 16)) {
            return true;
        } else {
            return false;
        }
    }

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_empleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value){
        if($this->validateAlphabetic($value, 1, 40)){
            $this->nombres_emp = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setApellidos($value){
        if($this->validateAlphabetic($value, 1, 30)){
            $this->apellidos_emp = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setCorreo($value){
        if($this->validateEmail($value)){
            $this->correo_emp = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setAlias($value){
        if($this->validateAlphanumeric($value, 1, 30)){
            $this->alias_emp = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setClave($value){
        if($this->validatePassword($value)){
            $this->clave_emp = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setTipoEmp($value){
        if($this->validateNaturalNumber($value)){
            $this->id_tipo_empleado = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setEstado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_emp = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId(){
        return $this->id_empleado;
    }

    public function getNombres(){
        return $this->nombres_emp;
    }

    public function getApellidos(){
        return $this->apellidos_emp;
    }

    public function getCorreo(){
        return $this->correo_emp;
    }

    public function getAlias(){
        return $this->alias_emp;
    }

    public function getClave(){
        return $this->clave_emp;
    }

    public function getTipoEmp(){
        return $this->id_tipo_empleado;
    }

    public function getEstado(){
        return $this->id_estado_emp;
    }

    public function searchRows($value)
    {   
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, id_tipo_empleado, id_estado_emp
         from empleado_user where nombres_emp ILIKE ? order by nombres_emp;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $hash = password_hash($this->clave_emp, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO empleado_user(nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, id_tipo_empleado, id_estado_emp) 
        VALUES (?,?,?,?,?,?,?)';
        $params = array($this->nombres_emp,$this->apellidos_emp,$this->correo_emp,$this->alias_emp, $hash,$this->id_tipo_empleado,$this->id_estado_emp);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, tipo_empleado, estado_emp FROM empleado_user INNER JOIN tipo_empleado USING(id_tipo_empleado) INNER JOIN estado_emp USING(id_estado_emp) 
                ORDER BY id_empleado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readTipoEmpleado()
    {
        $sql = 'SELECT id_tipo_empleado, tipo_empleado FROM tipo_empleado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEstadoEmpleado()
    {
        $sql = 'SELECT id_estado_emp, estado_emp FROM estado_emp';
        $params = null;
        return Database::getRows($sql, $params);
    }


    public function readOne()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, id_tipo_empleado, id_estado_emp FROM empleado_user
                WHERE id_empleado = ?';
        $params = array($this->id_empleado);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE empleado_user set nombres_emp = ?, apellidos_emp = ?, correo_emp = ? , alias_emp = ?, id_tipo_empleado = ?, id_estado_emp = ?
                WHERE id_empleado = ?';
        $params = array($this->nombres_emp,$this->apellidos_emp,$this->correo_emp,$this->alias_emp,$this->id_tipo_empleado,$this->id_estado_emp,$this->id_empleado);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM empleado_user
                WHERE id_empleado = ?';
        $params = array($this->id_empleado);
        return Database::executeRow($sql, $params);
    }

    public function readEmpleadosPorTipo()
    {
        $sql = 'SELECT id_empleado, nombres_emp, apellidos_emp, correo_emp, alias_emp, clave_emp, tipo_empleado, estado_emp FROM empleado_user INNER JOIN tipo_empleado USING(id_tipo_empleado) INNER JOIN estado_emp USING(id_estado_emp) 
        WHERE id_tipo_empleado = ?';
        $params =  array($this->id_tipo_empleado);
        return Database::getRows($sql, $params);
    }

    public function readOneTipo()
    {
        $sql = 'SELECT id_tipo_empleado, tipo_empleado FROM tipo_empleado
                WHERE id_tipo_empleado = ?';
        $params = array($this->id_tipo_empleado);
        return Database::getRow($sql, $params);
    }


}