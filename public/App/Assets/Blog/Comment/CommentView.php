<?php

namespace App\Assets\Blog\Comment;

use App\Entity\Comment;
use Core\View;

class CommentView extends View
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
        if (is_array($this->data)) {
            extract($this->data);
        }

        include 'Comment.php';
        return '';
    }
}
