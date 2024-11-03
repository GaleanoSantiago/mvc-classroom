<?php

// Inclusión de archivo de configuración
require_once ('config/config.php');

// Definición de la clase Db
class Db {
    // Propiedades privadas
    private $host;
    private $db;
    private $user;
    private $pass;

    // Propiedad pública para la conexión
    public $conection;

    // Constructor
    public function __construct() {
        // Asignación de valores a las propiedades privadas
        $this->host = constant('DB_HOST');
        $this->db = constant('DB');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        // Creación de la conexión PDO
        try {
            $this->conection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
        } catch (PDOException $e) {
            // Manejo de errores
            echo $e->getMessage();
            exit();
        }
    }
}

?>