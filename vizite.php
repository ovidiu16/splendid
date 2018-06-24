<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		<h1 class="italic centrat"><span class="litera italic">I</span>mpresii
			ale vizitatorilor</h1><br />
			<?php
			include("conn.php");
			
			class Vizitatori {
   public $nr;  //  Cheia primara
   public $nume;
   public $prenume;
   public $email;
   public $mesaj;
}

if(isset($cnx)) {
	$cda = "SELECT * FROM vizitatori ORDER BY nr DESC";
	$stmt = $cnx->prepare($cda);
	$stmt->execute();
	echo "<table style=\"width:100%; \">";
      $i=1; //  Contor de linii
      while ($vizit = $stmt->fetchObject('Vizitatori')) {
      	if ($i%2==0) {
      		echo "<tr style=\"background-color:#cccccc; \"><td>";
      	}
      	else {
      		echo "<tr style=\"background-color:#a0a0a0; \"><td>";
      	}
      	echo $vizit->nr; echo ".    ";
      	echo $vizit->nume; echo "    ";
      	echo $vizit->prenume; echo "  --  ";
      	echo $vizit->email;
      	echo "<br /><br />";
      	echo $vizit->mesaj;
      	echo "</td></tr>";
      	echo "<tr><td> </td></tr>";
      	$i++;
      }
      $cnx = null;
  }
  ?>
</table>


</main> 

<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>	
