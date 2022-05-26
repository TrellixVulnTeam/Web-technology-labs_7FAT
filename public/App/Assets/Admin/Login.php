<form method="post">
    <label>
        <span>login: </span>
        <input type="text" name="login" id="loginvalue">
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
<button id="check-button">Занято?</button>
<span id="existsanse"></span>
<script>
let button = document.getElementById('check-button');
let spanExist = document.getElementById('existsanse');

let loginInput =  document.getElementById('loginvalue');

async function makeRequest() {
    let req = new XMLHttpRequest();

    req.open('GET', `http://127.0.0.1:80/userexists/${loginInput.value}`, false)
    req.send();

    if (req.status === 200) {
        return (JSON.parse(req.responseText)['exists']);
    }
}

button.addEventListener('click', async (event) => {
    spanExist.innerHTML = await makeRequest();
});
</script>
