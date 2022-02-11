<?php

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

error_reporting(E_ALL);

session_start();

define('DEFAULT_ACTION', 'index');

/**
 * ініціалізуємо корзину, або іншими словами: створюємо цю корзину 
 * Корзина зберігається в суперглобальному масиві $_SESSION
 * у вигляді багатомірного масива: $_SESSION['cart']['products']
 */
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        'products' => [
            // id => qty – айді товару в якості ключа, к-сть цього товару в змінній qty
        ],
    ];
}

/**
 * зверніть увагу, що файл: products.php
 * повертає список товарів використовуючи конструкцію return array(...)
 * 
 * нижче, я просто присвою результат включення файла з допомогою
 * конструкції require_once ...
 */
$products = require_once __DIR__.'/products.php';

require_once __DIR__.'/functions.php';


echo "<pre>";
var_dump(randomProductAdd());