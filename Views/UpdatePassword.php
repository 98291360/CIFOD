<?php 

require_once 'Includes/Constants.php' ;
  $title = "Mot de passe/Mise à jour";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>



<?php
require_once 'Includes/Header.php'; 
require_once './Controllers/RegisterController.php';
require_once './Database/db.php';
?>

<?php 
if (isset($_POST['submit'])) {
  $loginUser = new UsersController();
   $loginUser -> auth();
}

require_once 'Includes/Nav.php' ;


?>
<DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

  
</head>
<body>
  
<div class="container mt-5">
<div align="center">
   <img src="css/assets/images/login1.svg" alt="logo" style="height:200px; width:280px; " />
</div>
  <div class="row my-4">
    <div class="col-md-6 mx-auto">
      
         <?php include('./Views/Includes/Alerts.php'); ?>

         <div class="card-header" style="align-content: center;">
      
           <h3 style="text-align:center;">Connexion</h3>
         </div>
         <div class="card-body bg-light">
           <form method="post" class="mr-1">
            <div class="form-groupe">
              <label for="login">Login</label>
                
                               <i class="fa fa-key"></i>
                             <small  style="color: red">*</small>
               
              <input type="text" name="login" class="form-control" placeholder="Pseudo" autofocus>
            </div>
               <div class="form-groupe">
              <label for="password">Pseudo</label>
                
                             <i class="fa fa-key"></i>
                             <small style="color: red">*</small>
                 
              <input type="password" name="password" class="form-control" placeholder="mot de passe">
            </div>
            <button type="submit" class="btn btn-sm btn btn-primary mt-3" name="submit">Connexion</button>
        
        </form>
           
         </div>
           <div class="card-footer">
           <a href="<?php echo BASE_URL ;  ?>register" class="btn btn-link">Mot de passe oubliez ?</a>
         </div>
    </div>
  </div>
</div>
</body>
</html>