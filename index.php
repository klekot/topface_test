<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ТопФейс — тестовое задание</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    </head>
    <body>
        <header>
            <h1>ТопФейс — тестовое задание</h1>
        </header>
        <section class="centered-wrapper">
            <div class="centered-content">
                <?php require 'router.php'; ?>
            </div>
            <div class="push"></div>
        </section>
        <footer>
            <p class="copyright">Игорь Клекотнев &copy 2017</p>
        </footer>
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script type="text/javascript" href="js/main.js"></script>
    </body>
</html>
