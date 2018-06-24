<?php 
include "header.php";
?>



	<div id="continut_pag">
		<main>
			<h1 class="italic centrat"><span class="litera
				italic">A</span>utentificare</h1><br />
				<form name="formular" method="post" action="verificare.php" class="centrat">
					<table class="login centrat">

						<tr>
							<td>Nume</td>
							<td><input type="text" name="numeletau" /></td>
						</tr>
						<tr>
							<td>Parola</td>
							<td><input type="password" name="parolata" /></td>
						</tr>
						<tr>
							<td colspan="2" class="centrat"><input type="submit"
								name="trimite" value="Verifica" /></td>
							</tr>
						</table>
					</form>

				</main> 

				<?php include "navigare.php"; ?>
			</div>  <!-- continut pagina -->
			<?php include "footer.php"; ?>
		</body>
		</html>		
