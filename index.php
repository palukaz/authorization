<?php
require_once(__DIR__.'/helpers.php');
checkGuest();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <p>Вход</p>
<form action="actions/login.php" method="post">
    <label>Введите почту:</label>
    <input class="input text_input" name="email" type="text" placeholder="somemail@mail.ru" value=<?php echo getOldValue('email')?>>
    <?php if (hasError('email')): ?>
        <small><?php echo getError('email');?></small>
    <?php endif;?>
    <br><label>Введите пароль:</label>
    <input class="input text_input" name="pass" type="password" placeholder="**********">
    <?php if (hasError('pass')): ?>
        <small><?php echo getError('pass');?></small>
    <?php endif;?>
    <!--<br><input class="checkbox" type="checkbox" name="remember"> Запомнить меня</input>-->
    <button id="submit" type="submit" class="input button">Войти</button>
</form>
    <?php clearValidation(); ?>
    <hr>
    <label> У меня нет <a href="registration.php">аккаунта</a></label>
</div>
</body>
</html>