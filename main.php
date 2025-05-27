<?php

function print_help() {
    echo
    "
        -m --migrate AllMigrate,
        -r --rollback AllRollback
    ";
}

if (count($argv) <= 1) {
    print_help();
}

foreach ($argv as $value) {
    switch ($value) {
        case "-m" || "--migrate": 
            require "./scripts/allmigrate.php";
            break;
        case "-r" || "--rollback":
            require "./scripts/allrollback.php";
            break;
    }
}