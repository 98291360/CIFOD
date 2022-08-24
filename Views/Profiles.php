
<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
require_once 'Includes/Nav.php' ;
  $title = "Profiles/Liste";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>


<?php 

if (isset($_POST['find'])) {
    $data = new ProfileController();
    $profiles = $data->findProfile();

}    else{
        
$data = new ProfileController();
$profiles = $data -> getAllProfile();
    }

$data = new ActionController();
$actions = $data -> getAllActions();
 ?>

<section class="pt-5 ">
  <div class="container">
    <div class="row">
        <div class="col-md-12  ">
            <?php include('./Views/Includes/Alerts.php'); ?>
          <div class="card">

          <div class="card-header">
                <h3>Liste des Profiles</h3>
             </div>

        <div class="card-body bg-light">
            
              <a href="<?php echo BASE_URL ;?>AddProfile " class="btn btn-sm btn-primary mr-2 mb-2">
            <i class="fa fa-plus"></i>
            </a>
           
               
                   <a href="<?php echo BASE_URL ;?>Profiles " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>

          

            <div align="right"  >
            <form method="post" >
                 
                <input type="text" class="" name="search" placeholder="Recherche" style="height: 35px;">
                <button class="btn btn-info btn-sm ml-1" name="find" type="submit">
                    <i class="fa fa-search "></i> </button>
                
            </form>
            
        </div>

          
        </div>

                  <table class="table-bordered " style="text-align: center;" >
                <thead>
                    <tr>
                         <th scope="col">#</th>
                        <th scope="col">LibelleProfile</th>
                        <th scope="col">LibelleAction</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profiles as $profile):?>
                        <tr>
                             <th> <?php echo $profile['id_profile'] ;?> </th>
                            <th> <?php echo $profile['libelle_profile'] ;?> </th>
                            <th> <?php echo $profile['id_action'] ;?> </th>
                         
                                     
                                

                                     
              <td class="d-flex justify-content-center  " style="padding-top: 1.6em;">
                <form action="UpdateProfile" method="post" class="mr-1" >
                 <input type="hidden" name="id_profile" value="<?php echo $profile['id_profile']; ?> ">
                 <button class="btn btn-sm btn-warning me-1"> 
                 <i class="fa fa-edit"
                      style="color:green;"></i> 
                    </button>
                </form>
            
                <form action="DeleteProfile" method="post" class="mr-1" >
                 <input type="hidden" name="id_profile" value="<?php echo $profile['id_profile']; ?> " onclick="return confirm('Confirmer la suppression!')" class="Supprimer">
                 <button class="btn btn-sm btn-warning"> 
                 <i class="fa  fa-trash-o"
                      style="color: red;"></i>
                    </button> 
                </form>
                
              </td>
               
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
         
              
          </div>
            
        </div>
        
    </div>
    
</div>
</section>