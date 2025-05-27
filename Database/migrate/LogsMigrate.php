<?php

namespace Database\Migrate;

use Database\MainDB;

class LogsMigrate extends MainDB implements MigrateInterface
{
    private $table_name = "Logs";

    public function up(): void
    {
        self::$pdo->query("
        Create table if not exists $this->table_name (
            id int not null primary key auto_increment,
            name varchar(255) not null,
            code varchar(255) default 0
        "); 
    }

    public function down(): void
    {
        self::$pdo->query("drop table $this->table_name");
    }
}