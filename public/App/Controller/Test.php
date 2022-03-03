<?php

namespace App\Controller;

use App\Assets\Test\TestView;
use App\Services\TestValidator;

class Test
{
    public function test() {
        $validator = new TestValidator();

        $view = new TestView('Test/test.php', $validator->validate());

        return $view;
    }
}
