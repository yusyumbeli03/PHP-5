<style>
    body{
        background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        font-size:20px;
    }
</style>
<?php

$file = "files/file2.txt";
$current.="1. William Smith, 1990, 2344455666677\n";
$current.="2. John Doe, 1988, 4445556666787\n";
$current.="3. Michael Brown, 1991, 7748956996777\n";
$current.="4. David Johnson, 1987, 5556667779999\n";
$current.="5. Robert Jones, 1992, 99933456678888\n"; 

file_put_contents($file, $current);
$current="";
$current.="6. Helen Roose, 1998, 7748956998887\n";
$current.="7. Piter Makley, 1987, 4446667779999\n";
$current.="8. Anna Knopper, 1995, 22233456678888\n";
file_put_contents($file, $current, FILE_APPEND);
$current = file_get_contents($file);
?>
<div><h3>Данные,записанные в файл функцией <i>file_get_contents:</i></h3></div>
<?php
echo nl2br(file_get_contents($file));
