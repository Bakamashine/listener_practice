<?php

namespace Database\Migrate;

interface MigrateInterface {
    public function up(): void;
    public function down(): void;
}