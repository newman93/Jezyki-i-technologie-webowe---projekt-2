<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<title>Dodaj nowy wpis</title>
</head>
<body>
     <?php
        include 'menu.php';
        dodajMenu();
    ?>
    <?php 
            date_default_timezone_set('Europe/Warsaw');
            echo    '<form action="wpis.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <input type="text" name="użytkownik" placeholder="Użytkownik" /><br />
                            <input type="password" name="hasło" placeholder="Hasło"/><br />
                            <input type="text" name="data" value="';echo date("Y-m-d"); echo '"><br />
                            <input type="text" name="czas" value="';echo date("H:i",time()); echo '"><br />
                            <input type="file" name="plik1"/><br />
                            <input type="file" name="plik2"/><br />
                            <input type="file" name="plik3"/><br />
                            <textarea rows="4" cols="50" name="wpis">
Wpis. 
                            </textarea><br />
                            <input type="reset" name="wyczyść" value="Wyczyść"/>
                            <input type="submit" name="opublikuj" value="Opublikuj" />
                        </div>
                    </form>';
        ?>
</body>
</html>
