<form method="post">
    <label>
        <span>login: </span>
        <input type="text" name="login">
    </label>
    <label>
        <span>password: </span>
        <input type="password" name="password">
    </label>
    <input type="submit" name="submit">
    <?php
        if (!is_null($data)) {
            foreach ($data['error'] as $error) echo '<span>'.$error.'</span>';
        }
    ?>
</form>
