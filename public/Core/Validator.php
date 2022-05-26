<?php

namespace Core;

abstract class Validator
{
    public const MAIL_REGEX = "/(?:[a-z0-9!#$%&'*+?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+?^_`{|}~-]+)*|(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
    public const NAME_REGEX = "/[a-zA-Zа-яА-ЯёЁ]+\s{1}[a-zA-Zа-яА-ЯёЁ]+\s{1}[a-zA-Zа-яА-ЯёЁ]+/";
    public const PHONE_REGEX = "/\+[73]\d{9,11}/";

    protected array $errors;

    public function validate(): array {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') $this->errors = ['success' => false, 'validation' => true];
        else $this->errors = ['success' => true, 'validation' => false];

        return $this->errors;
    }
}
