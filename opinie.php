<?php 
include "header.php";
?>

<div id="continut_pag">
	<main>
		<h1 class="italic centrat"><span class="litera italic">I</span>mpresii</h1><br />
		<form name="formular" method="post" action="introducere.php" class="centrat">
			<table class="login centrat">
				<tr>
					<td>Numele:</td>
					<td><input type="text" name="nume" size=53></td>
				</tr>
				<tr>
					<td>Prenumele:</td>
					<td><input type="text" name="prenume" size=53></td>
				</tr>
				<tr>
					<td>E-mail:</td>
					<td><input type="text" name="email" size=53></td>
				</tr>

				<tr>
					<td>Impresia:</b></td>
					<td><textarea name="mesaj" rows=5 cols=43></textarea></td>
				</tr>
				<tr>
					<td colspan = "2">
						<input type="submit" style="float:left;"
						value="Introduceti impresia proprie...">
						<input type="reset" style="float:right;" value="Stergeti datele introduse...">
					</td>
				</tr>
			</table>
		</form>

	</main> 
	<?php include "navigare.php"; ?>
</div>  <!-- continut pagina -->
<?php include "footer.php"; ?>
</body>
</html>	

