<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		<?php
		include("conn.php");

		function testare($data) {
   $data = trim($data); // înlătură toate spaţiile de la începutul şi sfârşitul şirului 
   $data = stripslashes($data); //înlătură backslash
   $data = htmlspecialchars($data); //înlocuiește în șirul dat ca argument caracterele folosite în scrierea marcajelor HTML
   return $data; 
}

//declar clasa Admin, de tip public
//clasa odata declarata se pot crea instanţe clasei
//clasa poate fi instanţiată printr-un număr oarecare de obiecte
class Admin {
   public $id_admin;//variabila instanteti clasei Admin
   public $nume;
   public $parola;
}

$n = testare($_REQUEST["numeletau"]); //$_REQUEST este un sir de caractere care contine volorile campului asociat
$p = testare($_REQUEST["parolata"]);//campul parolata este valoarea proprietăţii name a controlului Windows a cărui valoare dorim să o preluăm
if(isset($cnx)) {//isset verifica daca variabilei i s-a atribuit o valoare
   $cda= "SELECT * from admin";//comanda SQL este memorata in variabila $cda
   $stmt = $cnx->prepare($cda);
   $stmt->execute();//trimite spre server comanda SELECT, prin aplelul metodei execute
   $gasit = false;
   while ($utilizator = $stmt->fetchObject('Admin')) {
   	if($utilizator->nume == $n && $utilizator->parola == $p) {
                 echo '<h1 class="italic centrat">'.$n.'</h1>';
                 echo '<h1 class="italic centrat"><span class="litera italic"> S</span>unteti autorizat</h1>';
                 echo "<form class=\"centrat\" method=\"post\"action=\"adaugare.php\">";
                  echo "<input type=\"submit\" name=\"submit1\"value=\"Adaugare\">";
                  echo "</form></center>";
                  echo"<br />";
                  
                  echo "<form class=\"centrat\" method=\"post\"action=\"sterge.php\">";
                  echo "<input type=\"submit\" name=\"submit2\"value=\"Stergere\">";
                  echo"<br />";
                  
                  echo "</form></center>";

         $gasit = true;
         break;
      }
   }
   if(!$gasit) {
   	echo '<h1 class="italic centrat"><span class="litera italic"> NU</span>avti acces in baza de date</h1><br />';
   	echo '<form class="centrat"><input type="button" value="Mai incearca" onClick="location.href=\'login.html\'"></form></center>';
   }
   $cnx = null;
}
?>


</main> 

<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>		
