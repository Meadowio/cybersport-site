<?php
session_start();

// Проверка, была ли нажата кнопка "Выйти"
if (isset($_POST['logout'])) {
    // Уничтожение всех данных сессии
    session_destroy();
    // Перенаправление на главную страницу или страницу входа
    header("Location: main.php");
    exit();
}
?>
<header>
    <div class="header">
        <div class="container">
            <div class="header-line">
                <div class="header-logo">

                </div>

                <div class="nav">
                    <a class="nav-item" href="/main.php">ГЛАВНАЯ</a>
                    <a class="nav-item" href="/tournaments.php">ТУРНИРЫ</a>
                    <a class="nav-item" href="#">РЕЙТИНГИ</a>
                    <a class="nav-item" href="#game">ИГРЫ</a>
                    <a class="nav-item" href="#news">НОВОСТИ</a>
                    <a class="nav-item" href="#">ОПЕРАТОРЫ</a>
                    <a class="nav-item" href="#">О ПРОЕКТЕ</a>
                </div>

                <div class="header-right">
                    <a class="button1" href="/login.php" id="nickname">
                        <?php if (!empty($_SESSION['login'])) {
                            echo $_SESSION['login'];
                        } else {
                            echo 'Вход';
                        } ?></a>
                    <?php if (!empty($_SESSION['login'])) {
                        echo
                        '<form method="post" action="">
                        <button type="submit" name="logout" class="button1" id="exit">Выйти</button>
                    </form>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</header>
