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
        "url" => "/cart",
        "name" => "cart",
        "controller" => Controllers\Index::class,
        "method" => 'cart'
    ],
    [
        "url" => "/product",
        "name" => "product",
        "controller" => Controllers\Index::class,
        "method" => 'product'
    ],
    [
        "url" => "/product-single",
        "name" => "productSingle",
        "controller" => Controllers\Index::class,
        "method" => 'productSingle'
    ],
    [
        "url" => "/forgot-password",
        "name" => "forgotPwd",
        "controller" => Controllers\Index::class,
        "method" => 'forgotPwd'
    ],
    [
        "url" => "/profile",
        "name" => "forgotPwd",
        "controller" => Controllers\Index::class,
        "method" => 'forgotPwd'
    ],
    [
        "url" => "/order",
        "name" => "order",
        "controller" => Controllers\Index::class,
        "method" => 'order'
    ],
    [
        "url" => "/blog",
        "name" => "blog",
        "controller" => Controllers\Index::class,
        "method" => 'blog'
    ],
    [
        "url" => "/blog-single",
        "name" => "singleBlog",
        "controller" => Controllers\Index::class,
        "method" => 'singleBlog'
    ],
    [
        "url" => "/contact",
        "name" => "contact",
        "controller" => Controllers\Index::class,
        "method" => 'contact'
    ],
    [
        "url" => "/about",
        "name" => "about",
        "controller" => Controllers\Index::class,
        "method" => 'about'
    ],
];
