<?php

namespace App\Controller;

use App\Assets\Photoalbum\PhotoalbumView;
use App\Services\PhotoalbumService;
use Core\Controller;

class Photoalbum extends Controller
{
    public function photoalbum() {
        $model = new PhotoalbumService();

        $view = new PhotoalbumView('Photoalbum/Photoalbum.php', $model->getPhotoLinks());

        return $view;
    }
}
