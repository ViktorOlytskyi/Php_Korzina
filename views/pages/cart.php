
<h3>Моя корзина</h3>
<p><a href="/">Продовжити покупки</a></p>

<?php if (isset($_SESSION['cart']['products']) && is_array($_SESSION['cart']['products']) && count($_SESSION['cart']['products']) > 0 ): ?>
    <form action="index.php?action=recalculate" method="post">
        <ul>
            <?php foreach($_SESSION['cart']['products'] as $id => $qty): ?>
                <li>
                    <?= "{$products[$id]['name']} (x{$qty})" ?>&nbsp;
                    <input type="hidden" name="p[id][]" value="<?= $id ?>">
                    <input type="number" name="p[qty][]" value="<?= $qty ?>" size="5" step="1"> шт.
                </li>
            <?php endforeach ?>
        </ul>
        <input type="submit" name="recalcBtn" value="Re calculate">
    </form>
<?php else: ?>
    <p>
        Вибачте, але ваша корзина пуста :(
        <br>
        <a href="/">Продовжити покупи</a>
    </p>
<?php endif ?>