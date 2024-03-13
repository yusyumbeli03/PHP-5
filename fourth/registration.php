<?php
// Проверяем, что все поля заполнены
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    // Зашифровываем пароль пользователя
    $encrypted_password = md5($_POST['password']);
    
    // Сохраняем данные пользователя в файл users.txt
    $user_data = $_POST['login'] . ':' . $encrypted_password . PHP_EOL;
    file_put_contents('users.txt', $user_data, FILE_APPEND);
    
    // Отправляем пользователю HTTP-код 201 (Created)
    http_response_code(201);
    echo 'Регистрация успешна!';
} else {
    // В случае ошибки выводим сообщение
    echo 'Ошибка: все поля должны быть заполнены!';
}
?>
