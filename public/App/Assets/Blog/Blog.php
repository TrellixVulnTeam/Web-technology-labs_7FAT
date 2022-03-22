<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab1_kaydash</title>
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="../assets/css/resumetable.css">
    <link rel="stylesheet" href="../assets/blog/css/blog.css">
</head>
<body>
<header class="menu">
    <ul class="menu-puncts">
        <li><a href="#">Резюме</a></li>
        <li><a href="../hobby/hobby.html">Мои интересы</a></li>
        <li><a href="../about-me/about.html">Обо мне</a></li>
        <li><a href="../studies/studies.html">Учёба</a></li>
        <li><a href="../test">Тест по дисциплине</a></li>
        <li><a href="../contact">Контакты</a></li>
        <li><a href="../photoalbum">Фотоальбом</a></li>
        <li><a href="../guestbook">Гостевая</a></li>
        <li><a href="../upload">Загрузка</a></li>
        <li><a href="../edit">Редактор</a></li>
        <li><a href="../blog">Блог</a></li>
    </ul>
</header>
<div class="blog">
    <?php
        foreach ($data['posts'] as $post) {
            echo '<div class="post">';
            echo '<div class="head">';
            echo '<span class="time">'.$post->getDate().'</span>';
            echo '<span class="theme">'.$post->getTheme().'</span>';
            echo '</div>';
            if ($post->getImage() !== null) {
                echo '<img src="/assets/blog/res/'.$post->getImage().'"/>';
            }
            echo '<span class="main-text">'.$post->getText().'</span>';
            echo '</div>';

        }
    ?>
    <?php
    echo '<div class="btn-block">';
    $previousPage = $data['currentPage'] - 3;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . 1 . '">' . 1 . '</a>';
        if ($previousPage > 1) {
            echo '<span> ... </span>';
        }
    }

    $previousPage += 1;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . $previousPage . '">' . $previousPage . '</a>';
    }

    $previousPage += 1;

    if ($previousPage > 0) {
        echo '<a class="btn" href="' . $previousPage . '">' . $previousPage . '</a>';
    }

    echo '<a class="current-page" href="' . $data['currentPage'] .'">' . $data['currentPage'] . '</a>';

    $nextPage = $data['currentPage'] + 1;

    if ($nextPage <= $data['maxPage']) {
        echo '<a class="btn" href="' . $nextPage . '">' . $nextPage . '</a>';
    }

    $nextPage += 1;

    if ($nextPage <= $data['maxPage']) {
        echo '<a class="btn" href="' . $nextPage . '">' . $nextPage . '</a>';
    }

    $nextPage += 1;

    if ($nextPage < $data['maxPage']) {
        echo ' ... ';

    }

    if ($data['currentPage'] !== $data['maxPage'] && $nextPage < $data['maxPage'] + 1) {
        echo '<a class="btn" href="' . $data['maxPage'] . '">' . $data['maxPage'] . '</a>';
    }

    echo '</div>';
    ?>
</div>
</body>
