<?php

namespace App\Controller;

use App\Services\PhotoalbumService;

class Photoalbum
{
    public function photoalbum() {
        $view = new \App\Assets\Photoalbum\photoalbum();

        $model = new PhotoalbumService();
        $view->setView($model->getPhotoLinks());

        return $view;
    }
}
