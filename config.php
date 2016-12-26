<?php
$siteName = "FastJob";

$dataBase = [
    'host' => 'localhost',
    'db' => 'test_job',
    'user' => 'root',
    'pass' => '',
    'driver' => 'mysql',
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
];
/*
1 - показать только автор.
2 - показать только гостям
*/
$url = [
    'main' => ['url' => '?module=main', 'name' => 'Главная'],
    'send_ad' => ['url' => '?module=send_ad', 'name' => 'Подать объявление', 'auth' => 1],
    'profile' => ['url' => '?module=profile', 'name' => 'Профиль', 'auth' => 1],
    'register' => ['url' => '?module=register', 'name' => 'Регистрация', 'auth' => 2]

];

try {
    $DBH = new PDO($dataBase['driver'] . ':host=' . $dataBase['host'] . ';dbname=' . $dataBase['db'], $dataBase['user'] . ';charset=utf8', $dataBase['pass'], $dataBase['options']);
} catch (PDOException $e) {
    echo "Хьюстон, у нас проблемы: " . $e->getMessage();
}

// http://codepen.io/Stanssongs/pen/pJxAG