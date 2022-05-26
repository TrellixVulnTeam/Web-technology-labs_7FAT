<?php

namespace App\Assets\Edit;

use Core\View;

class EditView extends View
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
        parent::addCss('Edit/Stylesheet.php');
        parent::getView($this->viewName, $this->data);
        return '';
    }
}
