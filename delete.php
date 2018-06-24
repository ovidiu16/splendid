<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		
		<?php

		include("conn.php");

		class Produse {
			public $id_produs;
			public $fisier_imagine;
			public $imagine_mare;
			public $id_categ;
			public $nume_produs;
			public $prezentare;
			public $pastrare;
			public $limbajul_florilor;
			public $pret;
		}

		$nume_produs=$_REQUEST["combo"];

		if(isset($cnx)) {
			$cda= "DELETE FROM produse WHERE id_produs=$nume_produs";
			$stmt = $cnx->prepare($cda);
			$stmt->execute();

        echo "<h1 class=\"centrat\">Produsul <span class=\"litera italic\">$nume_produs</span>  sters din baza de date</h1>";
        echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"
   onClick=\"location.href='adaugare.php'\">";
   echo "<input type=button value=\"Home\" onClick=\"location.href='index.php'\"></form>";
					
$cnx = null;
		}
		?>
	</main> 

	<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>	
