<?php

namespace App\Kernel\Core\Database;

use Exception;
use PDO;
use PDOException;

class Database
{
    public function connect(string $connection = '')
    {
        $config = $this->getConnection($connection);
        $driver = $config['driver'];
        $host = $config['host'];
        $port = $config['port'];
        $dbname = $config['dbname'];
        $charset = $config['charset'];
        $username = $config['username'];
        $password = $config['password'];
        $dsn = "$driver:host=$host;port=$port;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            return new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function getConnection(string $connection)
    {
        try {
            if (empty($connection)) {
                $connection = env("DB_CONNECTION");
            }
            $config = require base_path('config/database.php');
            if (!array_key_exists($connection, $config['connections'])) {
                throw new Exception("Undefined connection '$connection'");
            }
            return $config['connections'][$connection];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}