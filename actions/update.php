<?php
require_once(__DIR__.'/../helpers.php');
require_once(__DIR__.'/config.php');
if($_SERVER['REQUEST_METHOD']!=='POST') redirect('../menu.php');
$user = currentUser();
$newName = $_POST['user_input_name']??null;
$newAvatar = $_FILES['avatar'];
$con = getPdo();
if (!empty($newName)){
    $query = 'UPDATE `users` SET `name` = :name WHERE id=:id';
    $params = [
        'name' => $newName,
        'id' => $user['id']
    ];
    $stmt = $con->prepare($query);
    $stmt->execute($params);
}
if(!empty($newAvatar)){
    $_SESSION['values']['name'] = $newName;
    $types = ['image/jpeg', 'image/png'];
    if(!in_array($newAvatar['type'],$types)){
        if(empty($newName))addError('avatar','Файл имеет неверный тип');
        redirect('../menu.php');
    }
    if($newAvatar['size']/1000000>10){
        if(empty($newName))addError('avatar','Файл слишком большой');
        redirect('../menu.php');
    }
    $query = 'UPDATE `users` SET `avatar` = :avatar WHERE id=:id';
    $params = [
        'avatar' => 'uploads/'.uploadFile($newAvatar),
        'id' => $user['id']
    ];
    $stmt = $con->prepare($query);
    $stmt->execute($params);
}
redirect('../menu.php');