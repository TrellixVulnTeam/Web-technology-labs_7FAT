<?php

namespace App\Assets\Authorization;

use Core\View;

class UnauthorizedSuccessView extends View
{
    private $viewName;
    private $data;

    public function __construct($v = null, $d = null)
    {
        $this->viewName = $v;
        $this->data = $d;
    }

    public function getView($viewName = null, $data = null)
    {
        parent::getView($this->viewName, $this->data);
        return '';
    }
}
