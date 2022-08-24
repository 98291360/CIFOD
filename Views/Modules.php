
<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
  $title = "Actions/Liste";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>


<?php 
require_once 'Includes/Nav.php' ;
if (isset($_POST['find'])) {
    $data = new ModuleController();
    $modules = $data->findModule();

}    else{
        
$data = new ModuleController();
$modules = $data -> getAllModules();
    }


 ?>

<section class="pt-5 ">
  <div class="container">
    <div class="row">
        <div class="col-md-12  ">
            <?php include('./Views/Includes/Alerts.php'); ?>
          <div class="card">

          <div class="card-header">
                <h3>Liste des Modules</h3>
             </div>

        <div class="card-body bg-light">
            
              <a href="<?php echo BASE_URL ;?>AddModule " class="btn btn-sm btn-primary mr-2 mb-2">
            <i class="fa fa-plus"></i>
            </a>
           
               
                   <a href="<?php echo BASE_URL ;?>Modules " class="btn btn-sm btn-secondary mr-2 mb-2">
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
                        <th scope="col">Nom du Module</th>
                         <th scope="col">Description</th>
                          <th scope="col">Profile</th>
                            <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modules as $module):?>
                        <tr>
                            <th> <?php echo $module['id_module'] ;?> </th>
                            <th> <?php echo $module['libelle_module'] ;?> </th>
                            <th> <?php echo $module['description'] ;?> </th>
                            <th> <?php echo $module['id_profile'] ;?> </th> 
                            <td> 
                                      <?php if ($module['statut'] == 1)  {
                                              echo 
                                       '<div class="btn btn-success mt-3">Activé </div>';
                                      }else{
                                        echo'<div class="btn btn-danger mt-3">Désactivé </div>';
                                      }
             
                                       ?>
                                           
                            </td> 

              <td class="d-flex justify-content-center  " style="padding-top: 1.6em;">
                <form action="UpdateModule" method="post" class="mr-1" >
                 <input type="hidden" name="id_module" value="<?php echo $module['id_module']; ?> ">
                 <button class="btn btn-sm btn-warning me-1"> 
                 <i class="fa fa-edit"
                      style="color:green;"></i> 
                    </button>
                </form>
            
                <form action="DeleteModule" method="post" class="mr-1" >
                 <input type="hidden" name="id_module" value="<?php echo $module['id_module']; ?> " onclick="return confirm('Confirmer la suppression!')" class="Supprimer">
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