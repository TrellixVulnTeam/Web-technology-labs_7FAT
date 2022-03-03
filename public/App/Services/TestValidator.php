<?php

namespace App\Services;

use Core\Validator;

class TestValidator extends Validator
{
    public function __construct()
    {
        $this->errors = ['answers' => []];
    }

    private function validateFirstQuest() {
        if (preg_match('/^[2][0]$/', $_POST['1_question'])) $this->errors['answers'][1] = 'Правильно';
        else $this->errors['answers'][1] = 'Не правильно';
    }

    private function validateSecondQuest() {
        if (isset($_POST['correct_1']) && isset($_POST['correct_2'])) $this->errors['answers'][2] = 'Правильно';
        else $this->errors['answers'][2] = 'Не правильно';
    }

    private function validateThirdQuest() {
        if ($_POST['3_question'] == 1) $this->errors['answers'][3] = 'Правильно';
        else $this->errors['answers'][3] = 'Не правильно';
    }

    public function validate(): array
    {
        //var_dump($_POST);
        $this->validateFirstQuest();
        $this->validateSecondQuest();
        $this->validateThirdQuest();

        if (isset($_POST['name'])) $this->errors['name'] = $_POST['name'];

        return $this->errors;
    }
}
