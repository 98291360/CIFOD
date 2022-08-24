<?php 

require_once 'Security.php';
if (isset($_POST['id_encadreurs'])) {
  $exitEncadreur = new EncadreursController();
  $exitEncadreur -> deleteEncadreur();
}

?>
