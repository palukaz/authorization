<?php
require_once(__DIR__.'/helpers.php');
require_once(__DIR__.'/actions/config.php');
//setcookie('auth',$_SESSION['user']['id']);
checkAuth();
$user = currentUser();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <p class="meet">Здравствуйте, <?php echo $user['name']?></p>
    <form action="actions/logout.php" method="post">
    <button id="submit" type="submit" class="input button">Выйти из аккаунта</button>
    </form>
    <hr>
    <form action="actions/delete.php" method="post">
    <button id="delete_user" type="submit" class="input button">Удалить аккаунт</button>
    </form>
</div>

</body>
</html>