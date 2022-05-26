<?php

namespace App\Controller;

use App\Assets\IndexView;
use App\Assets\Test;
use Core\Controller;

class IndexController extends Controller
{


    public function __construct()
    {
        /*parent::__construct();*/
    }

    public function getIndexView()
    {
        //parent::wireUrlWithController('xxx', 'hz');
        $view = new IndexView('Index1.php', null);
        return $view;
    }
}
