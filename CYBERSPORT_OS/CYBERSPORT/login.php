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
        <h2 id="reg">Вход</h2>
        <form action="login.php" method="post" id="registration-form">
            <div class="form-group">
                <p for="name" id="reg_p">Никнейм на сайте:</p>
                <label for="name"></label><input type="text" placeholder="" name="name" id="name" required>
            </div>
            <div class="form-group">
                <p for="password" id="reg_p">Пароль:</p>
                <label for="password"></label><input type="password" placeholder="" name="password" id="password"
                                                     required>
            </div>

            <button type="submit">Войти</button>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['name'];
            $userpassword = $_POST['password'];
            $db = new DB();
            if($db -> fromUser($username,$userpassword)) {
                echo("Добро пожаловать!");
            }
            else {
                echo "error";
            }
        }
        ?>
    </div>

</main>

</body>
<?php
include 'header,footer/footer.php';
?>
</html>
