<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab4_kaydash</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/resumetable.css">
    <link rel="stylesheet" href="assets/guestbook/guestbook.css">
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
<form method="post" enctype="multipart/form-data">
    <input type="file" name="guestbook">
    <input type="submit">
</form>
</body>
