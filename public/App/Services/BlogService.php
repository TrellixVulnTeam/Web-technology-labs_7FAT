<?php

namespace App\Services;

use App\Entity\Blog;
use App\Repository\BlogRepository;

class BlogService
{
    use Pagination;

    public function getBlogPostsOnCurrentPage() {
        $currentPage = $this->getCurrentPage();

        $blogRepository = new BlogRepository();

        $postsCounter = $blogRepository->countPosts();

        $maxPage = $this->getMaxPage($postsCounter);

        $currentFirstPost = $this->countCurrentFirstPost();

        $postsOnCurrentPage = $blogRepository->findByLimit($currentFirstPost, POSTS_ON_SINGLE_PAGE);

        return [
            'posts' => $postsOnCurrentPage,
            'maxPage' => $maxPage,
            'currentPage' => $currentPage
        ];
    }

    public function saveToBlog() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['theme']) && !empty($_POST['comment'])) {
                $blogEntity = new Blog();

                $blogEntity->setTheme($_POST['theme']);
                $blogEntity->setText($_POST['comment']);


                $filetype = explode('/',$_FILES['postimage']['type'])[1];
                $imagename = md5(date('Y/m/d H:i:s')).'.'.$filetype;


                $src = $_FILES['postimage']['tmp_name'];
                $dest = getcwd().'/assets/blog/res/'.$imagename;
                if (move_uploaded_file($src, $dest)) {
                    $blogEntity->setImage($imagename);
                }
                else $blogEntity->setImage(null);

                $blogEntity->setDate(date('Y/m/d H:i:s'));

                $blogRepository = new BlogRepository();
                $blogRepository->save($blogEntity);
                $blogRepository->exec();

                return true;
            }
        }

        return false;
    }
}
