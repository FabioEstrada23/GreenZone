<?php 

class ofertascliente extends Validator
{
    /* Declaramos las variables */
    private $id_oferta = null;
    private $descuento = null;
    private $precio_descuento = null;
    private $precio_anterior = null;
    private $id_producto = null;

    /* Metodos para asignar */ 
    public function setIdOferta($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_oferta = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setIdProducto($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto = $value;
            return true;
        } else {
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
    /* Metodos para recibir */

    public function getIdOferta()
    {
        return $this->id_oferta;
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getPrecioDescuento()
    {
        return $this->precio_descuento;
    }

    public function getPrecioAnterior()
    {
        return $this->precio_anterior;
    }


     /*
    *   Métodos para realizar las operaciones SCRUD (search, read).
    */

    public function searchRows($value)
    {   
        $sql = 'SELECT id_oferta, descuento, precio_descuento, precio_anterior, id_producto
         from oferta INNER JOIN producto USING(id_producto) 
         WHERE precio_descuento BETWEEN ? AND ?';
        $params = array("$value1", "$value2");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_oferta, descuento, precio_descuento, precio_anterior, id_producto
                FROM oferta INNER JOIN producto USING(id_producto) order by id_oferta';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProductos()
    {
        $sql = 'SELECT id_producto, nombre_pro FROM producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

}

