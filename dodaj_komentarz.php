<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<title>Dodaj nowy komentarz</title>
</head>
<body>
    <?php
        include 'menu.php';
        dodajMenu();
        $id = $_GET['id'];
    
    echo    '<form action="koment.php" method="GET">
		<div>
                    <select name="rodzaj">
                        <option>Pozytywny</option>
                        <option>Negatywny</option>
                        <option>Neutralny</option>
                    </select><br />
                    <textarea rows="4" cols="50" name="komentarz">
Komentarz.
                    </textarea><br />
                    <input type="text" name="nick" placeholder="Nick"/><br />
                    <input type="hidden" name="id" value="'.$id.'" />
                    <input type="reset" value="Wyczyść"/>
                    <input type="submit" name="submit" value="Opublikuj" />
		</div>
	</form>';
    ?>
</body>
</html>
        