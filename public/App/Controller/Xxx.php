<?php

namespace App\Controller;

use App\Assets\Index1;
use App\Assets\Test;
use Core\Controller;

class Xxx extends Controller
{


    public function __construct()
    {
        /*parent::__construct();*/
    }

    public function hz()
    {
        //parent::wireUrlWithController('xxx', 'hz');
        $fff = new Test();
        return $fff;
    }
}