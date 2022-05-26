<?php

namespace App\Assets\Blog\Comment;

use Core\View;

class CommentsView extends View
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
        include 'Comments.php';
        return '';
    }
}
