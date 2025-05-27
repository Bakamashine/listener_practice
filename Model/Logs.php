<?php

namespace Model;

use Database\MainDB;
use PDO;
use PDOException;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

class Logs extends Model
{

    private $table = "Logs";

    public function getAll()
    {
        try {
            $stmt = self::$pdo->query("select * from $this->table");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function create(array $values) {
        $stmt = self::$pdo->prepare(
            "insert into $this->table (name) values(?)"
        );
        $stmt->execute($values);
    }
}
