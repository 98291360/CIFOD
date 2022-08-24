<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
  $title = "Modules/Modification";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

<?php 



if (isset($_POST['id_module'])) {
  $exitModule = new ModuleController();
  $module = $exitModule -> getOneModule();
}else{
    Redirect::to('Modules');
}

if (isset($_POST['submit'])) {
  $exitModule = new ModuleController();
$exitModule -> UpdateModule();
}
require_once 'Includes/Nav.php' ;
?>

<section>
  <div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto ">
          <div class="card">
             <div class="card-header">
            
                <h3 class="text-center  mt-4">Modifier un Module</h3>
                   <a href="<?php echo BASE_URL ;?>Modules " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>
             </div>
          
            <div class="card-body bg-light">
             
         <form id="ajoutform"   method="post"  autocomplete="off" onsubmit="return Mydocs()" class="ajoutform">
                         <!--module name field-->
                        <div class="form-groupe">

                            <label for="libelle_module">Nom du Module:</label>
                            

                            <input type="text" name="libelle_module" class="form-control" id="libelle_module"  value="<?php echo $module->libelle_module ;?>" placeholder="" >                        
                        </div>
                          <!--description field-->
                        <div class="form-groupe">

                            <label for="description">Description du Module:</label>
                            

                            <input type="text" name="description" class="form-control" id="description"  value="<?php echo $module->description ;?>" placeholder="" >                        
                        </div>
                          <!--id_profile field-->
                        
                          <div class="form-groupe" >
                             <label for="centre" >Profile:</label>
                           <select class="form-control" name="id_profile">
                             <option>-------selectionnez-----------</option>
                            <?php foreach ($profiles as $profile):?>
                           
                           <option value="<?php echo $module->id_profile ; ?>" <?php echo $module->id_profile ? 'selected' : '';?> ><?php echo $profile['libelle_profile'] ;?></option>
                            
                             <?php endforeach; ?>
                             
                           </select>
                           </div>
                              <!--statut field-->
                        <div class="form-groupe" >
                             <label for="centre" >Statut:</label>
                           <select class="form-control" name="statut">
                            <option value="1" <?php echo $module->statut ? 'selected' : '';?> >Activé</option>
                            <option value="0" <?php echo !$module->statut ? 'selected' : '';?>  >Désactivé</option>
                             
                           </select>
                           </div>


                      

                           <div class="form-groupe pt-3">
                             <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
                           </div>

                
                     
                    </form>                
            </div>
              
          </div>
            
        </div>
        
    </div>
    
</div>
</section>
