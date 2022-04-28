<?php

namespace App\Controller;

use App\Assets\Test\TestView;
use App\Repository\DisciplineRepository;
use App\Services\MakeDisciplineEntity;
use App\Services\TestValidator;
use Core\Controller;

class Test extends Controller
{
    public function test() {
        $validator = new TestValidator();

        $disciplineRepo = new DisciplineRepository();

        $data = $validator->validate();

        if ($data['validation']) {
            $disciplineEntity = (new MakeDisciplineEntity())->makeEntity($data);

            $disciplineRepo->save($disciplineEntity);
            $disciplineRepo->exec();
        }
        $data['results'] = $disciplineRepo->findAll();

        $view = new TestView('Test/test.php', $data);

        return $view;
    }
}
