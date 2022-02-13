<?php

require './../vendor/autoload.php';

/*use Core\Router;
use App\Xxx;


Router::route('/xxx', Xxx::class, 'hz');
Router::route('/xxx2', Xxx::class, 'hz');

Router::applicationMountPoint();*/
use Core\Router;
use App\Controller\Xxx;

//$x = new Xxx();

Router::route('/xxx2', Xxx::class, 'hz');

Router::applicationMountPoint();