<?php

namespace App\Services;

use App\Entity\Comment;
use App\Repository\CommentRepository;

class CommentService
{
    public function addComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment = new Comment();

            header('Content-Type: text/html;');
            $data = file_get_contents('php://input');
            $json = json_decode($data);

            //var_dump($json);
            $comment->setCommentText($json->commentText);
            $comment->setBlogId((int)$json->blogId);

            $commentRepository = new CommentRepository();

            $commentRepository->save($comment);
            $commentRepository->exec();

            $dataArr = [];
            $dataArr[] = $comment;

            return $dataArr;
        }

        return false;
    }

    public function getComments() {
        $id = $this->getCommentId();

        $commentRepository = new CommentRepository();
        return $commentRepository->findByBlogId($id);
    }

    private function getCommentId() {
        return (explode('/',$_SERVER['REQUEST_URI'])[2]);
    }
}
