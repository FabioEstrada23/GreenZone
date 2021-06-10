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
    private $precio = null;

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

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
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

    //Getters para Detalle pedido

    public function GetId_Detalle(){
        return $this-> id_detalle_pedido;
    }

    public function getCantidad(){
        return $this-> cantidad;
    }

    public function getProducto(){
        return $this-> id_producto;
    }

    public function searchRows($value1, $value2)
    {
        $sql = 'SELECT id_pedido, cliente_user, fecha_pedido, fecha_entrega, estado_pedido FROM pedido INNER JOIN cliente_user USING(id_cliente_user) 
        INNER JOIN estado_pedido using(id_estado_pedido) WHERE fecha_pedido BETWEEN ? and ?';
        $params = array("$value1", "$value2");
        return Database::getRows($sql, $params);
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


    public function updateRow()
    {
        $sql = 'UPDATE pedido SET id_estado_pedido = ? where id_pedido = ?';
        $params = array($this->id_estado_pedido,$this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM pedido
                WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    public function readOnePedido()
    {
        $sql = 'SELECT id_pedido, cliente_user, fecha_pedido, fecha_entrega, id_estado_pedido FROM pedido INNER JOIN cliente_user using(id_cliente_user)
        WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }

    public function readOneDetalle()
    {
        $sql = 'SELECT id_detalle_pedido, nombre_pro, cantidad FROM detalle_pedido 
        INNER JOIN pedido using(id_pedido) 
        INNER JOIN producto using(id_producto) WHERE detalle_pedido.id_pedido = pedido.id_pedido and id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }


    public function readPrecioTotal()
    {
        $sql = 'SELECT cantidad * precio_pro as total FROM detalle_pedido INNER JOIN producto using(id_producto)
         INNER JOIN pedido using(id_pedido) where detalle_pedido.id_pedido = pedido.id_pedido and id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRow($sql, $params);
    }

    public function readOrder()
    {
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');

        $sql = 'SELECT id_pedido
                FROM pedido
                WHERE id_estado_pedido = 1 AND id_cliente_user = ?';
        $params = array($_SESSION['id_cliente_user']);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_pedido = $data['id_pedido'];
            return true;
        } else {
            $sql = 'INSERT INTO pedido(id_cliente_user, fecha_pedido, fecha_entrega, id_estado_pedido)
                    VALUES(?,?,?,1)';
            $params = array($_SESSION['id_cliente_user'], $date, $date);
            // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
            if ($this->id_pedido = Database::getLastRow($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function createDetail()
    {
        $sql = 'INSERT INTO detalle_pedido(id_producto, precio_producto, cantidad, id_pedido)
                VALUES(?, (SELECT precio_pro from producto where id_producto = ?), ?, ?)';
        $params = array($this->id_producto, $this->id_producto, $this->cantidad, $this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    public function readCart()
    {
        $sql = 'SELECT id_detalle_pedido, nombre_pro, detalle_pedido.precio_producto, detalle_pedido.cantidad
                FROM pedido INNER JOIN detalle_pedido USING(id_pedido) INNER JOIN producto USING(id_producto)
                WHERE id_pedido = ?';
        $params = array($this->id_pedido);
        return Database::getRows($sql, $params);
    }

    public function finishOrder()
    {
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $sql = 'UPDATE pedido
                SET id_estado_pedido = ?, fecha_pedido = ?
                WHERE id_pedido = ?';
        $params = array(1, $date, $this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    public function updateDetail()
    {
        $sql = 'UPDATE detalle_pedido
                SET cantidad = ?
                WHERE id_pedido = ? AND id_detalle_pedido = ?';
        $params = array($this->cantidad, $this->id_pedido, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    public function deleteDetail()
    {
        $sql = 'DELETE FROM detalle_pedido
                WHERE id_pedido = ? AND id_detalle_pedido = ?';
        $params = array($this->id_pedido, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }



    




    


}