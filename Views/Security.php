<?php

if(!isset($_SESSION['login'])){
	
	 Redirect::to('login');
	
	 exit();
}
?>
