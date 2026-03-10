<?php
/**
 * @var $DB
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$tournaments = $DB->selectAll('tournaments');

// Получить ID игры из URL
$tournament = "Название турнира";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Киберспорт РХТУ</title>
    <meta name="description" content="Киберспорт РХТУ: Регистрация">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/tournaments.css">
    <link href="img/monitor.png" rel="shortcut icon" sizes="512x512">

</head>

<body>
<?php
include 'header,footer/header.php';
?>
<main>
    <div class="container">
        <div class="tournaments-ul" id="tournaments">
            <h2>ТУРНИРЫ</h2>
            <div class="sort-buttons-container">
                <h3>Сортировка:</h3>
                <div class="sort-mr">
                <form method="post" action="tournaments.php">
                    <button type="submit" name="sort" value="asc">Дата ↑</button>
                    <button type="submit" name="sort" value="desc">Дата ↓</button>
                    <?php
                    if (isset($_POST['sort'])) {
                        if ($_POST['sort'] == 'asc') {
                            usort($tournaments, array($DB, 'compare_dates'));
                        } elseif ($_POST['sort'] == 'desc') {
                            usort($tournaments, array($DB, 'compare_dates_desc'));
                        }
                    }
                    ?>
                </form>
                </div>
            </div>

        </div>

        <div class="block-tournaments">
            <?php foreach ($tournaments as $tournament) {
                if ($tournament['registr_date'] != 'Скоро появится...') {?>
                <li>
                    <div class="tournament">
                        <a href="<?php echo $tournament['url'] ?>" class="tournament-image">
                            <img src="<?php echo $tournament['image'] ?>"
                                 alt="<?php echo $tournament['game_name'] ?>">
                        </a>
                        <div class="tournament-name"><a href="#"><?php echo $tournament['name'] ?></a></div>
                        <div class="tournament-box row">
                            <div class="col-auto">
                                <a href="">
                                    <img src="<?php echo $tournament['image_game'] ?>" class="" style=""
                                         height="30" alt="">
                                </a>
                            </div>
                            <div class="col">
                                <div class="tournament-date"><?php echo $tournament['date'] ?></div>
                            </div>
                        </div>

                        <ul class="tournament-list">
                            <li><strong><?php echo $tournament['organizator'] ?></strong></li>
                            <li><strong><?php echo $tournament['size_prize'] ?></strong> <strong
                                        class="white"><?php echo $tournament['prize'] ?></strong></li>
                            <li><strong><?php echo $tournament['registr'] ?></strong> <strong
                                        class="white"><?php echo $tournament['registr_date'] ?></strong></li>
                        </ul>
                    </div>
                </li>
            <?php }
            }?>
        </div>

        <div class="tournaments-ul" id="block-registy">
            <h2>Зарегистрировать свой турнир</h2>
            <h3>Выберите игру:</h3>

            <ul class="tournament-nav" id="game-list">
                <li class="game" data-game="Dota 2"><a href="#">
                        <img src="/img(game)/Dota-2.svg" title="Dota 2" height="30" alt="Dota 2"></a></li>
                <li class="game" data-game="Valorant"><a href="#">
                        <img src="/img(game)/Valorant_logo.png" title="VALORANT" alt="VALORANT"></a></li>
                <li class="game" data-game="League of Legends"><a href="#">
                        <img src="/img(game)/LoL.svg" title="League of Legends" height="30" alt="League of Legends"></a></li>
                <li class="game" data-game="Teamfight Tactics"><a href="#">
                        <img src="/img(game)/TFT.svg" title="Teamfight Tactics" height="30" alt="Teamfight Tactics"></a></li>
                <li class="game" data-game="StarCraft II"><a href="#">
                        <img src="/img(game)/SC2.svg" title="StarCraft II" height="30" alt="StarCraft II"></a></li>
                <li class="game" data-game="Hearthstone Battlegrounds"><a href="#">
                        <img src="/img(game)/HSBG.svg" title="Hearthstone Battlegrounds" height="30" alt="Hearthstone Battlegrounds"></a></li>
            </ul>

            <div class="block-registry">
            <form action="tournaments.php" method="post" id="tournament_submit">
                <input type="hidden" name="name" id="game-title" >
                <input type="text" name="info" placeholder="Дополнительная информация">
                <input type="date" name="date" id="date" placeholder="" >
                <div class="button-flex">
                    <p class="submit-btn">
                        <button type="submit" name="submit">Отправить</button>
                    </p>
                    <p class="submit-btn">
                        <button type="submit" name="cancel">Отозвать</button>
                    </p>
                </div>

            </form>
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['name'], $_POST['date'], $_POST['info'])) {
                     $DB->post($_POST['name'], $_POST['date'], $_POST['info']);
                }
            }
            if (isset($_POST['cancel'])) {
                $DB->delete();
            }
            ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gameList = document.getElementById('game-list');
            const gameTitleInput = document.getElementById('game-title');

            gameList.addEventListener('click', function(event) {
                const target = event.target.closest('.game');
                if (target) {
                    event.preventDefault(); // Останавливаем действие ссылки

                    // Снять выделение со всех игр
                    const games = document.querySelectorAll('.game');
                    games.forEach(game => game.classList.remove('selected'));

                    // Выделить выбранную игру
                    target.classList.add('selected');

                    // Записать название выбранной игры в скрытое поле формы
                    const gameName = target.getAttribute('data-game');
                    gameTitleInput.value = gameName;
                }
            });
        });
    </script>

</main>
</body>
<?php
include 'header,footer/footer.php';
?>
</html>