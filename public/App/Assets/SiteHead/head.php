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
        <li><a href="../">Резюме</a></li>
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
        <?php
        $userService = new \App\Services\UserService();
        if ($userService->checkAuthorization()) {
            echo '<li><a href="../admin">Админ</a></li>';
            echo '<li><a href="../unauthorize">Выйти</a></li>';
            echo '<br><span style="color: #FF0000">'.$_SESSION['login'].'</span></br>';
        }
        else {
            echo '<li><a href="../signin">Войти</a></li>';
            echo '<li><a href="../signup">Регистрация</a></li>';
        }
        ?>
    </ul>
</header>
