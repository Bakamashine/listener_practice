<?php

namespace Model;

use Database\MainDB;

abstract class Model extends MainDB  {
    abstract public function create(array $values);
    abstract public function getAll();
}
