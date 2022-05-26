<?php

namespace App\Repository;

use App\Controller\Test;
use App\Entity\DisciplineTest;
use Core\Repository;
use Core\SQLRepository;

class DisciplineRepository extends SQLRepository
{
    public function findAll(): array
    {
        $test = $this->PDO->query('SELECT * FROM discipline_test')->fetchAll();
        return $this->makeTestFromArray($test);
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

    private function makeTestFromArray($array) {
        $testEntities = [];

        foreach ($array as $test) {
            $testEntity = new DisciplineTest();
            $testEntity->setId($test['id']);
            $testEntity->setName($test['name']);
            $testEntity->setFirstAnswer($test['first_answer']);
            $testEntity->setSecondAnswer($test['second_answer']);
            $testEntity->setThirdAnswer($test['third_answer']);

            $testEntities[] = $testEntity;
        }

        return $testEntities;
    }
}
