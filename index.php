<?php

require_once __DIR__.'/bootstrap.php';

// перший раз при старті в нас немає жодного екшена,
// спрацює логіка за замовчуванням 
$action = DEFAULT_ACTION;

// детектимо екшн, який приходить в гет параметрах
if (isset($_GET['action'])) {
    
    // забираємо пробіли зліва і зправа
    $action = trim($_GET['action']);

    // виконуємо дії, в залежності від того, що хоче зробити користувач
    switch ($action) {
        
        ## ACTION: cart-add 
        ## додати товар в коризну
        case 'cart-add':

            // ловимо айдішку цього товару з гет-параметрів
            $productId = (int)$_GET['id'];

            // $ids - список ключів, які в свою чергу є айдішками товарів
            // див структуру корзини
            $ids = array_keys($_SESSION['cart']['products']);
            
            if (in_array($productId, $ids)) { // є товар з таким id в коризині?
                // тоді просто збільшуємо кількість одиниць цього товару
                $_SESSION['cart']['products'][$productId]++;
            } else {
                // поміщаємо товар в коризину (в нашому випадку айдішку цього товару)
                $_SESSION['cart']['products'][$productId] = 1;
            }

            // кажемо файлу views/master.php щоб включив файл pages/cart.php
            // в файлi pages/cart.php - міститься логіка по відображенню товарів корзини
            $action = 'cart';
            
            echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";
            break;

        ## ACTION: cart
        ## переглянути вміст корзини
        case 'cart':
            $action = 'cart';
            break;

        ## ACTION: recalculate
        ## перерахувати кількість товарів в коризні
        case 'recalculate':

            $_SESSION['cart']['products'] = array_combine( // обєднати два масива
                array_values($_POST['p']['id']),    // в якості ключів беремо айдішки товарів
                array_values($_POST['p']['qty']),   // в якості значень беремо к-сть цих товарів
            );
            
            // P.S. іншу інф. про товар можна дістати із масиву $products, вказавши айді цього товару 
            //      в подальшому товари будуть зберігатися в базі даних, і доступ до них можна здійснити через унікальний id
            
            // echo "<pre>";
            // var_dump($_POST);
            // print_r($_POST);
            // print_r($_SESSION['cart']['products']);
            // exit;
            
            $action = 'cart';

            break;
    }
}

// підключаємо головний шаблон
require_once __DIR__.'/views/master.php';
