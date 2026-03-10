<?php

/**
 * @var $DB
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Киберспорт РХТУ</title>
    <meta name="description" content="Киберспорт РХТУ: Регистрация">
    <link rel="stylesheet" href="css/main.css">
    <link href="img/monitor.png" rel="shortcut icon" sizes="512x512">
</head>
<body class="connection">

<?php
include 'header,footer/header.php';
?>

<main>
    <div class="container2" id="form">
        <h2 id="reg">Регистрация</h2>
        <form action="connection.php" method="post" id="registration-form">
            <div class="form-group">
                <p for="name" id="reg_p">Никнейм на сайте:</p>
                <label for="name"></label><input type="text" placeholder="" name="name" id="name" required>
            </div>
            <div class="form-group">
                <p for="password" id="reg_p">Пароль:</p>
                <label for="password"></label><input type="password" placeholder="" name="password" id="password" required>
            </div>
            <div class="form-group">
                <p for="confirm-password" id="reg_p">Повтор пароля:</p>
                <label for="confirm-password"></label><input type="password" placeholder="" name="confirm-password" id="confirm-password" required>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" required>
                    <i></i>
                    <span>Я принимаю правила <a href="#" class="read"
                                                target="#">пользовательского соглашения</a> и условия <a
                                target="#" class="read"
                                href="#">политики обработки и хранения персональных данных</a></span>
                </label>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <?php
        if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
            if($_POST['password'] != $_POST['confirm-password']) {
                echo "Пароли не совпадают";
            }
            else {
                ($DB->insertUser($_POST['name'], $_POST['password']));
                echo "Успешная регистрация";
                }
        } ?>

    </div>
    <!-- Всплывающее окно с сообщением -->
    <div class="modal" id="success-modal">
        <div class="modal-content">
            <h3>Спасибо за регистрацию!</h3>
            <a href="#" class="close">&times;</a>
        </div>
    </div>
</main>
<script>
    // JavaScript для закрытия модального окна при клике за его пределами
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('success-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
</body>
<?php
include 'header,footer/footer.php';
?>
</html>
