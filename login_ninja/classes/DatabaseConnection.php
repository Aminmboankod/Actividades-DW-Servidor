<?php
class DatabaseConnection
{
    private static $dbConnectionInstance = null;

    private function __construct(){}

    public static function getInstance()
    {
        if (!isset(self::$dbConnectionInstance)) {
            $connectionString = "pgsql:host=randion.es;port=5432;dbname=amustafaboankod_formulario";
            $username = "amustafaboankod";
            $password = "Boank0d!";

            try {
                self::$dbConnectionInstance = new PDO(
                    $connectionString,
                    $username,
                    $password
                );
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$dbConnectionInstance;
    }
}
?>