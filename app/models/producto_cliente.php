<?php

class ProductoCliente extends Validator
{
    private $id_producto = null;
    private $nombre_pro = null;
	private $id_estado_pro = null;
	private $id_categoria = null; 
	private $id_marca = null;
    private $precio_pro = null;
    private $oferta_pro = null;
    private $precio_final = null;
    private $descripcion_pro = null;
    private $id_proveedor = null;
    private $existencias = null;
    private $imagen = null;
    private $direccion = '../../../resources/img/productos/';

	
    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value){
        if($this->validateAlphabetic($value, 1, 50)){
            $this->nombre_pro = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setIdEstado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_pro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCategoria($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdMarca($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_marca = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecioP($value){
        if($this->validateMoney($value)){
            $this->precio_pro = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setOfertaPro($value){
        if($this->validateMoney($value)){
            $this->oferta_pro = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setPrecioFinal($value){
        if($this->validateMoney($value)){
            $this->precio_final = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setDescripcion($value){
        if($this->validateAlphabetic($value, 1, 150)){
            $this->descripcion_pro = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setIdProveedor($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setExistencias($value){
        if($this->validateNaturalNumber($value)){
            $this->existencias = $value;
            return true;
        }else{
            return false;
        }  
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function getId(){
        return $this->id_producto;
    }

    public function getNombre(){
        return $this->nombre_pro;
    }

    public function getIdEstado(){
        return $this->id_estado_pro;
    }

    public function getIdCategoria(){
        return $this->id_categoria;
    }

    public function getIdMarca(){
        return $this->id_marca;
    }

    public function getPrecioP(){
        return $this->precio_pro;
    }

    public function getOfertaPro(){
        return $this->oferta_pro;
    }

    public function getPrecioFinal(){
        return $this->precio_final;
    }

    public function getDescripcion(){
        return $this->descripcion_pro;
    }

    public function getIdProveedor(){
        return $this->id_proveedor;
    }

    public function getExistencias(){
        return $this->existencias;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    

    public function searchRows($value)
    {   
        $sql = 'SELECT id_producto, nombre_pro, id_estado_producto, id_categoria, id_marca, precio_pro, oferta_pro,descripcion_pro, id_proveedor, existencias, imagen
         from producto where nombre_pro ILIKE ? order by nombre_pro;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_producto, nombre_pro, id_estado_producto, id_categoria, id_marca, precio_pro, oferta_pro, descripcion_pro, id_proveedor, existencias, imagen FROM producto 
            INNER JOIN estado_producto USING(id_estado_producto) 
            INNER JOIN categoria_producto USING(id_categoria) 
            INNER JOIN marca_producto USING(id_marca) 
            INNER JOIN proveedor USING(id_proveedor)
            ORDER BY id_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEstados()
    {
        $sql = 'SELECT id_estado_producto, estado_pro FROM estado_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCategoria()
    {
        $sql = 'SELECT id_categoria, categoria FROM categoria_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readMarca()
    {
        $sql = 'SELECT id_marca, marca FROM marca_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProveedor()
    {
        $sql = 'SELECT id_proveedor, nombre_prov FROM proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }


    public function readOne()
    {
        $sql = 'SELECT id_producto, nombre_pro, id_estado_producto, id_categoria, id_marca, precio_pro, oferta_pro, descripcion_pro, id_proveedor, existencias, imagen FROM producto
                WHERE id_producto = ?';
        $params = array($this->id_producto);
        return Database::getRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
}
?>