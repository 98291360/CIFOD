<?php
require_once 'Security.php';
 require_once 'Includes/Constants.php' ;
  $title = "Utilisateurs/Modification";?>
    
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

if (isset($_POST['register'])) {
  $newUser = new UsersController();
   $newUser -> addUsers();
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
  <div class="row my-4">
    <div class="col-md-6 mx-auto">
         <?php include('./Views/Includes/Alerts.php'); ?>
         <div class="card-header">
           <h3 style="text-align:center">Modification</h3>
         </div>

         <div class="card-body bg-light">
            <form method="post" class="mr-1">
            <div class="form-groupe">
              <label for="fullname">Nom & Prenom</label>
                
                               <i class="fa fa-male"></i>
                             <small style="color: red">*</small>
                
              <input required type="text" name="fullname" class="form-control" placeholder="fullname" autofocus>
            </div>
            <div class="form-groupe">
              <label for="login">Login</label>
             
                               <i class="fa fa-key"></i>
                             <small style="color: red">*</small>
                
              <input type="text" name="login" class="form-control" placeholder="Pseudo" >
            </div>
               <div class="form-groupe">
              <label for="password">Mot de passe</label>
                 
                             <i class="fa fa-key"></i>
                             <small style="color: red">*</small>
                
              <input type="password" name="password" class="form-control" placeholder="mot de passe">
            </div>
              <div class="form-groupe">
              <label for="email">Email</label>
             
                               <i class="fa fa-envelope-o"></i>
                             <small style="color: red">*</small>
                
              <input type="text" name="email" class="form-control" placeholder="Email" >
            </div>
              <div class="form-groupe">
              <label for="telephone">Telephone</label>
             
                               <i class="fa fa-phone-square"></i>
                             <small style="color: red">*</small>
                
              <input type="text" name="telephone" class="form-control" placeholder="Telephone" >
            </div>
              <div class="form-groupe">
              <label for="adresse">Adresse</label>
             
                               <i class="fa fa-map-marker"></i>
                             <small style="color: red">*</small>
                
              <input type="text" name="adresse" class="form-control" placeholder="Adresse" >
            </div>
              <div class="form-groupe">
              <label for="description">Description</label>
             
                               <i class="fa fa-file-text"></i>
                             <small style="color: red">*</small>
                
              <input type="text" name="description" class="form-control" placeholder="" style="width: 500px; height: 150px;" autofocus>
            </div>
            <button type="submit" class="btn btn-sm btn btn-primary mt-3" name="register" class="fa fa-trash">Enregistrement</button>
        
        </form>
           
         </div>
         <div class="card-footer">
           <a href="<?php echo BASE_URL ; ?>login" class="btn btn-link">Connexion</a>
         </div>
    </div>
  </div>
</div>
</body>
</html>