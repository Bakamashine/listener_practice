<?php

use Database\Migrate\DatabaseMigrate;

require "../includes/minimal_header.php";

$migrate = new DatabaseMigrate();
$migrate->allRollback();