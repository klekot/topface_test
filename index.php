<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>ТопФейс — тестовое задание</title>
    </head>
    <body>
        <header>
            <h1>ТопФейс — тестовое задание</h1>
        </header>
        <div class="container">
            <?php require 'router.php'; ?>
        </div>
        <footer>
            <p>Игорь Клекотнев &copy 2017</p>
        </footer>
    </body>
</html>
