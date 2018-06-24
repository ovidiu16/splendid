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

		$nume=testare($_REQUEST["nume"]);
		$prenume=testare($_REQUEST["prenume"]);
		$email=testare($_REQUEST["email"]);
		$mesaj=testare($_REQUEST["mesaj"]);

		include("conn.php");
		if(isset($cnx)) {

			$cda = "INSERT INTO vizitatori (nr, nume,prenume, email, mesaj)VALUES ('', :nume,:prenume, :email, :mesaj)";
			$stmt = $cnx->prepare($cda); 
			$stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
			$stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':mesaj', $mesaj, PDO::PARAM_STR);
			$stmt->execute(); 

			echo "<p class=\"inserare centrat\">"; 
			echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">$nume $prenume</span><br /> Mesajul dv. s-a adaugat in cartea noastra de oaspeti<br /><br /> Va multumim!</h1><br />";

			echo "<br /><br /><br /><br />";
			echo "Puteti citi <a href=\"vizite.php\">alte impresii despre sit </a>";
			echo "sau puteti completa un alt <a href=\"opinie.php\">Formular cu impresii</a></p>";
			$cnx = null;
		}
		?>
	</main>
	<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>
