<?php 

class categoria extends Validator
{
    /* Declaramos las variables */
    private $id_categoria = null;
    private $categoria = null;
    /* Metodos para asginar */ 

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setcateg($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    /* Metodos para recibir */

    public function getId()
    {
        return $this->id_categoria;
    }

    public function getcateg()
    {
        return $this->categoria;
    }


     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {   
        $sql = 'SELECT id_categoria, categoria
         from categoria_producto where categoria ILIKE ? order by categoria;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO categoria_producto(categoria)
                VALUES(?)';
        $params = array($this->categoria);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_categoria, categoria
                FROM categoria_producto order by categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_categoria, categoria
                FROM categoria_producto 
                WHERE id_categoria = ? ';
        $params = array($this->id_categoria);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE categoria_producto
                SET  categoria = ?
                WHERE id_categoria = ?';
        $params = array($this->categoria, $this->id_categoria);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM categoria_producto
                WHERE id_categoria = ?';
        $params = array($this->id_categoria);
        return Database::executeRow($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT categoria, id_producto, nombre_pro, precio_pro, existencias
                FROM producto INNER JOIN categoria_producto USING(id_categoria)
                WHERE id_categoria = ? 
                ORDER BY nombre_pro';
        $params = array($this->id_categoria);
        return Database::getRows($sql, $params);
    }

}

