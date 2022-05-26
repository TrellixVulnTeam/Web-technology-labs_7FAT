<?php

namespace App\Services;

class PhotoalbumService
{
    private $photoalbum = [
        'aqua' => 'aqua.jpg',
        'aska' => 'aska.jpg',
        'cc' => 'cc.jpg',
        'darkness' => 'darkness.jpg',
        'eva' => 'eva-01.jpg',
        'kazuma' => 'kazuma.jpg',
        'lelouch' => 'lelouch.jpg',
        'megumin' => 'megumin.jpg',
        'misato' => 'misato.jpg',
        'rey' => 'rey.jpg',
        'shirley' => 'shirley.jpg',
        'sindzi' => 'sindzi.jpg',
        'tsuyu' => 'tsuyu.jpg',
        'yunyun' => 'yunyun.jpg',
        'zero-two' => 'zero-two.jpg'
    ];

    public function getPhotoLinks() {
        $albumLinks = [];

        foreach ($this->photoalbum as $photo) {
            $albumLinks[] = 'assets/photoalbum/res/' . $photo;
        }

        return $albumLinks;
    }
}
