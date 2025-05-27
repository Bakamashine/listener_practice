<?php

function print_help() {
    echo
    "Недостаточно параметров!
        -m --migrate AllMigrate,
        -r --rollback AllRollback\n";
        exit();
}

if (count($argv) <= 1) {
    print_help();
}

foreach ($argv as $value) {
    switch ($value) {
        case "-m":
        case "--migrate": 
            require "./scripts/allmigrate.php";
            echo "Все миграции были выполнены\n";
            break;
        case "-r":
        case "--rollback":
            require "./scripts/allrollback.php";
            echo "Все миграции были откачены\n";
            break;
        case "-re":
        case "--refresh":
            require "./scripts/refresh.php";
            echo "Все миграции были обновлены\n";
            break;
        default:
            echo "Неизвестный параметр: $value\n";
            print_help();
            exit; // Завершаем выполнение скрипта
    }
}