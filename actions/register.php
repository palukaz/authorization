<?php

require_once(__DIR__.'/../helpers.php');
require_once(__DIR__.'/config.php');


$name = $_POST['name']?? null;
$email = $_POST['email']?? null;
$pass = $_POST['pass']?? null;
$pass_confirm = $_POST['pass_confirm']?? null;
$sex = $_POST['sex']?? null;

if (empty($name)){
    addError('name','Пустое поле');
}
if (empty($email)){
    addError('email','Пустое поле');
}
if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    addError('email','Некорректно введена почта');
}
if (empty($pass)){
    addError('pass','Пустое поле');
}
if (!($pass==$pass_confirm)){
    addError('pass_confirm','Пароли не совпадают');
}
if (!empty($_SESSION['validation'])){
    $_SESSION['values']['name'] = $name;
    $_SESSION['values']['email'] = $email;
    redirect('../registration.php');
}
$user = findUser($email);
if($user){
    $_SESSION['validation']['email'] = 'Такой пользователь существует';
    redirect('../registration.php');
}
$con = getPdo();
$query = 'INSERT INTO `users`(`email`, `name`, `pass`, `sex`) VALUES (:email,:name,:pass,:sex)';
$params = [
    'email'=>$email,
    'name'=>$name,
    'pass'=>password_hash($pass, PASSWORD_DEFAULT),
    'sex'=>$sex
];
$stmt = $con->prepare($query);
try{
    $stmt->execute($params);
}
catch (Exception $e){
    echo $e;
}
$user = findUser($email);
$_SESSION['user']['id'] = $user['id'];
redirect('../menu.php');
