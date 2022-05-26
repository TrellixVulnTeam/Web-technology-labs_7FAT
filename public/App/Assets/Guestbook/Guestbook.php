<form class="input-form" method="post">
    <label>
        <span>Ваше имя</span>
        <input type="text" name="name">
    </label>
    <label>
        <span>Ваш email</span>
        <input type="text" name="email">
    </label>
    <label>
        <span>Ваш отзыв</span>
        <textarea name="comment"></textarea>
    </label>
    <input type="submit">
</form>
<table class="table">
    <tr>
        <th>Имя</th>
        <th>E-mail</th>
        <th>Комментарий</th>
        <th>Дата</th>
    </tr>
    <?php
    foreach ($data as $info)
        {
            $name = $info['name'];
            $email = $info['email'];
            $comment = $info['comment'];
            $date = $info['date'];

            echo "<tr><td>$name</td><td>$email</td><td>$comment</td><td>$date</td></tr>";
        }
    ?>
    </tbody>
</table>
</body>
