<?php
   session_start(); 
   session_unset($_SESSION['cos_cumparaturi']);
   session_destroy ($_SESSION['cos_cumparaturi']);
   session_write_close ($_SESSION['cos_cumparaturi']);
   // Merg la index
   header('Location: index.php');
?>