 <?php
 session_start();
 include "header.php"; 
 
 ?>
 <div id="continut_pag">
  <main>
    <?php
     include("conn.php");
     function testare($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }

   class Clienti {
    public $cnp;
    public $parola;
    public $nume;
    public $prenume;
    public $oras;
    public $adresa;
    public $telefon;
    public $email;
  }

  $cos = testare($_REQUEST['coscump']);
  $nume = testare($_REQUEST["num"]);
  $pw = testare($_REQUEST["pw"]);  //  Parola



if(isset($cnx)) {
  $cda = "SELECT * FROM clienti";
  $stmt = $cnx->prepare($cda);
  $stmt->execute();
    //  Caut clientul in tabelul clienti

  $interogare = $cnx->prepare("SELECT * FROM clienti");
  $interogare->execute();
  $codcli = 0;
  while ($cli = $stmt->fetchObject('Clienti')) {
    if (strtoupper ($nume) == strtoupper ($cli->nume) && md5($pw) == $cli->parola) {
        $codcli = $cli->cnp;  //  Preiau val. cheii primare
        break;
      }
    }
    if($codcli != 0) {
    // Inserez articole in tabelul comenzi
      $articole = explode(',',$cos);
      foreach ($articole as $item) {
      // Caut produsul in baza de date dupa $item
        date_default_timezone_set('Europe/Bucharest');
            $data = date('Y-m-d'); // data in format aaaa-ll-dd
            $interogare1 = $cnx->prepare("INSERT INTO COMENZI VALUES
              (NULL, '$codcli', '$item', '1', '$data')");
            $interogare1->execute();
          }
          echo '<h1 class="italic centrat"><span class="litera italic">C</span>';
  echo 'omanda preluata pentru <span class="litera italic">'.$nume.'</span><br /> in data de
  <span class="litera italic">'.$data.'</span> <br />Un operator va va contacta telefonic pentru confirmare.';
  echo ' <br />Va multumim!</h1><br />';
        // Golesc cosul memorat in $_SESSION['cos_cumparaturi']
          unset($_SESSION['cos_cumparaturi']);
        } else {
          echo '<h1 class="italic centrat">';
          echo 'Nume utilizator sau parola eronata!</h1>';
          echo ' <br /><input id="btn" type="button" value = "Reintroduc datele" ';
          echo 'onclick="return fclick()" /><br />';
        }
        $cnx = null;
      }
      ?>
      <br /><br /><br /><br /><br /><br />
      <div class="livrare">
        <p><a href="#">Informatii privind livrarea</a> | <a
          href="#">Comentariile clientilor nostri</a>.</p>
        </div>
      </main>
      <?php include "navigare.php"; ?>
    </div>  <!-- continut pagina -->
    <footer>
      <p>By Ovidiu&nbsp;&nbsp; &copy;  <script>document.write(new Date().getFullYear())</script> </p>
    </footer>
  </div>   <!-- continut -->
  <script language="javascript" type="text/javascript">
   function fclick() 
   {
    window.location.href = "finalizez.php";
  }
</script>
</body>
</html>
