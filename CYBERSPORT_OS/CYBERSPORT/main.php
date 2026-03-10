<?php
/**
 * @var $DB
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');

$news = $DB->selectAll('news');

$DB->deleteFromTournaments('Скоро появится...');
$DB->addToTournaments();
$tournaments = $DB->selectAll('tournaments_new');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Киберспорт РХТУ </title>
    <meta name="description" content="Киберспорт РХТУ: Новости и Турниры">
    <link rel="stylesheet" href="css/main.css">
    <link href="img/monitor.png" rel="shortcut icon" sizes="512x512">
</head>
<body>

<?php
include 'header,footer/header.php';
?>

<main>
    <div id="main">
        <div class="container">
            <div class="video-container">
                <video autoplay loop muted>
                    <source src="video/animated-bloodmoon-diana.webm" type="video/mp4">
                    Ваш браузер не поддерживает HTML5 видео.
                </video>
                <script>
                    var video = document.getElementById('myVideo');
                    video.addEventListener('ended', function () {
                        this.currentTime = 0; // Сброс текущего времени видео на начало
                        this.play(); // Запуск видео заново
                    }, false);
                </script>
            </div>

            <div class="image-main" style="max-width:200px">
                <img src="img/monitor.png" alt="" >
                <div class="button-game">
                    <a class="button2" href="connection.php">Присоединиться</a>
                </div>
            </div>

            <div class="filler"></div>
            <div class="filler filler-grad"></div>
            <div class="container" id="news">
                <h2>НОВОСТИ</h2>
                <div class="container display-f">
                    <div class="block-news">
                        <?php
                        for ($i = 0; $i < 2; $i++) {
                            if (!isset($news[$i])) break;
                            ?>
                            <a href="<?php echo $news[$i]['url'] ?>" class="news-link">
                                <img src="<?php echo $news[$i]['image'] ?>" alt="Новость <?php echo $i + 1; ?>">
                                <div class="background-block"></div>
                                <span class="news-text"><?php echo $news[$i]['news-text'] ?></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="block-news">
                        <?php
                        for ($i = 2; $i < 4; $i++) {
                            if (!isset($news[$i])) break;
                            ?>
                            <a href="<?php echo $news[$i]['url'] ?>" class="news-link">
                                <img src="<?php echo $news[$i]['image'] ?>" alt="Новость <?php echo $i + 1; ?>">
                                <div class="background-block"></div>
                                <span class="news-text"><?php echo $news[$i]['news-text'] ?></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="block-news">
                        <?php
                        for ($i = 4; $i < 5; $i++) {
                            if (!isset($news[$i])) break;
                            ?>
                            <a href="<?php echo $news[$i]['url'] ?>" class="news-link">
                                <img src="<?php echo $news[$i]['image'] ?>" alt="Новость <?php echo $i + 1; ?>">
                                <span class="news-text"><?php echo $news[$i]['news-text'] ?></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>


            </div>
            <div class="container">
                <div class="tournaments-ul" id="tournaments">
                    <h2>ТУРНИРЫ (скоро появятся)</h2>
                    <ul class="tournament-nav" id="game">
                        <li class="game"><a href="#"><img src="/img(game)/Dota-2.svg" title="Dota 2" height="30" alt=""></a>
                        </li>
                        <li class="game"><a href="#"><img src="/img(game)/Valorant_logo.png" title="VALORANT"
                                                          alt=""></a></li>
                        <li class="game"><a href="#"><img src="/img(game)/LoL.svg" title="League of Legends"
                                                          height="30" alt=""></a></li>
                        <li class="game"><a href="#"><img src="/img(game)/TFT.svg" title="Teamfight Tactics"
                                                          height="30" alt=""></a></li>
                        <li class="game"><a href="#"><img src="/img(game)/SC2.svg" title="StarCraft II" height="30"
                                                          alt=""></a>
                        </li>
                        <li class="game"><a href="#"><img src="/img(game)/HSBG.svg" title="Hearthstone Battlegrounds"
                                                          height="30" alt=""></a></li>
                    </ul>
                </div>

                <div class="block-tournaments">
                    <?php foreach ($tournaments as $tournament) { ?>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
<?php
include 'header,footer/footer.php';
?>
</html>