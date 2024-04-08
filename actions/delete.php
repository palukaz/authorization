<?php
require_once(__DIR__.'/../helpers.php');
require_once(__DIR__.'/config.php');
if($_SERVER['REQUEST_METHOD']!=='POST') redirect('../menu.php');
$user = currentUser();
$con = getPdo();
$query = 'DELETE FROM `users` WHERE id=:id';
$params = [
    'id' => $user['id']
];
$stmt = $con->prepare($query);
$stmt->execute($params);
logout();