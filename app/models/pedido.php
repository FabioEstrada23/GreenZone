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
    // usaremos el mismo id_pedido del pedido para esta operacion
    private $cantidad = null;

    // Set para Pedidos


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

    // set para detalle pedido

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

    // Setters para Pedido
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
    
    


}