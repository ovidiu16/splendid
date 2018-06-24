<?php
$dsn = 'mysql:host=localhost;charset=utf8;dbname=splendid';
$utilizator = 'root';
$parola = '';
$cnx = null;
try {
	$cnx = new PDO($dsn, $utilizator, $parola);//PDO este o clasă predefinită, pentru conectarea la serverul MySQL creându-se un obiect aparţinând acestei clase denumit $cnx
	// in momentul crearii  obiectului $cnx constructorul clasei PDO a fost apelat cu trei parametri:  numele db, utilizatorul db si parola
	$cnx ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
	echo 'Conectare nereusita: ' . $e->getMessage();
};
?>
