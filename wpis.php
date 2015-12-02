<?php
    $objDir = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( getcwd().'/' ) );
    $flaga = 0;
    foreach( $objDir as $objFile ) {
        if (basename($objFile) == "info.txt"){
            $ścieżka = $objDir->getPath();
            $info = fopen($ścieżka.'/'.basename($objFile), "r");
            $użytkownik = trim(fgets($info));
            $hasło = trim(fgets($info));
            fclose($info);   
            
            if (($_POST['użytkownik'] == $użytkownik) && (md5($_POST['hasło']) == $hasło)) {
                $flaga = 1;
                $data = explode('-',$_POST['data']);
                $czas = explode(':',$_POST['czas']);
                $sekunda = date("s",time());
                $date = $data[0].$data[1].$data[2];
                $time = $czas[0].$czas[1].$sekunda;
                //sekcja krytyczna
                $id = $date.$time;
                $handler = opendir($ścieżka.'\\');
                $licznik = 0;
                while ($file = readdir($handler)) {
                    if ($file !== "." && $file !== "..") {
                        preg_match("/^({$id}.*.txt)/i" , $file, $name);
                        if (isset($name[0])) {
                            ++$licznik;
                        }
                    }
                }
                if ($licznik <= 9) {
                    $licznik = '0'.$licznik;
                }
                closedir($handler);
                $entry = $date.$time;
                $wpis = fopen($ścieżka.'/'.$entry.$licznik.".txt", "w");
                fwrite($wpis, $_POST['wpis']);
                fclose($wpis);
                $plik1 = basename($_FILES['plik1']['name']);
                $plik2 = basename($_FILES['plik2']['name']);
                $plik3 = basename($_FILES['plik3']['name']);
                if ($plik1 != "") { 
                    $ext = pathinfo($plik1);
                    move_uploaded_file($_FILES['plik1']['tmp_name'], $ścieżka."/".$entry.$licznik."1.".$ext['extension']);
		}
		if ($plik2 != "") {
                    $ext = pathinfo($plik2);
                    move_uploaded_file($_FILES['plik2']['tmp_name'], $ścieżka."/".$entry.$licznik."2.".$ext['extension']);
		}
		if ($plik3 != "") {
                    $ext = pathinfo($plik3);
                    move_uploaded_file($_FILES['plik3']['tmp_name'], $ścieżka."/".$entry.$licznik."3.".$ext['extension']);
		}
            } 
        }
    }
    if ($flaga == 0) {
        echo "Nie znaleziono odpowiedniego  bloga!";
    } else {
        $blog = explode("\\", $ścieżka);
        header("Location: blog.php?nazwa=".$blog[count($blog)-1].""); 
    }
?>
