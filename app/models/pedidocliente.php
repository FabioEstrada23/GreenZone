<?php

class Pedido extends Validator
{   
    // Variables para pedido
    private $id_pedido = null;
    private $id_cliente_user = null;
    private $fecha_pedido = null;
    private $fecha_entrega = null;
    private $id_estado_pedido = null;

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

    public function readAll()
    {
        $sql = 'SELECT id_pedido, cliente_user, fecha_pedido, fecha_entrega, estado_pedido FROM pedido
                INNER JOIN cliente_user USING(id_cliente_user) 
                INNER JOIN estado_pedido using(id_estado_pedido)
                ORDER BY id_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

 
    public function readEstados()
    {
        $sql = 'SELECT id_estado_pedido, estado_pedido FROM estado_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOnePedido()
    {
        $sql = 'SELECT id_pedido, cliente_user, fecha_pedido, fecha_entrega, id_estado_pedido FROM pedido INNER JOIN cliente_user using(id_cliente_user)
        WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }

}