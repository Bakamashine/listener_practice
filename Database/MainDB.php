<?php

namespace Database;

use Exception;
use PDO;
use PDOException;

class MainDB implements DBInterface
{
    protected static PDO $pdo;

    
    /**
     * Production
     * @return void
     */
    public static function connect() {
        try {
            $host = "localhost";
            $dbname = "dadamapt_list";
            $pass = "Moredock1moredock1";
            $user = "dadamapt_list";
            // $charset = "utf-8";

            $dsn = "mysql:host=$host;dbname=$dbname";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            self::$pdo = new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $e) {
            echo "Подключение не удалось: " . $e->getMessage();
        }
    }

    /**
     * Dev
     * @return void
     */
    // public static function connect()
    // {
    //     try {
    //         $host = '127.0.0.1';
    //         $db = 'listener';
    //         $user = 'root';
    //         $pass = 'admin';
    //         $charset = 'utf8';

    //         $dsn = "mysql:host=$host;charset=$charset";
    //         $opt = [
    //             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //             PDO::ATTR_EMULATE_PREPARES => false,
    //         ];
    //         self::$pdo = new PDO($dsn, $user, $pass, $opt);
    //         $query = self::$pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db'");
    //         if ($query->rowCount() === 0) {
    //             self::$pdo->exec("CREATE DATABASE `$db` CHARACTER SET $charset COLLATE ${charset}_general_ci");
    //         }

    //         self::$pdo->exec("USE `$db`");
    //         echo "Подключение к БД произошло успешно!";
    //     } catch (PDOException $e) {
    //         echo "Подключение не удалось: " . $e->getMessage();
    //     } catch (Exception $e) {
    //         echo "Призошла ошибка: " . $e->getMessage();
    //     }
    // }
}
