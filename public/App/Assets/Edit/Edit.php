<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab1_kaydash</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/resumetable.css">
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
<form method="post" enctype="multipart/form-data">
    <label>
        <span>Тема</span>
        <input type="text" name="theme">
    </label>
    <label>
        <span>Текст</span>
        <textarea name="comment"></textarea>
    </label>
    <label>
        <span>Изображение</span>
        <input type="file" name="postimage">
    </label>
    <input type="submit">
</form>
</body>
