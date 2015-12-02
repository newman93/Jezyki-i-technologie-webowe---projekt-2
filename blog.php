<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Lista blogów</title>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
</head>
<body>
    <?php
        include 'menu.php';
        dodajMenu();
        
        function listaBlogów() {
            $blogs = glob('*', GLOB_ONLYDIR);
            echo "<ul>";
            foreach ($blogs as &$blog) {
		echo '<li><a href="blog.php?nazwa='.$blog.'">'.$blog.'</a></li>';
            }
            echo "</ul>";
        }

        if (!isset($_GET["nazwa"])) { 
            echo "Lista dostępnych blogów:";
            listaBlogów();
        } elseif (!is_dir(htmlspecialchars($_GET["nazwa"]))) { 
            echo "Taki blog nie istnieje!<br/>Lista dostępnych blogów:";
            listaBlogów();
        } else { 
            $blog = htmlspecialchars($_GET["nazwa"]);
            echo "<h1>Blog: ".$blog."<br /></h1>";
            $inf = fopen($blog."/info.txt", "r") or die("Nie można otworzyć bloga!");
            echo "<h3>Autor: ".fgets($inf)."<br /></h3>";
            fgets($inf);
            echo "<h5>Opis: ";
            while (!feof($inf)){
                echo fgets($inf);
            }
            echo "<br /></h5>";
            fclose($inf);
            $handler = opendir($blog.'\\');
            $licznik_wpisow = 0;
            $licznik_zalacznikow = 0;
            while ($file = readdir($handler)) {
                if ($file !== "." && $file !== "..") {
                    preg_match("/^[0-9]{16}.txt/i" , $file, $name);
                    preg_match("/^[0-9]{17}.*/i" , $file, $zalacznik);
                    if (isset($name[0])) {
                        $plik = explode(".", $name[0]);
                        $wpisy[] = $plik[0];
                        $licznik_wpisow = $licznik_wpisow + 1;
                    }
                    if (isset($zalacznik[0])) {
                        $zalaczniki[] = $zalacznik[0];
                        $licznik_zalacznikow = $licznik_zalacznikow + 1;
                    }
                }
            }
            closedir($handler);
            if ($licznik_wpisow > 0) {
                sort($wpisy);
                foreach ($wpisy as $key => $val) {
                    $wpis = fopen(htmlspecialchars($_GET["nazwa"])."\\".$val.".txt", "r");
                    while (!feof($wpis))
                    {
                        echo fgets($wpis)."<br />";
                    }
                    if ($licznik_zalacznikow > 0) {
                        sort($zalaczniki);
                        echo '<ul>';
                        foreach ($zalaczniki as $key => $val1) {
                            $val2 = explode(".", $val1);
                            $val2[0] = substr($val2[0], 0, 16);
                            if ($val2[0] == $val) {
                                echo '<li><a href="'.htmlspecialchars($_GET["nazwa"]).'\\'.$val1.'">Załącznik</a></li>';
                            }    
                        }
                        echo '</ul>';
                    } else {
                        echo 'Brak zalacznikow!<br />';
                    }
                    $id0 = $_GET["nazwa"]."/".$val.'.k'; 
                    if (file_exists($id0)) {
                    $handler1 = opendir($id0);
                    $licznik_komentarzy = 0;
                    while ($file = readdir($handler1)) {
                        if ($file !== "." && $file !== "..") {
                            $licznik_komentarzy = $licznik_komentarzy + 1;
                            $komentarz = fopen($id0.'/'.$file, "r") or die("Nie można otworzyć komentarza!");
                            echo 'Komentarz: '.$licznik_komentarzy.'<br />';
                            while (!feof($komentarz))
                            {
                                echo fgets($komentarz)."<br />";
                            }
                            fclose($komentarz);
                        }
                    }    
                    closedir($handler1);
                    } else {
                        echo 'Brak komentarzy!<br />';
                    }
                    $id = $_GET["nazwa"]."/".$val;
                    echo '<a href="dodaj_komentarz.php?id='.$id.'">Dodaj komentarz</a><br /><br />';
                    fclose($wpis);
                    $licznik = 0;
                }            
            } else {
                echo "Brak wpisów!";
            }
        }
        
    ?>
</body>
</html>