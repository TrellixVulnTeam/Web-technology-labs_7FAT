<?php

namespace Core;

abstract class Entity
{
    protected $tableName;
    protected $rowsNames;

    public function __construct($tableName, $rowsNames)
    {
        $this->tableName = $tableName;
        $this->rowsNames = $rowsNames;
    }

    abstract public function getEntityInfo();
}
