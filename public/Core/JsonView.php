<?php

namespace Core;

class JsonView extends View
{
    private $json;

    public function __construct($array)
    {
        $this->json = json_encode($array);
    }

    public function getView($viewName = null, $data = null)
    {
        header('Content-type: application/json;');
        return $this->json;
    }
}
