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
    // User
    [
        "url" => "/login",
        "name" => "login",
        "controller" => Controllers\UserController::class,
        "method" => 'login'
    ],
    [
        "url" => "/register",
        "name" => "register",
        "controller" => Controllers\UserController::class,
        "method" => 'register'
    ],
    [
        "url" => "/forgot-password",
        "name" => "forgotPwd",
        "controller" => Controllers\UserController::class,
        "method" => 'forgotPwd'
    ],
    [
        "url" => "/list-account",
        "name" => "show",
        "controller" => Controllers\UserController::class,
        "method" => 'show'
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
    // Product Type
    [
        "url" => "/api/category/getAll",
        "name" => "getCategory",
        "controller" => Controllers\CategoryController::class,
        "method" => 'getCategory'
    ],
    [
        "url" => "/api/category/add",
        "name" => "addCategory",
        "controller" => Controllers\CategoryController::class,
        "method" => 'addCategory'
    ],
    [
        "url" => "/api/category/update",
        "name" => "updateCategory",
        "controller" => Controllers\CategoryController::class,
        "method" => 'updateCategory'
    ],
    // Product
    [
        "url" => "/api/product/add",
        "name" => "addProduct",
        "controller" => Controllers\ProductController::class,
        "method" => 'addProduct'
    ],
    [
        "url" => "/api/product/getAll",
        "name" => "getAll",
        "controller" => Controllers\ProductController::class,
        "method" => 'getProduct'
    ],
    [
        "url" => "/api/product/update",
        "name" => "updateProduct",
        "controller" => Controllers\ProductController::class,
        "method" => 'updateProduct'
    ],
    [
        "url" => "/api/upload",
        "name" => "upload",
        "controller" => Controllers\UploadController::class,
        "method" => 'upload'
    ],
];
