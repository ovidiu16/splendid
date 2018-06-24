<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		<h1 class="italic centrat"><span class="litera
			italic">A</span>daugare</h1><br />
			<form name="formular" enctype="multipart/form-data" method="post" action="inserare.php" class="centrat">
				<table class="login centrat">
					<tr>
						<td>Categoria :</td>
						<td>
							<select name="combo">
								<option selected value="initial">(Alege categoria)</option>
								<?php
								include("conn.php");


								class Categorii {
									public $id_categ;
									public $categoria;
								}


								if(isset($cnx)) {
									$cda= "SELECT * FROM categorii order by categoria ASC";
									$stmt = $cnx->prepare($cda);
									$stmt->execute();
									while ($categ = $stmt->fetchObject('Categorii')) {
										echo '<option value="' . $categ->id_categ . '">' . $categ->categoria . 
										'</option>\n';
									}
									$cnx = null;
								}
								?>

							</select>
						</td>
					</tr>
					<tr>
						<td>Selectati imaginea : </td>
						<td><input type="file" name="fisier" /></td>
					</tr>
					<tr>
						<tr>
							<td>Imaginea mare : </td>
							<td><input type="file" name="mare" /></td>
						</tr>
						<tr>
							<td>Numele produsului : </td>
							<td><input type="text" name="nume" /></td>
						</tr>
						<tr>
							<td>Prezentare : </td>
							<td><textarea name="prez"></textarea></td>
						</tr>
						<tr>
							<td>Pastrare : </td>
							<td><textarea name="pastr" ></textarea></td>
						</tr>
						<tr>
							<td>Limbajul florilor : </td>
							<td><textarea name="limbaj" ></textarea></td>
						</tr>
						<tr>
							<td>Pretul : </td>
							<td><input type="text" name="pret" /></td>
						</tr>
						<tr>
							<td class="centrat"><input type="submit" name="Submit" value="Adauga"></td>
							<td class="centrat"><input type="reset" name="Submit" value="Sterge"></td>
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
	