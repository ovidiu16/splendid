<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		
		<h1 class="italic centrat"><span class="litera
italic">S</span>terge articole din baza</h1><br />
		<form  name="selectare" method="post" action="delete.php"> 
			<form name="formular" enctype="multipart/form-data" method="post" action="delete.php" class="centrat">
				<table class="login centrat">
					<tr>
						<td>Produs:</td>
						<td>
							<select name="combo">
								<option selected value="initial">(Alege articol)</option>
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
									$cda= "SELECT * FROM produse ORDER BY nume_produs ASC";
									$stmt = $cnx->prepare($cda);
									$stmt->execute();
									while ($prod = $stmt->fetchObject('Produse')) {
echo '<option value="' . $prod->id_produs . '">' . $prod->nume_produs . 
										'</option>\n';
									}
									$cnx = null;
								}
								?>

							</select>
						</td>
					</tr>
				<tr>
					<td  colspan="2">Aceasta actiune va sterge definitiv postarea selectata!</td>
				</tr>

				<tr>

					<td class="centrat"><input type="submit" name="Submit" value="Sterge"></td>
					<td class="centrat"><input type="reset" name="Submit" value="Renunt"></td>
				</tr>
			</table>	
		</form>	
		<br>
	</main> 

	<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>	
