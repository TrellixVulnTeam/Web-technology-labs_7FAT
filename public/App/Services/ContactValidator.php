<?php

namespace App\Services;

use Core\Validator;

class ContactValidator extends Validator
{


    public function __construct()
    {
        $this->errors = ['success' => false];
    }

    public function validateEmail($value) {
        if (preg_match(Validator::MAIL_REGEX, $value)) return;

        $this->errors['email'] = 'Email должен содержать минимум 1 символ, @, минимум 1 символ, точку, минимум 1 символ.';
    }

    public function validateNumber($value) {
        if (preg_match(Validator::PHONE_REGEX, $value)) return;

        $this->errors['number'] = 'Номер должен начинаться +, код 7 или 3, без пробелов.';
    }

    public function validateName($value) {
        if (preg_match(Validator::NAME_REGEX, $value)) return;

        $this->errors['name'] = 'Между словами 1 пробел; строго 3 слова.';
    }

    public function validate() : array
    {
        if (!parent::validate()['validation']) return $this->errors;

        $this->validateEmail($_POST['email']);
        $this->validateNumber($_POST['number']);
        $this->validateName($_POST['name']);

        if (count($this->errors) > 1) return $this->errors;

        return ['success' => true];
    }
}
