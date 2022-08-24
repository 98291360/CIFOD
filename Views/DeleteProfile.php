<?php 
require_once 'Security.php';

if (isset($_POST['id_profile'])) {
  $exitAction = new ProfileController();
  $exitAction -> DeleteProfile();
}

?>
