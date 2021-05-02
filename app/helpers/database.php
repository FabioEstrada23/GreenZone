<?php

/* Clase para realizar las operaciones en la base de datos de Greenzone. */

class Database{
    // Propiedades de la clase para manejar las acciones respectivas.
    private static $connection = null;
    private static $statement = null;
    private static $error = null;

    /*   Método para establecer la conexión con el servidor de base de datos de Greenzone. */
    private static function connect()
    {
        // Credenciales para establecer la conexión con la base de datos.
        $server = 'localhost';
        $database = 'GreenZone';
        $username = 'postgres';
        $password = '02032003';

        // Se crea la conexión mediante la extensión PDO y el controlador para PostgreSQL.
        self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
    }

     /*
    *   Método para establecer un mensaje de error personalizado al ocurrir una excepción.
    *
    *   Parámetros: $code (código del error) y $message (mensaje original del error).
    *
    *   Retorno: ninguno.
    */
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

    /*
    *   Método para obtener un error personalizado cuando ocurre una excepción.
    *
    *   Parámetros: ninguno.
    *
    *   Retorno: error personalizado de la sentencia SQL o de la conexión con el servidor de base de datos de greenzone.
    */
    public static function getException()
    {
        return self::$error;
    }
}