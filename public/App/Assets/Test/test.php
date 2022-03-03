<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>lab1_kaydash</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/resumetable.css">
    <link rel="stylesheet" href="assets/test/css/test.css">
</head>
<body>
<header class="menu">
    <ul class="menu-puncts">
        <li><a href="../">Резюме</a></li>
        <li><a href="../hobby/hobby.html">Мои интересы</a></li>
        <li><a href="../about-me/about.html">Обо мне</a></li>
        <li><a href="../studies/studies.html">Учёба</a></li>
        <li class="active"><a href="#">Тест по дисциплине</a></li>
        <li><a href="../contact">Контакты</a></li>
        <li><a href="../photoalbum">Фотоальбом</a></li>
    </ul>
</header>
<div class="main">
<form class="test-form" action="#" method="post">
    <label>Ваше имя?</label>
    <input type="text" name="name">
    <label>Ваша группа?</label>
    <select name="group">
        <optgroup label="1-й курс">
            <option>ИС-б-21-1-о</option>
            <option>ИС-б-21-2-о</option>
            <option>ИС-б-21-3-о</option>
            <option>ПИ-б-21-1-о</option>
        </optgroup>
        <optgroup label="2-й курс">
            <option>ИС-б-20-1-о</option>
            <option>ИС-б-20-2-о</option>
            <option>ИС-б-20-3-о</option>
            <option>ПИ-б-20-1-о</option>
        </optgroup>
        <optgroup label="3-й курс">
            <option>ИС-б-19-1-о</option>
            <option>ИС-б-19-2-о</option>
            <option>ИС-б-19-3-о</option>
            <option>ПИ-б-19-1-о</option>
        </optgroup>
        <optgroup label="4-й курс">
            <option>ИС-б-18-1-о</option>
            <option>ИС-б-18-2-о</option>
            <option>ИС-б-18-3-о</option>
            <option>ПИ-б-18-1-о</option>
        </optgroup>
    </select>
     <label>1)Машина едет со скоростью 72 км/ч. Сколько метров проедет машина за 10 секунд?</label>
    <input type="text" name="1_question">
    <label>2)Выберите правильную(-ые) формулировку(-и):</label>
    <div class="quest-2-checkbox">
        <section><input name="correct_1" type="checkbox"><label>Зако́н Архиме́да — один из законов статики жидкостей (гидростатики) и газов (аэростатики): на тело, погружённое в жидкость или газ, действует выталкивающая сила, равная весу объёма жидкости или газа, вытесненного частью формы, в которую погружены жидкость или газ.</label></section>
        <section><input name="correct_2" type="checkbox"><label>Пе́рвое нача́ло термодина́мики (первый закон термодинамики) — один из основных законов этой дисциплины, представляющий собой конкретизацию общефизического закона сохранения энергии для термодинамических систем, в которых необходимо учитывать термические, массообменные и химические процессы</label></section>
        <section><input type="checkbox"><label>Второ́е нача́ло термодина́мики (второй закон термодинамики) устанавливает существование энтропии как функции состояния термодинамической системы и вводит понятие абсолютной термодинамической температуры</label></section>
    </div>
    <label>3)2-й закон Ньютона?</label>
    <select name="3_question">
        <optgroup label="Выберите один из предложенных вариантов">
            <option value="1">F=m*a</option>
            <option value="2">F=m+a</option>
            <option value="3">F=m-a</option>
            <option value="4">F=m/a</option>
        </optgroup>
    </select>
    <button type="reset" name="reset">Очистить ответы</button>
    <button type="submit" name="submit">Отправить ответ</button>
    <?php
        if (array_key_exists('name', $data)) {
            echo '<div class="test-result">';
            echo '<span>'.$data['name'].', ваш результат: </span>';
            $i = 1;
            foreach ($data['answers'] as $answer) {
                echo '<br><span>'.$i.' вопрос: '.$answer.'</span>';
                ++$i;
            }
            echo '</div>';
        }
    ?>
</form>
</div>
<script src="assets/test/js/test.js"></script>
</body>
</html>
