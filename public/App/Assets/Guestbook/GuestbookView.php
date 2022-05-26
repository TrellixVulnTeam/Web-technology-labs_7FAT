<?php

namespace App\Assets\Guestbook;

use Core\View;

class GuestbookView extends View
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
        parent::addCss('Guestbook/Stylesheet.php');
        parent::getView($this->viewName, $this->data);
        return '';
    }
}
