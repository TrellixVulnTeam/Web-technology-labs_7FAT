<?php

namespace App\Assets\Photoalbum;

use Core\View;

class photoalbum extends View {
    const firstPart = '
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab4_kaydash</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/resumetable.css">
    <link rel="stylesheet" href="assets/photoalbum/css/photoalbum.css">
    <link rel="stylesheet" href="assets/photoalbum/css/bigphoto.css">
	<script src="https://unpkg.com/vue@next"></script>

</head>
<body>
<header class="menu">
    <ul class="menu-puncts">
        <li><a href="../">Резюме</a></li>
        <li><a href="../hobby/hobby.html">Мои интересы</a></li>
        <li><a href="../about-me/about.html">Обо мне</a></li>
        <li><a href="../studies/studies.html">Учёба</a></li>
        <li><a href="../test/test.html">Тест по дисциплине</a></li>
        <li><a href="../contact/contact.html">Контакты</a></li>
        <li class="active"><a href="#">Фотоальбом</a></li>
    </ul>
</header>
<div class="photos tip">
';
    const secondPart = '
</div>
</script>
</body>
</html>
';

    private $viewPart;

    public function setView($markup) {
        $readyMarkup = '';

        foreach ($markup as $photoname=>$photo) {
            $readyMarkup = $readyMarkup . "<img class=\"tip\" src=\"$photo\" alt=\"$photoname\">";
        }

        $this->viewPart = $readyMarkup;
    }

    public function getView($v = null, $d = null) {
        return photoalbum::firstPart . $this->viewPart . photoalbum::secondPart;
    }

}
