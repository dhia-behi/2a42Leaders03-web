<?php


class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=formation',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                echo "Connected successfully"; // Success message
            } catch (Exception $e) {
                die('Connection error: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}


config::getConnexion();
?>
