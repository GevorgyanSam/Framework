<?php

return [
    'connections' => [
        'mysql' => [
            "driver" => env("DB_DRIVER", "mysql"),
            "host" => env("DB_HOST", "localhost"),
            "port" => env("DB_PORT", 3306),
            "charset" => env("DB_CHARSET", "utf8"),
            "dbname" => env("DB_DATABASE"),
            "username" => env("DB_USERNAME"),
            "password" => env("DB_PASSWORD")
        ]
    ]
];
