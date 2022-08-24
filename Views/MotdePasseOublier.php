<?php 

require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/Exception.php';
require_once 'Includes/Constants.php' ;
  $title = "Mot de passe oublier";?>
    
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
   $loginUser -> Password_Forgot();
}




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

         <div class="card-header" style="align-content: center;">
      
           <h3 style="text-align:center;">Mot de Passe Oublier</h3>
         </div>
         <div class="card-body bg-light">
           <form method="post" class="mr-1">
            <div class="form-groupe">
              <label for="email">Email</label>
                
                             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <input type="text" name="email" class="form-control" placeholder="Entrez l'Email" autofocus>
            </div>
           
            <button type="submit" class="btn btn-sm btn btn-primary mt-3" name="submit">Envoyer</button>
        
        </form>
           
         </div>
           <div class="card-footer">
                 <a href="<?php echo BASE_URL ;  ?>login" class="btn btn-link">Connexion</a>
                   </div>
    </div>
  </div>
</div>

<p>
        <?php
        if (!empty($_POST)) {
            $point = strpos($_POST['email'], ".");
            $aroba = strpos($_POST['email'], "@");
            if ($point === false){
                echo 'Votre email doit comporter un point.';
            }else if ($aroba === false){
                echo 'Votre email doit comporter un arobase.';
              }
        } else {
            echo 'Veuillez saisir un email.';
        }
        
        ?>
        </p>

</body>
</html>