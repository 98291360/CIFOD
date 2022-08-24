<?php 
require_once 'Security.php';

if (isset($_POST['id_action'])) {
  $exitAction = new ActionController();
  $exitAction -> DeleteAction();
}

?>
