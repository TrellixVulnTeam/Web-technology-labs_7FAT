<?php

namespace App\Controller;

use App\Assets\Blog\BlogView;
use App\Assets\Blog\Comment\CommentsView;
use App\Assets\Blog\Comment\CommentView;
use App\Assets\Edit\EditView;
use App\Entity\User;
use App\Services\BlogService;
use App\Services\CommentService;
use App\Services\UserService;
use Core\Controller;

class Blog extends Controller
{
    public function blog() {
        $blog = new BlogService();

        $view = new BlogView('Blog/Blog.php', $blog->getBlogPostsOnCurrentPage());

        return $view;
    }

    public function editBlog() {
        if ((new UserService())->checkAuthorization()) {
            $blog = new BlogService();

            if ($blog->saveToBlog()) {
                header('Location: http://127.0.0.1:80/blog/1');
                die();
            }

            $view = new EditView('Edit/Edit.php', null);

            return $view;
        }

        return (new Admin())->authenticationError();
    }

    public function addComment() {
        $data = (new CommentService())->addComment();

        $view = new CommentView('Comment.php', $data);

        return $view;
    }

    public function getComments() {
        $data = (new CommentService())->getComments();

        $view = new CommentsView('Comments.php', $data);

        return $view;
    }
}
