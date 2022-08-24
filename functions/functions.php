<?php 
require_once '../Database/db.php';



function validateInput($dbconn,$input){
   return mysql_real_escape_string($dbconn,$input);
}

 ?>