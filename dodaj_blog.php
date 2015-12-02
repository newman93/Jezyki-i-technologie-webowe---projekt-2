<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<title>Dodaj nowego bloga</title>
</head>
<body>
         <?php
            include 'menu.php';
            dodajMenu();
        ?>
	<form action="nowy.php" method="GET">
		<div>
			<input type="text" name="blog"	placeholder="Blog" /><br />
			<input type="text" name="użytkownik" placeholder="Użytkownik" /><br />
                        <input type="password" name="hasło" placeholder="Hasło"/><br />
                        <textarea rows="4" cols="50" name="opis">
Przykładowy opis. 
                        </textarea><br />
                        <input type="reset" name="wyczyść" value="Wyczyść"/>
                        <input type="submit" name="załóż" value="Załóż" />
		</div>
	</form>
</body>
</html>