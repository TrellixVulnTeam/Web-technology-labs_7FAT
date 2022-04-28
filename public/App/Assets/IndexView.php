<?php

namespace App\Assets;

use Core\View;

class IndexView extends View
{
    private $viewName;
    private $data;

    public function __construct($v = null, $d = null)
    {
        $this->viewName = $v;
        $this->data = $d;
    }

    public function getView($v = null, $d = null)
    {
        parent::addCss('Stylesheet.php');
        parent::getView($this->viewName, $this->data);
        return '';
    }
}
