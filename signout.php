<?php
require 'db_connect.php';
session_start();

/* Создаём экземпляр соединения с БД */
$conn = new dbConnect();

/* Удаляем запись о пользователе из БД */
$conn->destroyUser($_SESSION['current_user']['email']);

session_unset();
session_destroy();
header('Location: /');
