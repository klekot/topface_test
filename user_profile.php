<?php
session_start();
require_once 'months.php';
 ?>
<div class="profile">
    <h1>Здравствуйте, <?= $_SESSION['current_user']['first_name'] ?>!</h1>
    <h3>Информация о пользователе:</h3>
    <p>
        Вы родились <?=
        $_SESSION['current_user']['birth_day']." ".
        $months[$_SESSION['current_user']['birth_month']]." ".
        $_SESSION['current_user']['birth_year']." года;";
        ?>
    </p>
    <p>
        Ваш пол <?php
            if($_SESSION['current_user']['sex'] == 1) {
                echo "мужской;";
            } else {
                echo "женский;";
            }
        ?>
    </p>
    <p>
        Ваше место проживания: <?= $_SESSION['current_user']['city']."." ?>
    </p>
    <h3>Данные об аккаунте:</h3>
    <p>
        Ваш логин(e-mail): <?= $_SESSION['current_user']['email'] ?>
    </p>
    <p>
        Ваш пароль: <?= $_SESSION['current_user']['password'] ?>
    </p>
    <br />
    <div class="profile-buttons">
        <form id="logoutForm" class="" method="POST" action="/logout.php">
            <button id="logoutButton" type="submit">Выйти из аккаунта</button>
        </form>
        <form id="signoutForm" class="" method="DELETE" action="/signout.php">
            <button id="signoutButton" type="submit">Удалить свой аккаунт</button>
        </form>
    </div>
</div>
