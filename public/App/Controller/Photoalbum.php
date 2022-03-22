<?php

namespace App\Controller;

use App\Assets\Photoalbum\PhotoalbumView;
use App\Services\PhotoalbumService;

class Photoalbum
{
    public function photoalbum() {
        $model = new PhotoalbumService();

        $view = new PhotoalbumView('Photoalbum/Photoalbum.php', $model->getPhotoLinks());

        return $view;
    }
}
