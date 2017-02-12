<?php
require_once 'db_connect.php';
require_once 'double_reg_checker.php';

// Создаём экземпляр соединения с БД
$conn = new dbConnect();

// Ищем в БД запись о пользователе
$current_user = $conn->findUser($_POST['email'], $_POST['password']);
unset($conn);

// Если находим пользователя, переходим в его профиль,
// если нет - значит либо пользователь регистрируется в данный момент,
// либо пытается войти без регистрации.
if ($current_user['email']) {
    session_start();
    $_SESSION['current_user'] = $current_user;
    header('Location: user_profile');
} else {
    // Разбираем поступившие из формы данные
    $first_name  = $_REQUEST['first_name'];
    $email       = $_REQUEST['email'];
    $password    = $_REQUEST['password'];
    $birth_day   = $_REQUEST['birth_day'];
    $birth_month = $_REQUEST['birth_month'];
    $birth_year  = $_REQUEST['birth_year'];
    $sex         = $_REQUEST['sex'];
    $city        = $_REQUEST['city'];

    // Если не все данные заполнены возвращаемся к форме регистрации
    if (
        $first_name  == "" ||
        $email       == "" ||
        $password    == "" ||
        $birth_day   == "" ||
        $birth_month == "" ||
        $birth_year  == "" ||
        $sex         == "" ||
        $city        == ""
    ) {
        header('Location: signup');
    } else {
        // Проверяем можно ли регистрироваться с этого ip-адреса.
        // Выставляем время запрета повторной регистрации 1 час (3600 сек.)
        $checker = new DoubleRegChecker($_SERVER['REMOTE_ADDR']);

        // Если повторная регистрация недопустима сообщаем об этом
        if ($checker->isAvailable()) {
            // Создаём экземпляр соединения с БД
            $conn = new dbConnect();

            // Записываем ip-адрес клиента в БД
            $conn->saveRegIp($_SERVER['REMOTE_ADDR']);
            unset($conn);

            // Создаём экземпляр соединения с БД
            $conn = new dbConnect();

            // Записываем данные пользователя в БД
            $conn->createUser($first_name, $email, $password, $birth_day, $birth_month, $birth_year, $sex, $city);
            unset($conn);

            // Создаём экземпляр соединения с БД
            $conn = new dbConnect();

            // Ищем в БД запись о пользователе
            $new_user = $conn->findUser($_POST['email'], $_POST['password']);
            unset($conn);

            session_start();
            $_SESSION['current_user'] = $new_user;
            header('Location: user_profile');
        } else {
            // Записываем в сессию время до следующей авторизации с данного ip-адреса
            session_start();
            $_SESSION['time_remains'] = $checker->timeRemains();
            header('Location: reg_denied');
        }
    }
}
