
<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
  $title = "Profiles/Ajout";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

<?php 


if (isset($_POST['submit'])) {
  $newProfile = new ProfileController();
$newProfile -> AddProfile();
}

$data = new ActionController();
$actions = $data -> getAllActions();
?>

<section>
  <div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto ">
          <div class="card">
             <div class="card-header">
            
                <h3 class="text-center  mt-4">Nouveau Profile</h3>
                   <a href="<?php echo BASE_URL ;?>Profiles " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>
             </div>
          
            <div class="card-body bg-light">
             
         <form id="ajoutform"   method="post"  autocomplete="off" onsubmit="return Mydocs()" class="ajoutform">
                         <!--Matricule field-->
                        <div class="form-groupe">

                            <label for="libelle_profile">LibelleProfile:</label>
                            

                            <input type="text" name="libelle_profile" class="form-control" id="libelle_profile"  value="" placeholder="" >                        
                        </div>

                          <div class="form-groupe" >
                             <label for="centre" >Action:</label>
                           <select class="form-control" name="id_action">
                             <option>-------selectionnez-----------</option>
                            <?php foreach ($actions as $action):?>
                           
                            <option value="<?php echo $action['id_action'];?> "><?php echo $action['libelle_action'] ;?></option>
                             <?php endforeach; ?>
                             
                           </select>
                           </div>


                      

                           <div class="form-groupe pt-3">
                             <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                           </div>

                
                     
                    </form>                
            </div>
              
          </div>
            
        </div>
        
    </div>
    
</div>
</section>