<?php

use Database\Migrate\DatabaseMigrate;

require($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");

$migrate = new DatabaseMigrate();
$migrate->allMigrate();