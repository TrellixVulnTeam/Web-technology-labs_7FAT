<?php

namespace App\Assets;

use Core\View;

class Test extends View
{

    public function getView($v = null, $d = null)
    {
        $f = include 'Index1.php';
        echo $f;
    }
}
