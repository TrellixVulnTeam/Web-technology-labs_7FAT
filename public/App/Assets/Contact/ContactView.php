<?php

namespace App\Assets\Contact;

use Core\View;

class ContactView extends View
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
