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
			$cda= "SELECT * from produse WHERE id_categ =2";
			$stmt = $cnx->prepare($cda);
			$stmt->execute();
			echo "<div class=\"imagini_mici\">";
			while ($prod = $stmt->fetchObject('Produse')) {
				$img = $prod->fisier_imagine;
				$id = $prod->id_produs;
				echo '<a href="element.php?idprod='.$id.'" class=\"buchet_mic\"><img src="imagini/'.$img.'" alt=""/></a>';
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