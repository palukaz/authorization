<?php
require_once(__DIR__.'/../helpers.php');
require_once(__DIR__.'/config.php');
if($_SERVER['REQUEST_METHOD']!=='POST') redirect('../menu.php');
$user = currentUser();
$newName = $_POST['user_input_name']??null;
$con = getPdo();
$query = 'UPDATE `users` SET `name` = :name WHERE id=:id';
$params = [
    'name' => $newName,
    'id' => $user['id']
];
$stmt = $con->prepare($query);
$stmt->execute($params);
redirect('../menu.php');