<?php
// Проверка заполнения полей
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    // Получение данных из файла
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    // Проверяем, существует ли пользователь с таким логином и паролем
    foreach ($users as $user) {
        list($saved_login, $saved_password) = explode(':', $user);
        if ($login === $saved_login && $password === $saved_password) {
            // Если пользователь найден, происходит перенаправление
            header('Location: gallery/images.php');
            exit;
        }
    }
    
    // Если пользователь не найден, выводим сообщение об ошибке
    echo 'Ошибка: неправильный логин или пароль!';
} else {
    // В случае ошибки выводим сообщение
    echo 'Ошибка: все поля должны быть заполнены!';
}
?>
