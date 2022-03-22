<?php

namespace App\Controller;

use App\Assets\Test\TestView;
use App\Repository\DisciplineRepository;
use App\Services\MakeDisciplineEntity;
use App\Services\TestValidator;

class Test
{
    public function test() {
        $validator = new TestValidator();

        $disciplineRepo = new DisciplineRepository();

        $data = $validator->validate();

        if ($data['validation']) {
            $disciplineEntity = (new MakeDisciplineEntity())->makeEntity($data);

            var_dump($disciplineEntity);

            $disciplineRepo->save($disciplineEntity);
            $disciplineRepo->exec();
            echo 'был тут';
        }

        $view = new TestView('Test/test.php', $data);

        return $view;
    }
}
