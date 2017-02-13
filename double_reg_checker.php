<?php
require_once 'settings.php';
require_once 'db_connect.php';

/**
 * Класс предоставляет возможность запрета на повторную регистрацию с определённого IP-адреса
 * в течение времени, заданного константой "FORBIDDEN_PERIOD" в файле "settings.php".
 */

class DoubleRegChecker
{
    public $ip_address;

    public function __construct($client_ip)
    {
        $this->ip_address = $client_ip;
    }

    /**
     * Метод позволяет определить возможность регистрации с заданного IP-адреса.
     * Учитывается фактор наличия или отсутствия данного адреса в БД,
     * а также времени, в течение которого регистрация с заданного IP-адреса запрещена.
     *
     * @return boolean
     */
    public function isAvailable()
    {
        $conn = new dbConnect();
        $reg_time = $conn->findRegTime($this->ip_address);
        unset($conn);
        if ($reg_time != 0) {
            if (time() - $reg_time > FORBIDDEN_PERIOD) {
                $conn = new dbConnect();
                /* Обновляем время регистрации с IP-адреса клиента в БД */
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

    /**
     * Метод позволяет определить время, оставшееся до истечения срока запрета
     * на регистрацию с определённого IP-адреса.
     *
     * @return integer
     */
    public function timeRemains()
    {
        $conn = new dbConnect();
        $reg_time = $conn->findRegTime($this->ip_address);
        unset($conn);
        $remains = FORBIDDEN_PERIOD - (time() - $reg_time);
        return $remains;
    }
}
