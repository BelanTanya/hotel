<?php

return [
    'host' => 'localhost',
    'dbname' => 'hotel_db',
    'password' => 'root',
    'user' => 'root',
    'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
];