<?php
require_once(__DIR__ . '/helpers.php');
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <p>Регистрация</p>
    <form action="actions/register.php" method="post">
        <label>Введите имя:</label>
        <input class="input text_input" name="name" type="text" placeholder="Анатолий"
               value=<?php echo getOldValue('name') ?>>
        <?php if (hasError('name')): ?>
            <small><?php echo getError('name'); ?></small>
        <?php endif; ?>
        <br><label>Введите почту:</label>
        <input class="input text_input" name="email" type="text" placeholder="somemail@mail.ru"
               value=<?php echo getOldValue('email') ?>>
        <?php if (hasError('email')): ?>
            <small><?php echo getError('email'); ?></small>
        <?php endif; ?>
        <br><label>Введите пароль:</label>
        <input class="input text_input" name="pass" type="password" placeholder="**********">
        <?php if (hasError('pass')): ?>
            <small><?php echo getError('pass'); ?></small>
        <?php endif; ?>
        <input class="input text_input confirm" name="pass_confirm" type="password"
               placeholder="Введите пароль повторно">
        <?php if (hasError('pass_confirm')): ?>
            <small><?php echo getError('pass_confirm'); ?></small>
        <?php endif; ?>
        <br><label>Выберите пол: </label>
        <select class="input" name="sex">
            <option selected>Другое</option>
            <option>Мужской</option>
            <option>Женский</option>
        </select>
        <button id="submit" type="submit" class="input button">Создать аккаунт</button>
    </form>
    <?php clearValidation(); ?>
    <hr>
    <label>У меня есть <a href="index.php">аккаунт</a></label>
</div>
</body>
</html>