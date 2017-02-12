<?php
require_once 'settings.php';
require_once 'db_connect.php';

class DoubleRegChecker
{
    public $ip_address;

    public function __construct($client_ip)
    {
        $this->ip_address = $client_ip;
    }

    public function isAvailable()
    {
        $conn = new dbConnect();
        $reg_time = $conn->findRegTime($this->ip_address);
        unset($conn);
        if ($reg_time != 0) {
            if (time() - $reg_time > FORBIDDEN_PERIOD) {
                $conn = new dbConnect();
                // Обновляем время регистрации с ip-адреса клиента в БД
                $conn->updateRegTime($_SERVER['REMOTE_ADDR']);
                unset($conn);
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function timeRemains()
    {
        $conn = new dbConnect();
        $reg_time = $conn->findRegTime($this->ip_address);
        unset($conn);
        $remains = FORBIDDEN_PERIOD - (time() - $reg_time);
        return $remains;
    }
}
