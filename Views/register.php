<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
  $title = "Utilisateurs/Ajout";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

<?php 

require_once './Controllers/RegisterController.php';
require_once './Database/db.php';
require_once 'Includes/Nav.php' ;
?>

<?php 

if (isset($_POST['register'])) {
  $newUser = new UsersController();
   $newUser -> addUsers();
}

$data = new ProfileController();
$profiles = $data -> getAllProfile();
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
           <h3 style="text-align:center">Création Compte</h3>
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
                 <div class="form-groupe">
              <label for="password">Rôle</label>
                 
                             
                             <small style="color: red">*</small>
                
                <select class="form-control" name="id_profile">
                            <option>-------selectionnez-----------</option>
                             <?php foreach ($profiles as $profile):?>
                            <option value="<?php echo $profile['id_profile'] ;?>"><?php echo $profile['libelle_profile'] ;?></option>
                           <?php endforeach ;?>
                             
              </select>
            </div>
            <button type="submit" class="btn btn-sm btn btn-primary mt-3" name="register" class="fa fa-trash">Enregistrer</button>
        
        </form>
           
         
    </div>
  </div>
</div>
</body>
</html>