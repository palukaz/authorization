<?php
require_once(__DIR__.'/../helpers.php');

require_once(__DIR__.'/config.php');

$email = $_POST['email']?? null;
$pass = $_POST['pass']?? null;
$cookie = $_POST['remember']??null;

if (empty($email)||!filter_var($email,FILTER_VALIDATE_EMAIL)){
    addError('email','Некорректно введена почта');
}
if (empty($pass)){
    addError('pass','Пустое поле');
}

if (!empty($_SESSION['validation'])){
    $_SESSION['values']['email'] = $email;
    redirect('../index.php');
}
$user = findUser($email);
if (findUser($email)){
if(password_verify($pass,$user['pass']))
{
    if ($cookie) $_SESSION['user']['cookie'] = true;
    $_SESSION['user']['id'] = $user['id'];
    redirect('../menu.php');
}
else
{
    $_SESSION['validation']['pass'] = 'Неверный пароль';
    $_SESSION['values']['email'] = $email;
}
}
else $_SESSION['validation']['email'] = 'Такого аккаунта не существует';
redirect('../index.php');

