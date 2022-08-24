<?php
require_once './Views/Includes/Header.php'; 
require_once './autoload.php';
require_once './Controllers/HomeController.php';
require_once './Controllers/EncadreurController.php';
require_once './Database/db.php';
require_once './Controllers/RegisterController.php';

$home = new HomeController();

$pages = ['Dashboard','register','Encadreurs', 'Add', 'Delete', 'Update','login', 'MotdePasseOublier','UpdatePassword','Print',
'Logout', 'Profile','Modules', 'AddModule', 'UpdateModule', 'DeleteModule','Utilisateurs','userUpdate', 'Profiles','AddProfile','UpdateProfile', 'DeleteProfile','Security'];

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
  


if (isset($_GET['page'])) {
  if (in_array($_GET['page'], $pages)) {
    $page = $_GET['page'];
    $home->index($page);
  }else{
    include('Views/Includes/404.php');
  }
}else{
     $home -> index('Dashboard');
 }


 
require_once './Views/Includes/Footer.php';
  
} else if(isset($_GET['page']) && $_GET['page'] === 'register'){
      $home -> index('register');
}else{
  $home -> index('login');
}

 

