<?php

namespace Database\Migrate;

use Database\MainDB;

class DatabaseMigrate extends MainDB {
    
    /**
     * List migration
     * @return MigrateInterface[]
     */
    public function __invoke() {
        return [
            LogsMigrate::class
        ];
    }

    /**
     * Делает все миграции
     * @return void
     */
    public function allMigrate() {
        foreach ($this->__invoke() as $value) {
            $value->up();
        }
    }

    /**
     * Откат всех миграций
     * @return void
     */
    public function allRollback() {
        foreach ($this->__invoke() as $value) {
            $value->down();
        }
    }

    public function refresh() {
        $this->allRollback();
        $this->allMigrate();
    }
}