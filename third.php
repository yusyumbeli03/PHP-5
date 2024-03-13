<style>
    body {
    background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
    }
    form {
        max-width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="reset"],
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="reset"]:hover,
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<?php if (!isset($_REQUEST['start'])) { ?>
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div>
            <label>Ваше имя: <input name="name" type="text" size="30"></label>
        </div>
        <div>
            <label>Ваш возраст: <input name="age" type="number"></label>
        </div>
        <div>
            <label>Ваш E-mail: <input name="email" type="email"></label>
        </div>
        <div>
            <label>Ваше мнение о нас напишите тут:
                <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..."></textarea>
            </label>
        </div>
        <div>
            <input type="reset" value="Стереть"/>
            <input type="submit" value="Передать" name="start"/>
        </div>
    </form>
<?php } else {
    // Данные с формы
    $data = [
        'name' => $_POST['name'] ?? "",
        'age' => $_POST['age'] ?? "",
        'email' => $_POST['email'] ?? "",
        'message' => $_POST['message'] ?? "",
    ];
    // Сохранение данных в файл
    $file = fopen('files/messages.txt', 'a') or die("Недоступный файл!"); // Изменили 'w' на 'a' для добавления, а не перезаписи
    foreach ($data as $field => $value) {
        fwrite($file, "$field: $value\n");
    }
    fwrite($file, "\n");
    fclose($file);
    // Вывод данных на экран
    echo 'Данные были сохранены! Вот что хранится в файле: <br />';
    $file = fopen("files/messages.txt", "r") or die("Недоступный файл!");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
} ?>
