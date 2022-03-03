<?php
//error_reporting(E_ALL ^ E_NOTICE);
require './../vendor/autoload.php';

use Core\Router;
use App\Controller\Xxx;

Router::route('/', Xxx::class, 'hz');

Router::route('/photoalbum', \App\Controller\Photoalbum::class, 'photoalbum');

Router::route('/contact', \App\Controller\Contact::class, 'contact');

Router::route('/test', \App\Controller\Test::class, 'test');

Router::applicationMountPoint();
