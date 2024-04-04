<?php

session_start();
function redirect(string $path) : void
{
    header("Location: ".$path);
    die();
}
function hasError(string $fieldName) : bool
{
    return isset($_SESSION['validation'][$fieldName]);
}
function getError(string $fieldName) : string
{
    return ($_SESSION['validation'][$fieldName])??'';
}
function addError(string $fieldName,string $message) : void
{
    $_SESSION['validation'][$fieldName] = $message;
}
function getOldValue(string $fieldName) : string
{
    $value = $_SESSION['values'][$fieldName]??'';
    unset($_SESSION['values'][$fieldName]);
    return $value;
}
function clearValidation() : void
{
    $_SESSION['validation'] = [];
}

function getPdo(): PDO
{
    return new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8' . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
}
function findUser(string $email) : array|bool{
    $pdo = getPdo();
    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email`=:email');
    $stmt->execute(['email'=>$email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}
function currentUser() :array|false{
    $pdo = getPdo();
    if (!isset($_SESSION['user'])) return false;

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `id`=:id');
    $stmt->execute(['id'=>$userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}
function logout() : void
{
    if(isset($_COOKIE['auth'])) unset($_COOKIE['auth']);
    unset($_SESSION['user']['id']);
    redirect('../index.php');
}
function checkAuth() : void
{
    if(!isset($_SESSION['user']['id']) && !isset($_COOKIE['auth'])) redirect('index.php');
}
function checkGuest() : void
{
    if(isset($_SESSION['user']['id']) || isset($_COOKIE['auth'])) redirect('menu.php');
}
