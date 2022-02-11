<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!-- значення змінної $action підставляється в шлях -->
        <!-- це шлях до файла в якому знах. html-код сторінки яку відображаємо -->
        <!-- і ми цей файл підключаємо -->
        <?php require_once __DIR__.'/pages/'.$action.'.php' ?>
    </body>
</html>