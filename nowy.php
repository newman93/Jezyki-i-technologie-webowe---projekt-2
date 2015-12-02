<?php
    if (!file_exists($_GET['blog'])) {
        mkdir($_GET['blog'], 0777, true);
        $info = fopen($_GET['blog']."/info.txt", "w") or die("Nie można utworzyć pliku info!");
        $txt = $_GET['użytkownik'].PHP_EOL.md5($_GET['hasło']).PHP_EOL.$_GET['opis'];
        fwrite($info, $txt);
        fclose($info);
        header("Location: blog.php?nazwa=".$_GET['blog']."");
    } else {
        echo 'Blog o takiej nazwie już istnieje!';
    } 
?>
