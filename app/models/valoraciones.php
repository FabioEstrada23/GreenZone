<?php

class Valoraciones extends Validator
{
    /* Declaramos las variables */
    private $id = null;
    private $idCliente = null;
    private $idProducto = null;
    private $puntuaciones = null;
    private $comentario = null;

    /* Metodos para asignar */

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value){
        if ($this->validateNaturalNumber($value)) {
            $this->idCliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProducto($value){
        if ($this->validateNaturalNumber($value)) {
            $this->idProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPuntuaciones($value){
        if ($this->validateNaturalNumber($value)) {
            $this->puntuaciones = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setComentario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 300)) {
            $this->Comentario = $value;
            return true;
        } else {
            return false;
        }
    }

    /* Metodos para recibir */

    public function getId()
    {
        return $this->id;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }
    
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getPuntuaciones()
    {
        return $this->puntuaciones;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function searchRows($value)
    {   
        $sql = 'select id_valoracion, cliente_user.cliente_user, producto.nombre_pro, puntuaciones from valoraciones
        INNER JOIN producto ON valoraciones.id_producto = producto.id_producto
        INNER JOIN cliente_user ON valoraciones.id_cliente_user = cliente_user.id_cliente_user 
        from valoraciones where nombre_prov ILIKE ? order by producto.nombre_pro;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
}

?>