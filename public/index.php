<?php

ini_set('memory_limit', '10240M');

//if (function_exists('xdebug_disable')) { xdebug_disable(); }

error_reporting(0);
//error_reporting(E_ALL ^ E_NOTICE);
require './../vendor/autoload.php';

use Core\Router;

Router::route('/', \App\Controller\IndexController::class, 'getIndexView');
Router::route('/photoalbum', \App\Controller\Photoalbum::class, 'photoalbum');
Router::route('/contact', \App\Controller\Contact::class, 'contact');
Router::route('/test', \App\Controller\Test::class, 'test');
Router::route('/guestbook', \App\Controller\Guestbook::class, 'guestbook');
Router::route('/upload', \App\Controller\Guestbook::class, 'upload');
Router::redirect('/blog', '/blog/1');
Router::route('/blog', \App\Controller\Blog::class, 'blog');
Router::route('/edit', \App\Controller\Blog::class, 'editBlog');
Router::route('/admin', \App\Controller\Admin::class, 'admin');
Router::route('/signin', \App\Controller\Admin::class, 'signIn');
Router::route('/signup', \App\Controller\Admin::class, 'signUp');
Router::route('/unauthorize', \App\Controller\Admin::class, 'unauthorize');
Router::route('/userexists', \App\Controller\Admin::class, 'userExists');
Router::route('/postcomment', \App\Controller\Blog::class, 'addComment');
Router::route('/getcomments', \App\Controller\Blog::class, 'getComments');
Router::route('/blogupdate', \App\Controller\Blog::class, 'updateBlog');

Router::applicationMountPoint();
