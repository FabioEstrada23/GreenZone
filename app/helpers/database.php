<?php
/* Clase para realizar las operaciones en la base de datos de GreenZone. */
    class Database{
        private static $connection;

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
    }
    Database::connect();

?>