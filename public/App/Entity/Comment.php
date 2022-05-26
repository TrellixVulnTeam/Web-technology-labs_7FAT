<?php

namespace App\Entity;

use Core\Entity;

class Comment extends Entity
{
    private ?int $id;
    private ?string $commentText;
    private ?int $blogId;

    public function __construct()
    {
        parent::__construct('comments', [
            'id', 'comment_text', 'blog_id'
        ]);

        $this->id = null;
        $this->commentText = null;
        $this->blogId = null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCommentText(): ?string
    {
        return $this->commentText;
    }

    /**
     * @param string|null $commentText
     */
    public function setCommentText(?string $commentText): void
    {
        $this->commentText = $commentText;
    }

    /**
     * @return int|null
     */
    public function getBlogId(): ?int
    {
        return $this->blogId;
    }

    /**
     * @param int|null $blogId
     */
    public function setBlogId(?int $blogId): void
    {
        $this->blogId = $blogId;
    }

    public function getEntityInfo()
    {
        return [
            'table_name' => 'comments',
            'rowsFull' => [
                'id' => $this->id,
                'comment_text' => $this->commentText,
                'blog_id' => $this->blogId
            ]
        ];
    }

}
