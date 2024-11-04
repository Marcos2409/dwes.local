<?php
return [
    'database' => [
        'name' => 'cursophp',
        'username' => 'usercurso',
        'password' => 'php',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ],
    'mailer' => [
        'smtp_server' => 'smtp.mail.yahoo.com',
        'smtp_port' => '587',
        'smtp_security' => 'tls',
        'username' => 'm.cires03@yahoo.com',
        'password' => '665544332211-Ab',
        'email' => 'm.cires03@yahoo.com',
        'nombre' => 'info'
    ],
    'logs' => [
        'filename' => 'curso.log',
        'level' => \Monolog\Logger::WARNING
    ],
    'routes' => [
        'filename' => 'routes.php'
    ]

];
