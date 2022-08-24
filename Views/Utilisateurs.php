<?php 
require_once 'Security.php';
require_once 'Includes/Nav.php' ;
 require_once 'Includes/Constants.php' ;
 ?>
   <?php $title = "Utilisateurs/Liste";?>
	
	<title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>





<?php require_once 'Includes/Footer.php' ; ?>