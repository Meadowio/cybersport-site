<?php
global $DB;
require_once($_SERVER['DOCUMENT_ROOT'] . '/func/func.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$DB->insertUser($_REQUEST['name'], $_REQUEST['phone']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Киберспорт РХТУ </title>
    <meta name="description" content="Киберспорт РХТУ"/>
    <link rel="stylesheet" href="../css/main.css">
    <link href="../img/monitor.png" rel="shortcut icon" sizes="512x512">
</head>
<body id="body_answer">
    <h3 id="text">Спасибо, мы вам обязательно перезвоним!</h3>
</body>
</html>
