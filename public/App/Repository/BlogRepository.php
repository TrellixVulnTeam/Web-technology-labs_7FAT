<?php

namespace App\Repository;

use App\Entity\Blog;
use Core\SQLRepository;
use PDO;

class BlogRepository extends SQLRepository
{
    private function makeBlogFromArray($arr) {
        $blogPosts = [];

        foreach ($arr as $blog) {
            $temp = new Blog();

            $temp->setId($blog['id']);
            $temp->setDate($blog['created_at']);
            $temp->setTheme($blog['theme']);
            $temp->setText($blog['message']);
            $temp->setImage($blog['image']);

            $blogPosts[] = $temp;
        }

        return $blogPosts;
    }

    public function countPosts()
    {
        return $this->PDO->query('SELECT * FROM blog')->rowCount();
    }

    public function findByLimit($firstPostNumber, $limit) : array
    {
        $posts = $this->PDO->prepare('SELECT * FROM blog LIMIT :first, :limit');

        $posts->bindParam(':first', $firstPostNumber);
        $posts->bindParam(':limit', $limit);

        $posts->execute();

        $arr = $posts->fetchAll(PDO::FETCH_ASSOC);

        return $this->makeBlogFromArray($arr);
    }

    public function findAll(): array
    {
        return [];
    }

    public function find($id): object
    {
        $post = $this->PDO->prepare('SELECT * FROM blog WHERE id = :id');
        $post->bindParam(':id', $id);
        $post->execute();

        $arr = $post->fetchAll(PDO::FETCH_ASSOC);

        return ($this->makeBlogFromArray($arr)[0]);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update($entity) {
        $this->addToQuery(['UPDATE blog SET theme=:theme, message=:message, image=:image, created_at=:created_at
            WHERE id=:id',
            $entity->getEntityInfo(), self::UPDATE]);
    }

    public function save($entity)
    {
        $this->addToQuery(['INSERT INTO blog (theme, message, image, created_at)
            VALUE (:theme, :message, :image, :created_at)',
            $entity->getEntityInfo(), self::CREATE]);
    }
}
