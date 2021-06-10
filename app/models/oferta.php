<?php

class Oferta extends Validator
{
    private $id_oferta = null;
    private $id_producto = null;
	private $descuento = null;
	private $precio_descuento = null; 
	private $precio_anterior = null;
	
    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_oferta = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setProducto($value){
        if($this->validateNaturalNumber($value)){
            $this->id_producto = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setDescuento($value){
        if($this->validateMoney($value)){
            $this->descuento = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setPrecioDescuento($value){
        if($this->validateMoney($value)){
            $this->precio_descuento = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setPrecioAnterior($value){
        if($this->validateMoney($value)){
            $this->precio_anterior = $value;
            return true;
        }else{
            return false;
        }  
    }


    public function getId(){
        return $this->id_oferta;
    }

    public function getProducto(){
        return $this->id_producto;
    }

    public function getDescuento(){
        return $this->descuento;
    }

    public function getPrecioDescuento(){
        return $this->precio_descuento;
    }

    public function getPrecioAnterior(){
        return $this->precio_anterior;
    }

    public function searchRows($value1, $value2)
    {
        $sql = 'SELECT id_oferta, descuento, precio_descuento, precio_anterior, nombre_pro
         FROM oferta INNER JOIN producto USING(id_producto) 
         WHERE precio_descuento BETWEEN ? AND ?';
        $params = array("$value1", "$value2");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO oferta(descuento, precio_descuento, precio_anterior, id_producto) VALUES (?,?,?,?)';
        $params = array($this->descuento,$this->precio_descuento,$this->precio_anterior,$this->id_producto);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_oferta, nombre_pro, precio_descuento, precio_anterior, descuento FROM oferta 
                INNER JOIN nombre_pro USING(id_producto)
                ORDER BY id_oferta';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProductos()
    {
        $sql = 'SELECT id_producto, nombre_pro FROM producto';
        $params = null;
        return Database::getRows($sql, $params);
    }



    public function readOne()
    {
        $sql = 'SELECT id_oferta, descuento, precio_descuento, precio_anterior, id_producto FROM oferta
                WHERE id_oferta = ?';
        $params = array($this->id_oferta);
        return Database::getRow($sql, $params);
    }

    public function readProducto()
    {
        $sql = 'SELECT precio_pro FROM producto WHERE id_producto = ?';
        $params = array($this->id_producto);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE oferta set descuento = ?, precio_descuento = ?, precio_anterior = ?, id_producto = ?
                WHERE id_oferta = ?';
        $params = array($this->descuento,$this->precio_descuento,$this->precio_anterior,$this->id_producto, $this->id_oferta);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM oferta
                WHERE id_oferta = ?';
        $params = array($this->id_oferta);
        return Database::executeRow($sql, $params);
    }


}