 <?php
$dir = 'image/';
$files = scandir($dir);
if ($files === false) {
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../screenshots/icon.jpg">
    <link rel="stylesheet" href="styles.css">
    <title>Gallery</title>
</head>
<body>
<header>
        <div class="logo">
            <img src="image/icon2.png" alt="Логотип">
        </div>
        <nav>
            <ul>
                <li><a href="#">Меню</a></li>
                <li><a href="#">Информация</a></li>
                <li><a href="#">Контакты</a></li>
                <li><a href="#">Продажа</a></li>
            </ul>
        </nav>
    </header>
    <div class="gallery">
        <?php
        for ($i = 0; $i < count($files); $i++) {
            if (($files[$i] != ".") && ($files[$i] != "..")) {
                $path = $dir . $files[$i];

        echo "<a href='$path'><img src='$path' alt='$path' /></a>"; 
            }
        }
        ?>
    </div>
    <footer>
        <p>© 2024. Все права защищены. Скетчи принадлежат их соответствующим владельцам.<br> Любое воспроизведение, копирование или использование без разрешения запрещено.</p>
    </footer>
</body>
</html>
