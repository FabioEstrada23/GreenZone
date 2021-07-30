<?php

class Pedido extends Validator
{   
    // Variables para pedido
    private $id_pedido = null;
    private $id_cliente_user = null;
    private $fecha_pedido = null;
    private $fecha_entrega = null;
    private $id_estado_pedido = null;

    // Variables para Detalle del Pedido
    private $id_detalle_pedido = null;
    private $id_producto = null;
    private $cantidad = null;
    private $precio_producto = null;

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_pedido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente_user = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setFechaPedido($value){
        if($this->validateDate($value)){
            $this->fecha_pedido = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setFechaEntrega($value){
        if($this->validateDate($value)){
            $this->fecha_entrega = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setEstadoPedido($value){
        if($this->validateNaturalNumber($value)){
            $this->id_estado_pedido = $value;
            return true;
        }else{
            return false;
        }
    }


    // Sets de Detalle del Pedido
    public function setId_detalle($value){
        if($this->validateNaturalNumber($value)){
            $this->id_detalle_pedido = $value;
            return true;
        }else{
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

    public function SetCantidad($value){
        if($this->validateNaturalNumber($value)){
            $this->cantidad = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setPrecioP($value){
        if($this->validateMoney($value)){
            $this->precio_producto = $value;
            return true;
        }else{
            return false;
        }
    }


    // Getters para Pedido
    public function getId(){
        return $this->id_pedido;
    }

    public function getCliente(){
        return $this->id_cliente_user;
    }

    public function getFechaPedido(){
        return $this->fecha_pedido;
    }

    public function getFechaEntrega(){
        return $this->fecha_entrega;
    }

    public function getEstadoPedido(){
        return $this->id_estado_pedido;
    }

    // Getters para detalle pedido
    public function GetId_Detalle(){
        return $this-> id_detalle_pedido;
    }

    public function getCantidad(){
        return $this-> cantidad;
    }

    public function getProducto(){
        return $this-> id_producto;
    }

    public function getPrecioP(){
        return $this-> precio_producto;
    }

    public function readAll()
    {
        $sql = 'SELECT id_pedido, cliente_user, fecha_pedido, fecha_entrega, estado_pedido FROM pedido
                INNER JOIN cliente_user USING(id_cliente_user) 
                INNER JOIN estado_pedido using(id_estado_pedido)
                WHERE id_cliente_user = ?
                ORDER BY id_pedido';
        $params = array($_SESSION['id_cliente_user']);
        return Database::getRows($sql, $params);
    }

 
    public function readEstados()
    {
        $sql = 'SELECT id_estado_pedido, estado_pedido FROM estado_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readDetalle()
    {
        $sql = 'SELECT id_detalle_pedido, nombre_pro, id_pedido, cantidad, precio_producto 
        FROM detalle_pedido INNER JOIN nombre_pro using(id_producto)
        WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }

    public function comprobantePago()
    {
        $sql = 'SELECT id_detalle_pedido, nombre_pro, precio_producto, cantidad
        FROM pedido INNER JOIN detalle_pedido USING(id_pedido) INNER JOIN producto USING(id_producto)
        WHERE id_pedido = ? group by id_detalle_pedido, nombre_pro, precio_pro, cantidad';
       $params = array($this->id_pedido);
       return Database::getRows($sql, $params);   
    }

    public function readCliente()
    {
        $sql = 'SELECT nombres_cli, apellidos_cli from pedido INNER JOIN cliente_user using(id_cliente_user) where id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }

}