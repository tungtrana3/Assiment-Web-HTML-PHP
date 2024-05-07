<?php

return [
    [
        "url" => "/",
        "name" => "index",
        'controller' => \Controllers\Index::class,
        'method' => 'index'
    ],
    [
        "url" => "/welcome",
        "name" => "welcome",
        "controller" => Controllers\Index::class,
        "method" => 'index'
    ],
    [
        "url" => "/api/getUsers",
        "name" => "getUsers",
        "controller" => Controllers\UserController::class,
        "method" => 'getUsers'
    ],
    [
        "url" => "/api/getUserById",
        "name" => "getUsers",
        "controller" => Controllers\UserController::class,
        "method" => 'getUsers'
    ],
    [
        "url" => "/api/addUser",
        "name" => "addUser",
        "controller" => Controllers\UserController::class,
        "method" => 'addUser'
    ],
    [
        "url" => "/api/updateUser",
        "name" => "updateUser",
        "controller" => Controllers\UserController::class,
        "method" => 'updateUser'
    ],
];
