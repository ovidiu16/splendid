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

		if(isset($cnx)) {
			$idp = $_REQUEST['idprod'];
			$cda = "select * from produse WHERE id_produs=$idp"; 
			$stmt = $cnx->prepare($cda);
			$stmt->execute();
			$prod = $stmt->fetchObject('Produse');
			echo "<article class=\"produs\"><h1>$prod->nume_produs</h1>";
			echo "<div class=\"mostra\">";
			echo '<img src="imagini/'.$prod->imagine_mare.'" alt="" />';
			echo "</div>";

			echo "<div class=\"descriere\">";
			echo "<h2>Prezentare</h2><p>$prod->prezentare</p>";
			echo "<h2>Pastrare</h2><p>$prod->pastrare</p>";
			echo "<h2>Limbajul florilor</h2><p>$prod->limbajul_florilor</p>";
			echo '<h2>PRET</h2><p class="bold">'.$prod->pret.' lei</p>';
			echo "</div>";

			echo '<div class="pret"><a href="cumpar.php?id_produs='.$idp.'">Cumpar</a></p></div>';
			echo "</article>";
			$cnx = null;
		} 
		?>
		
		
	</main> 
	<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>		

