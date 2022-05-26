<?php

namespace App\Repository;

use App\Entity\Comment;
use Core\SQLRepository;
use PDO;

class CommentRepository extends SQLRepository
{

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
        return [];
    }

    private function makeCommentsFromArray($arr) {
        $comments = [];

        foreach ($arr as $comment) {
            $temp = new Comment();

            $temp->setId($comment['id']);
            $temp->setCommentText($comment['comment_text']);
            $temp->setBlogId($comment['blog_id']);

            $blogPosts[] = $temp;
        }

        return $blogPosts;
    }

    public function findByBlogId($blogId) {
        $comments = $this->PDO->prepare('SELECT * FROM comments WHERE blog_id = :blog_id');
        $comments->bindParam(':blog_id', $blogId);
        $comments->execute();
        $arr = $comments->fetchAll(PDO::FETCH_ASSOC);

        return $this->makeCommentsFromArray($arr);
    }

    public function find($id): object
    {
        // TODO: Implement find() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function save($entity)
    {
        $this->addToQuery(['INSERT INTO comments (comment_text, blog_id)
            VALUE (:comment_text, :blog_id)',
            $entity->getEntityInfo(), self::CREATE]);
    }
}
