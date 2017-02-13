<?php
require_once 'settings.php';

/**
 * Класс для создания экземпляров подключений к базе данных сайта.
 * Содержит набор методов для манипуляции данными, поступающими от пользователя.
 * В классе используются неподготовленные запросы исключительно в целях упрощения реализации.
 * Для защиты от SQL инъекций все данные, поступившие от пользователя проходят фильтрацию
 * приватным методом "filter_string".
 */
class dbConnect
{
    public $mysqli;

    public function __construct()
    {
        /* Подключаемся к базе данных */
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        /* Сообщаем об ошибке соединения с базой данных */
        if ($this->mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }

        /* Задаём кодировку */
        $this->mysqli->set_charset("utf8");
    }

    /**
     * Метод для поиска пользователя в БД.
     *
     * @param строка $email
     * @param строка $password
     * @return массив
     */
    public function findUser($email, $password)
    {
        /* Создаём массив для результатов запроса */
        $res_array = array();

        /* Фильтруем данные, поступившие из input-ов */
        $email      = $this->filter_string($email);
        $password   = $this->filter_string($password);

        /* Формируем SQL запрос к базе */
        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}';";

        /* Если пользователь найден льём его данные в массив для результатов */
        if ($result = $this->mysqli->query($sql)) {
            /* Берём только первый ряд выборки, так как данные в поле "email" нашей БД уникальны */
            $result->data_seek(0);
            $res_array = $result->fetch_assoc();
            $result->close();
        }
        /* Закрываем соединение */
        $this->mysqli->close();

        /* Возвращаем либо массив данных о пользователе, либо пустой массив. */
        return $res_array;
    }

    /**
     * Метод для поиска данных о времени регистрации с данного IP в БД.
     *
     * @param строка $client_ip
     * @return строка
     */
    public function findRegTime($client_ip)
    {
        /* Создаём массив для результата запроса */
        $row = array(0);

        /* Формируем SQL запрос к базе */
        $sql = "SELECT reg_time FROM client_ips WHERE client_ip='{$client_ip}';";

        /* Если адрес найден добавляем его в массив для результатов */
        if ($result = $this->mysqli->query($sql)) {
            /* Берём только первый ряд выборки, так как данные в поле "client_ip" нашей БД уникальны */
            $result->data_seek(0);
            $row = $result->fetch_row();
            $result->close();
        }

        /* Закрываем соединение */
        $this->mysqli->close();

        /* Возвращаем время регистрации с заданного ip. */
        return $row[0];
    }

    /**
     * Метод для сохранения информации о времени регистрации с данного IP в БД.
     *
     * @param строка $client_ip
     * @return null
     */
    public function saveRegIp($client_ip)
    {
        /* Получаем текущее время */
        $current_time = time();

        /* Формируем SQL запрос к базе */
        $sql = "INSERT INTO client_ips(client_ip, reg_time) VALUES ('{$client_ip}', '{$current_time}');";

        /* Выполняем запрос */
        $this->mysqli->query($sql);

        /* Закрываем соединение */
        $this->mysqli->close();
    }

    /**
     * Метод для обновления информации о времени регистрации с данного IP в БД.
     *
     * @param строка $client_ip
     * @return null
     */
    public function updateRegTime($client_ip)
    {
        /* Получаем текущее время */
        $current_time = time();

        /* Формируем SQL запрос к базе */
        $sql = "UPDATE client_ips SET reg_time='{$current_time}' WHERE client_ip='{$client_ip}'";

        /* Выполняем запрос */
        $this->mysqli->query($sql);

        /* Закрываем соединение */
        $this->mysqli->close();
    }

    /**
     * Метод для внесения нового пользователя в БД.
     *
     * @param строка $first_name
     * @param строка $email
     * @param строка $password
     * @param строка $birth_day
     * @param строка $birth_month
     * @param строка $birth_year
     * @param строка $sex
     * @param строка $city
     * @return null
     */
    public function createUser(
                    $first_name,
                    $email,
                    $password,
                    $birth_day,
                    $birth_month,
                    $birth_year,
                    $sex,
                    $city)
    {
        /* Фильтруем данные, поступившие из input-ов */
        $first_name = $this->filter_string($first_name);
        $email      = $this->filter_string($email);
        $password   = $this->filter_string($password);
        $city       = $this->filter_string($city);

        /* Формируем SQL запрос к базе */
        $sql = "INSERT INTO users(
                    first_name,
                    email,
                    password,
                    birth_day,
                    birth_month,
                    birth_year,
                    sex,
                    city
                )
                VALUES (
                    '{$first_name}',
                    '{$email}',
                    '{$password}',
                    '{$birth_day}',
                    '{$birth_month}',
                    '{$birth_year}',
                    '{$sex}',
                    '{$city}'
                );
            ";
        /* Выполняем запрос */
        $this->mysqli->query($sql);

        /* Закрываем соединение */
        $this->mysqli->close();
    }

    /**
     * Метод для удаления пользователя из БД.
     *
     * @param строка $email
     * @return null
     */
    public function destroyUser($email)
    {
        /* Формируем SQL запрос к базе */
        $sql = "DELETE FROM users WHERE email='{$email}'";

        /* Выполняем запрос */
        $this->mysqli->query($sql);

        /* Закрываем соединение */
        $this->mysqli->close();
    }
    /**
     * Метод для фильтрации данных, поступивших из текстовых полей формы для дальнейшего безопасного
     * сохранения в БД через неподготовленные запросы.
     *
     * @param строка $string
     * @return строка
     */
    private function filter_string($string)
    {
        /* Убираем html теги */
        $result = strip_tags($string);
        /* Преобразуем специальные символы в HTML сущности */
        $result = htmlspecialchars($result);
        /* Экранируем спец-символы для безопасного использования в SQL запросах */
        $result = $this->mysqli->real_escape_string($result);
        return $result;
    }
}
