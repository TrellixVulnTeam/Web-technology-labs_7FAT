<?php

namespace App\Services;

use App\Entity\DisciplineTest;

class MakeDisciplineEntity
{
    public function makeEntity($validator) {
        $disciplineEntity = new DisciplineTest();

        $disciplineEntity->setName($_POST['name']);

        $disciplineEntity->setFirstAnswer(false);
        $disciplineEntity->setSecondAnswer(false);
        $disciplineEntity->setThirdAnswer(false);

        if ($validator['answers'][1] === 'Правильно') {
            $disciplineEntity->setFirstAnswer(true);
        }
        if ($validator['answers'][2] === 'Правильно') {
            $disciplineEntity->setSecondAnswer(true);
        }
        if ($validator['answers'][3] === 'Правильно') {
            $disciplineEntity->setThirdAnswer(true);
        }

        return $disciplineEntity;
    }
}
