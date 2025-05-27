<?php

namespace Database\Migrate;

use Database\MainDB;

class DatabaseMigrate extends MainDB {
    public function __invoke() {
        return [
            LogsMigrate::class
        ];
    }
}