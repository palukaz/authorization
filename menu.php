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
    <p class="meet">Здравствуйте, <?php echo $user['name']?></p><br>

    <form action="actions/update.php" method="post" enctype="multipart/form-data">
        <img class="avatar" src="<?php echo $user['avatar']?>" alt="avatar"><br><hr>
        <label>Изменить аватарку: </label>
        <input type="file" class="input file" name="avatar" id="avatar">
        <label>Введите новое имя: </label>
        <input type="text" class="input" name="user_input_name" placeholder="Новое имя">
        <button type="submit" class="input button">Сохранить изменения</button>
    </form>
    <hr>
    <form action="actions/logout.php" method="post">
        <button id="submit" type="submit" class="input button">Выйти из аккаунта</button>
    </form>
    <form action="actions/delete.php" method="post">
    <button id="delete_user" type="submit" class="input button">Удалить аккаунт</button>
    </form>
</div>
<?php clearValidation(); ?>
</body>
</html>