<?php

namespace App\Database;

use PDO;

class Db
{
    private static $conn;

    public static function connect()
    {
        if (!self::$conn) {
            self::$conn = new PDO(
                'mysql:host=' .
                    DB_HOST .
                    DB_PORT .
                    ';dbname=' .
                    DB_NAME,
                DB_USER,
                DB_PASSWORD
                //,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
            );
        }
        return self::$conn;
    }

    private function __construct()
    {
        //invalidação do construtor
    }
}