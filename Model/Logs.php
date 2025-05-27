<?php

namespace Model;

use Database\MainDB;
use PDO;

class Logs extends Model
{

    private $table = "Logs";

    public function getAll()
    {
        $stmt = self::$pdo->prepare("select * from $this->table");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function create(array $values) {
        $stmt = self::$pdo->prepare(
            "insert into $this->table (name) values(?)"
        );
        $stmt->execute($values);
    }
}
