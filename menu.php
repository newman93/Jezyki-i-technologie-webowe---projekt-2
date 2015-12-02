<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Lista blogów</title>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
</head>
<body>

<?php
function dodajMenu() {
	echo " 
	<div>
		<ul>
			<li style=\"display: inline; list-style-type: none; padding-right: 20px;\"><a href=\"blog.php\">Lista blogów</a></li>
			<li style=\"display: inline; list-style-type: none; padding-right: 20px;\"><a href=\"dodaj_wpis.php\">Dodaj wpis</a></li>
			<li style=\"display: inline; list-style-type: none; padding-right: 20px;\"><a href=\"dodaj_blog.php\">Stwórz nowego bloga</a></li>
		</ul>
	</div> 
	";
}
?>
</body>
</html>