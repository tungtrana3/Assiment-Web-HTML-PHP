<?php

return [
    [
        "url" => "/",
        "name" => "index",
        'controller' => \Controllers\Index::class,
        'method' => 'index'
    ],
    [
        "url" => "/home",
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
        "url" => "/api/login",
        "name" => "apiLogin",
        "controller" => Controllers\UserController::class,
        "method" => 'apiLogin'
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
    [
        "url" => "/api/deleteUser",
        "name" => "deleteUser",
        "controller" => Controllers\UserController::class,
        "method" => 'deleteUser'
    ],
    // Category Type
    [
        "url" => "/category",
        "name" => "show",
        "controller" => Controllers\CategoryController::class,
        "method" => 'show'
    ],
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
    [
        "url" => "/api/category/delete",
        "name" => "delete",
        "controller" => Controllers\CategoryController::class,
        "method" => 'delete'
    ],
    // Product
    [
        "url" => "/product",
        "name" => "show",
        "controller" => Controllers\ProductController::class,
        "method" => 'show'
    ],
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
        "url" => "/api/product/get-by-id",
        "name" => "getById",
        "controller" => Controllers\ProductController::class,
        "method" => 'getById'
    ],
    [
        "url" => "/api/product/update",
        "name" => "updateProduct",
        "controller" => Controllers\ProductController::class,
        "method" => 'updateProduct'
    ],
    [
        "url" => "/api/product/delete",
        "name" => "delete",
        "controller" => Controllers\ProductController::class,
        "method" => 'delete'
    ],
    [
        "url" => "/api/upload",
        "name" => "upload",
        "controller" => Controllers\UploadController::class,
        "method" => 'upload'
    ],
    [
        "url" => "/order",
        "name" => "show",
        "controller" => Controllers\OrderController::class,
        "method" => 'show'
    ],
    [
        "url" => "/order-finished",
        "name" => "showFinised",
        "controller" => Controllers\OrderController::class,
        "method" => 'showFinised'
    ],
    [
        "url" => "/order-canceled",
        "name" => "showCanceled",
        "controller" => Controllers\OrderController::class,
        "method" => 'showCanceled'
    ],
    
    [
        "url" => "/api/order",
        "name" => "getOrder",
        "controller" => Controllers\OrderController::class,
        "method" => 'getOrder'
    ],
    [
        "url" => "/api/order/add",
        "name" => "add",
        "controller" => Controllers\OrderController::class,
        "method" => 'add'
    ],
    [
        "url" => "/api/order/update",
        "name" => "update",
        "controller" => Controllers\OrderController::class,
        "method" => 'update'
    ],
    [
        "url" => "/api/order/delete",
        "name" => "delete",
        "controller" => Controllers\OrderController::class,
        "method" => 'delete'
    ],

    [
        "url" => "/cart",
        "name" => "show",
        "controller" => Controllers\CartController::class,
        "method" => 'show'
    ],
    [
        "url" => "/api/cart/getAll",
        "name" => "getCart",
        "controller" => Controllers\CartController::class,
        "method" => 'getCart'
    ],
    [
        "url" => "/api/product/getname",
        "name" => "getProductName",
        "controller" => Controllers\CartController::class,
        "method" => 'getProductName'
    ],
    [
        "url" => "api/cart/add-to-cart",
        "name" => "addToCart",
        "controller" => Controllers\CartController::class,
        "method" => 'addToCart'
    ],
    [
        "url" => "/cart/update-to-cart",
        "name" => "updateCart",
        "controller" => Controllers\CartController::class,
        "method" => 'updateCart'
    ],
    [
        "url" => "/cart/remove-to-cart",
        "name" => "removeFromCart",
        "controller" => Controllers\CartController::class,
        "method" => 'removeFromCart'
    ],
];
