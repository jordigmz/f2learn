<?php

use Monolog\Logger;

return [
    'database' => [
        'name' => 'f2learn',
        'username' => 'dwes',
        'password' => 'dwes',
        'connection' => 'mysql:host=dwes.local',
        'options' => [
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_PERSISTENT => true
        ]
    ],
    'logs' => [
        'filename' => 'f2learn.log',
        'level' => Logger::INFO
    ],
    'routes' => [
        'filename' => 'routes.php'
    ],
    'project' => [
        'namespace' => 'f2learn'
    ],
    'swiftmail' => [
        'smtp_server' => 'smtp.gmail.com',
        'smtp_port' => '587',
        'smtp_security' => 'tls',
        'username' => 'f2learn.education@gmail.com',
        'password' => 'F2LearnEducation&Courses1',
        'email' => 'f2learn.education@gmail.com',
        'name' => 'F2Learn - Education & Courses'
    ],
    'security' => [
        'roles' => [
            'ROLE_ADMIN' => 3,
            'ROLE_USER' => 2,
            'ROLE_ANONYMOUS' => 1
        ]
    ]
];