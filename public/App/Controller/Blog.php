<?php

namespace App\Controller;

use App\Assets\Blog\BlogView;
use App\Assets\Edit\EditView;
use App\Services\BlogService;

class Blog
{
    public function blog() {
        $blog = new BlogService();

        $view = new BlogView('Blog/Blog.php', $blog->getBlogPostsOnCurrentPage());

        return $view;
    }

    public function editBlog() {
        $blog = new BlogService();

        if ($blog->saveToBlog()) {
            header('Location: http://127.0.0.1:80/blog/1');
            die();
        }

        $view = new EditView('Edit/Edit.php', null);

        return $view;
    }
}
