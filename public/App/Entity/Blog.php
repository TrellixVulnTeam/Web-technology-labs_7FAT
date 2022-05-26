<?php

namespace App\Entity;

use Core\Entity;

class Blog extends Entity
{
    private $id;

    private $theme;

    private $text;

    private $image;

    private $date;

    public function __construct()
    {
        parent::__construct('blog', [
            null
        ]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }



    public function getEntityInfo()
    {
        return [
            'table_name' => 'blog',
            'rowsFull' => [
                'id' => $this->id,
                'theme' => $this->theme,
                'message' => $this->text,
                'image' => $this->image,
                'created_at' => $this->date
            ]
        ];
    }
}
