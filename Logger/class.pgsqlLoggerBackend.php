<?php

class pgsqlLoggerBackend {
    const INFO = 1;
    const WARNING = 2;
    const DEBUG = 3;

    private static $instance;

    private function __construct() {
        // Constructor privado para evitar instanciación directa
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function logMessage($message, $level) {
        try {
            // Conectar a la base de datos
            $pdo = new PDO("pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root");

            // Preparar la sentencia SQL para insertar el mensaje
            $stmt = $pdo->prepare("INSERT INTO logdata (message, level) VALUES (:message, :level)");

            // Ejecutar la sentencia SQL
            $stmt->execute(array(
                ':message' => $message,
                ':level' => $level
            ));

            echo "Mensaje guardado en la base de datos.\n";
        } catch (PDOException $e) {
            // Manejar cualquier excepción de PDO (por ejemplo, problemas de conexión)
            echo "Error al guardar el mensaje en la base de datos: " . $e->getMessage() . "\n";
        }
    }
}

?>


