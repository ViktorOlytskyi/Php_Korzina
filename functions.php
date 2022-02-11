<?php

function getProducts()
{
    // локальна область видимості функції.
    global $products;

    // $products = [
    //     1 => 'Swearl',
    //     2 => 'Swearl 2',
    // ];

    echo "<pre>";
    print_r($products);
    echo "</pre>";
}


function getProduct($product_id) 
{
    global $products;

    if (array_key_exists($product_id, $products)) {
        return $products[$product_id];
    }
}

function nameToLower(array &$data)
{
    foreach ($data as &$product) {
        $product['name'] = mb_strtolower($product['name']);
    }

    return $data;
}

function addPrefix()
{
    $args = func_get_args();

    $name = array_shift($args);

    foreach($args as $arg) {
        $name .= $arg . '-';
    }

    return $name;
}

function randomProductAdd($maxRecomended = 2)
{
    global $products;

    $recomended =[];

    do {
        $keys = array_keys($products);
        $flipped = array_flip($keys);

        $randId = array_rand($flipped);

        if (!array_key_exists($randId, $_SESSION['cart']['products'])) {
            $recomended[] = $products[$randId];
        }
    } while (count($recomended) < $maxRecomended);

    return $recomended;

}
