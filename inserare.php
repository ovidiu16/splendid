<?php 
include "header.php";
?>

<div id="continut_pag">
   <main>
     <?php
     function testare($data) {
      $data = trim($data); 
      $data = stripslashes($data); 
      $data = htmlspecialchars($data); 
      return $data; 
   }
   if (testare($_FILES["fisier"]["error"]) > 0) {
      echo "Error: " . $_FILES["fisier"]["error"] . "<br />"; 
      exit; 
   }
   if (testare($_FILES["mare"]["error"]) > 0) {
      echo "Error: " . $_FILES["mare"]["error"] . "<br />";
      exit; 
   }
   $numeimagine = testare($_FILES["fisier"]["name"]); //se testeaza daca avem fisier incarcat
   $poz = strrpos($numeimagine, "."); //vom preluat pozitia pct prin fct strrpos care returneaza pozitia ultimei aparitii in sir ca al II-lea argument
   $extensie = substr ($numeimagine, $poz);//in variabila preiau extensia fisierrului incarcat 

   $nmtmp = $_FILES["fisier"]["tmp_name"];

   $numeimaginemare = testare($_FILES["mare"]["name"]); 
   $pozm = strrpos($numeimaginemare, "."); 
   $extensiem = substr ($numeimaginemare, $pozm); 

   $nmtmpm = $_FILES["mare"]["tmp_name"]; 

   $categoria = testare($_REQUEST["combo"]); 
   $nume = testare($_REQUEST["nume"]); 
   $prezentare = testare($_REQUEST["prez"]); 
   $pastrare = testare($_REQUEST["pastr"]); 
   $limbajul = testare($_REQUEST["limbaj"]); 
   $pretul = testare($_REQUEST["pret"]);
   
   include("conn.php");
   if(isset($cnx)) {
      $cda= "INSERT INTO produse (id_produs, fisier_imagine, imagine_mare, id_categ, nume_produs, prezentare, pastrare, limbajul_florilor, pret) VALUES ('', :numeimagine, :numeimaginemare, :idcateg, :numeprod, :prez, :pastrare, :limbaj, :pret)";
      $stmt = $cnx->prepare($cda); 
      $stmt->bindParam(':numeimagine', $numeimagine, PDO::PARAM_STR);
      $stmt->bindParam(':numeimaginemare', $numeimaginemare, PDO::PARAM_STR);
      $stmt->bindParam(':idcateg', $categoria, PDO::PARAM_STR); 
      $stmt->bindParam(':numeprod', $nume, PDO::PARAM_STR); 
      $stmt->bindParam(':prez', $prezentare, PDO::PARAM_STR);
      $stmt->bindParam(':pastrare', $pastrare, PDO::PARAM_STR);
      $stmt->bindParam(':limbaj', $limbajul, PDO::PARAM_STR);
      $stmt->bindParam(':pret', $pretul, PDO::PARAM_STR);
   // se foloseste PARAM_STR chiar si pentru numere 
      $stmt->execute(); 
   // Preiau ID-ul pozei introduse in baza si construiesc un nou nume 
   $id = $cnx->lastInsertId(); // fct lastInsertId returneaza ultimul id inserat
   $numeimaginenou = "imagine".$id.$extensie; 
   $numeimaginemarenou = "imagine".$id."M".$extensie; 
   $cda = "UPDATE produse SET fisier_imagine='$numeimaginenou' WHERE id_produs = $id";
   $stmt = $cnx->prepare($cda); 
   $stmt->execute();
   // Construiesc calea pe care sa incarc fisierul 
   $cale = "imagini/$numeimaginenou"; 
   $rezultat = move_uploaded_file($nmtmp, $cale); //fct muta fisierul din dir temp xampp in dir imagini
   if (!$rezultat) { 
      echo "Eroare la incarcarea fisierului"; 
      exit; 
   } 
   $cda = "UPDATE produse SET imagine_mare='$numeimaginemarenou' WHERE id_produs = $id";
   $stmt = $cnx->prepare($cda); 
   $stmt->execute(); 
   $calem = "imagini/$numeimaginemarenou"; 
   $rezultat = move_uploaded_file($nmtmpm, $calem); 
   if (!$rezultat) { 
      echo "Eroare la incarcarea fisierului"; 
      exit; 
   }
   
   echo "<p class=\"inserare centrat\">";
   echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">P</span>rodusul<br />s-a adaugat in baza de date</h1><br />";
   echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"
   onClick=\"location.href='adaugare.php'\">";
    echo "<form class=\"centrat\"><input type=button value=\"Sterge\"
   onClick=\"location.href='sterge.php'\">";
   echo "<input type=button value=\"Home\" onClick=\"location.href='index.php'\"></form>";
   echo "</p><br /><br />";
   echo "<p class=\"inserare centrat\">Numele vechi al fisierului: $numeimagine</p>";
   echo "<p class=\"inserare centrat\">Numele vechi al fisierului mare:   $numeimaginemare</p>";
   echo "<p class=\"inserare centrat\">Categoria fisierului: $categoria</p>";
   echo "<p class=\"centrat inserare\">Noul nume al fisierului: $numeimaginenou</p>";
   echo "<p class=\"inserare centrat\">Imaginea mare: $numeimaginemarenou</p>"; 
   $cnx = null;

}
?>
</main> 
<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>

