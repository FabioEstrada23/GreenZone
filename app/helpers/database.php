<?php
/* Clase para realizar las operaciones en la base de datos de GreenZone. */
class Database{

        private static $connection;
        private static $statement = null;
        private static $error = null;

        public static function connect()
        {
            // Credenciales para establecer la conexión con la base de datos.
            $server = 'localhost';
            $database = 'Green_Zone';
            $username = 'postgres';
            $password = '02032003';

            if(!isset(self::$connection)){/* Validar que hay conexión*/ 
                try{
                    self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
                    /* Conexión con postgres*/
                    self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    /* Parámetros*/
                    self::$connection->exec("SET NAMES 'UTF8'");
                    /* Respetar caracteres como ñ y acentos de BD */
                }
                catch(PDOException $e){
                    print "ERROR: " .$e->getMessage()."<br/>";
                    /* Imprimir mensaje de error */
                }
            }
        }
    // Database::connect();

    public static function executeRow($query, $values)
    {
        try {
            self::connect();
            self::$statement = self::$connection->prepare($query);
            $state = self::$statement->execute($values);
            // Se anula la conexión con el servidor de base de datos.
            self::$connection = null;
            return $state;
        } catch (PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            return false;
        }
    }

    public static function getLastRow($query, $values)
    {
        try {
            self::connect();
            self::$statement = self::$connection->prepare($query);
            if (self::$statement->execute($values)) {
                $id = self::$connection->lastInsertId();
            } else {
                $id = 0;
            }
            // Se anula la conexión con el servidor de base de datos.
            self::$connection = null;
            return $id;
        } catch (PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            return 0;
        }
    }

    public static function getRow($query, $values)
    {
        try {
            self::connect();
            self::$statement = self::$connection->prepare($query);
            self::$statement->execute($values);
            // Se anula la conexión con el servidor de base de datos.
            self::$connection = null;
            return self::$statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            return false;
        }
    }

    public static function getRows($query, $values)
    {
        try {
            self::connect();
            self::$statement = self::$connection->prepare($query);
            self::$statement->execute($values);
            // Se anula la conexión con el servidor de base de datos.
            self::$connection = null;
            return self::$statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            return false;
        }
    }

    private static function setException($code, $message)
    {
        // Se compara el código del error para establecer un error personalizado.
        switch ($code) {
            case '7':
                self::$error = 'Existe un problema al conectar con el servidor';
                break;
            case '42703':
                self::$error = 'Nombre de campo desconocido';
                break;
            case '23505':
                self::$error = 'Dato duplicado, no se puede guardar';
                break;
            case '42P01':
                self::$error = 'Nombre de tabla desconocido';
                break;
            case '23503':
                self::$error = 'Registro ocupado, no se puede eliminar';
                break;
            default:
                //self::$error = 'Ocurrió un problema en la base de datos';
                self::$error = $message;
        }
    }

    public static function getException()
    {
        return self::$error;
    }
}

