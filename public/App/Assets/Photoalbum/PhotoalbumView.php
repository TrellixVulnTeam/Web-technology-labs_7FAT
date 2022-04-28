<?php

namespace App\Assets\Photoalbum;

use Core\View;

class PhotoalbumView extends View
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
        parent::addCss('Photoalbum/Stylesheet.php');
        parent::getView($this->viewName, $this->data);
        return '';
    }
}
