<?php

namespace App\Repository;

use App\Entity\DisciplineTest;
use Core\Repository;
use Core\SQLRepository;

class DisciplineRepository extends SQLRepository
{
    public function findAll(): array
    {
        $test = $this->PDO->query('SELECT * FROM discipline_test')->fetchAll();
        return [];
    }

    public function find($id): object
    {
        return new DisciplineTest();
    }

    public function delete()
    {

    }

    public function save($entity)
    {
        $this->addToQuery(['INSERT INTO discipline_test (name, first_answer, second_answer, third_answer)
            VALUE (:name, :first_answer, :second_answer, :third_answer)',
            $entity->getEntityInfo(), self::CREATE]);
    }

}
