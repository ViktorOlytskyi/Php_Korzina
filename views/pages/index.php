<h4>Виберіть товар</h4>
<p>
    <?php $cartLabel = "<b>Корзина</b> (". count($_SESSION['cart']['products']). ' товарів'?>
    <!-- додаю ?action=cart щоб вказати скріпту які дії необхідно виконати -->
    <a href="/index.php?action=cart">
        <?= $cartLabel ?>
    </a>
</p>
<?php if (isset($products) && is_array($products) && count($products) > 0 ): ?>
    <ul>
        <!--  а тут просто перебираю список товарів, звісно його потрібно "причесати" -->
        <?php foreach($products as $id => $product): ?>
            <li>
                <?= $product['name'], '; Ціна: <b>', $product['price'], "</b> usd." ?>
                <a href="/index.php?action=cart-add&id=<?= $id ?>">
                    Додати в коризну
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php else: ?>
    <p>Вибачте, не знайдено жодного продукта</p>
<?php endif ?>