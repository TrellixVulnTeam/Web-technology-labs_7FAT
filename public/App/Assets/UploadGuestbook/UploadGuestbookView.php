<?php

namespace App\Assets\UploadGuestbook;

use Core\View;

class UploadGuestbookView extends View
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
