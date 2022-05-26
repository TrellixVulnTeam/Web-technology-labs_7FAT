<?php

namespace App\Assets\Blog;

use Core\View;

class SingleBlogView extends View
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
        include 'SingleBlog.php';
        return '';
    }
}
