<?php

namespace Core;

interface Repository
{
    public function findAll() : array;

    public function find($id) : object;

    public function delete();

    public function save($entity);
}
