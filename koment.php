<?php
    if (isset($_GET['id'])) {
        $blog = explode("/", $_GET['id']);
        if (!file_exists(htmlspecialchars($_GET['id'])).".k") {
            mkdir(htmlspecialchars($_GET['id']).".k", 0777, true);
        }
        $handler = opendir($_GET['id'].'.k');
        $licznik_komentarzy = 0;
            while ($file = readdir($handler)) {
                if ($file !== "." && $file !== "..") {
                        $licznik_komentarzy = $licznik_komentarzy + 1;
                }
            }    
        closedir($handler);
        $komentarz = fopen($_GET['id'].'.k'.'/'.$licznik_komentarzy.".txt", "w") or die("Nie można utworzyć komentarza!");
        $txt = $_GET['rodzaj'].PHP_EOL.date("Y-m-d").' '.date("H:i:s",time()).PHP_EOL.$_GET['nick'].PHP_EOL.$_GET['komentarz']; 
        fwrite($komentarz, $txt);
        fclose($komentarz);
        header("Location: blog.php?nazwa=".$blog[0].""); 
    } else {
        echo "Nie można dodać komentarza!";
    }
?>