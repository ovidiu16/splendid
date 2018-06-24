<?php 
session_start();
include "header.php";
?>

<div id="continut_pag">
	<main>
		<h1 class="italic centrat">
			<span class="litera italic">F</span>ormular de comanda</h1><br />

			<?php 
			$cos = $_REQUEST['coscump'];
 // Golesc cosul memorat in $_SESSION['cos_cumparaturi'], urmeaza comanda
			unset($_SESSION['cos_cumparaturi']);
			$cli = $_REQUEST['client'];
 if ($cli==0) {  //  Client nou!
 	?>
 	<form name="formular" method="post" action="memorez.php"  class="centrat">
 		<table class="login centrat">

 			<?php  echo ' <input type= "hidden" name = "coscump" value = '.$cos.'>';?>
 			<tr>
 				<td>CNP </td>
 				<td> <input type="text" name = cnp> </td>
 			</tr>
 			<tr>
 				<td>Nume </td>
 				<td> <input type="text" name = num> </td>
 			</tr>

 			<tr>
 				<td>Prenume </td>
 				<td> <input type="text" name = prenum> </td>
 			</tr>

 			<tr>
 				<td>Oras</td>
 				<td><input type="text" name = oras></td>
 			</tr>

 			<tr>
 				<td>Adresa</td>
 				<td><input type="text" name = adr></td>
 			</tr>

 			<tr>
 				<td>Telefon</td>
 				<td><input type="text" name = tel></td>
 			</tr>

 			<tr>
 				<td>E-mail</td>
 				<td><input type="text" name = mail></td>
 			</tr>

 			<tr>
 				<td>Parola Dv. va fi</td>
 				<td><input type="password" name = pw></td>
 			</tr>

 			<tr>
 				<td colspan = 2 class="centrat"><input type="submit" name = "trimit" value = "Comanda"></td>
 			</tr>
 		</table>
 	</form>

   <?php  //  Reiau scriptul
     } 
      else
     {
	?>
	<form action="memorez1.php" method="post" class="centrat">
		<table class="login centrat">
			<?php 
			echo '<input type= "hidden" name = "coscump" value = '.$cos.'>';
			?>    
			<tr>
				<td>Nume </td>
				<td> <input type="text" name = num> </td>
				</tr>

				<tr>
					<td>Parola Dv. </td>
					<td><input type="password" name = pw></td>
				</tr>

				<tr>
					<td colspan = 2 class="centrat">
						<input type="submit" name ="trimit1"  value = "Comanda"></td>
					</tr>

				</table>
			</form>
			<?php
	}
?>

		</main> 


		<?php include "navigare.php"; ?>
	</div>  <!-- continut pagina -->
	<?php include "footer.php"; ?>
</body>
</html>