<?php
/*
 * Перенаправляем в контейнер общего шаблона содержимое затребованной страницы.
 * По дефолту отдаём страницу для ошибки 404.
 *
 */

switch ($_SERVER['REQUEST_URI']) {
    case '/':
        require 'login.php';
        break;
    case '/welcome':
        require 'welcome.php';
        break;
    case '/login':
        require 'login.php';
        break;
    case '/logout':
        require 'logout.php';
        break;
    case '/signup':
        require 'signup.php';
        break;
    case '/signout':
        require 'signout.php';
        break;
    case '/user_profile':
        require 'user_profile.php';
        break;
    case '/reg_denied':
        require 'reg_denied.php';
        break;
    default:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        require '404.php';
        break;
}
