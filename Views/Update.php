<?php
require_once 'Security.php';
 require_once 'Includes/Constants.php' ;
  $title = "Encadreurs/Modification";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

<?php 



if (isset($_POST['id_encadreurs'])) {
  $exitEncadreur = new EncadreursController();
  $encadreur = $exitEncadreur -> getOneEncadreur();
}else{
    Redirect::to('Encadreurs');
}

if (isset($_POST['submit'])) {
  $exitEncadreur = new EncadreursController();
$exitEncadreur -> updateEncadreur();
}

?>

<section>
  <div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto ">
          <div class="card">
             <div class="card-header">
            
                <h3 class="text-center  mt-4">Modifier un Encadreur</h3>
                   <a href="<?php echo BASE_URL ;?>Encadreurs " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>
             </div>
          
            <div class="card-body bg-light">
             
         <form name="Myform"  method="post"  autocomplete="off" onsubmit="return Mydocs()" class="Mydocs">
                         <!--Matricule field-->
                        <div class="form-groupe">

                            <label for="matricule">Matricule:</label>
                            

                            <input type="text" name="matricule" class="form-control" id="matricule"  value="<?php echo $encadreur->matricule ;?>" >                        
                        </div>


                        <!--Name field-->
                        <div class="form-groupe">

                            <label for="nom">Nom:</label>
                            

                            <input type="text" name="nom" class="form-control" id="nom"  value="<?php echo $encadreur->nom; ?>">                        
                        </div>


                            <!--prenom field-->
                        <div class="form-groupe">
                            <label for="prenom" >Prenom:</label>
                            
                            <input type="text" name="prenom" class="form-control" id="prenom"  value="<?php echo $encadreur->prenom; ?>">
                        </div>


                              <!--Adresse field-->
                        <div class="form-groupe">
                            <label for="adresse" >Adresse:</label>
                           
                              
                            <input type="text" name="adresse" class="form-control" id="adresse" value="<?php echo $encadreur->adresse; ?>" > </div>

                           <!--Tel field-->
                        <div class="form-groupe">
                            <label for="telephone" >Telephone:</label>
                          
                            <input type="text" name="telephone"  class="form-control" id="telephone" value="<?php echo $encadreur->telephone; ?>" >
                        </div>

                        

                              
                            <!--Date field-->
                        <div class="form-groupe">
                            <label for="date_debut" >Date Embauche:</label>
                            
                            <input type="date" name="date_debut" class="form-control" id="date_debut"  placeholder=" " value="<?php echo $encadreur->date_debut; ?>">
                        </div>

                           <!--salaire field-->
                        <div class="form-groupe">
                            <label for="salaire" >Salaire Mensuel:</label>
                             
                            <input type="text" name="salaire" class="form-control" id="salaire"  value="<?php echo $encadreur->salaire; ?>" >
                      <input type="hidden" name="id_encadreurs" class="form-control" id="id_encadreurs"  value="<?php echo $encadreur->id_encadreurs; ?>" >
                             </div>

                                <!--centre field-->
                        <div class="form-groupe">
                            <label for="centre" >Centre:</label>
                          
                 <input type="text" name="centre" class="form-control" id="centre"  value="<?php echo $encadreur->centre; ?>" > </div>


                           <!--statut field-->
                        <div class="form-groupe" >
                             <label for="centre" >Statut:</label>
                           <select class="form-control" name="statut">
                            <option value="1" <?php echo $encadreur->statut ? 'selected' : '';?> >Active</option>
                            <option value="0" <?php echo !$encadreur->statut ? 'selected' : '';?>  >Résilier</option>
                             
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

<script type="text/javascript">
    
    function Mydocs(){
        var matricule = document.forms["Myform"]["matricule"];
        var name = document.forms["Myform"]["nom"];
        var prenom = document.forms["Myform"]["prenom"];
        var telephone = document.forms["Myform"]["telephone"];
        var adresse =document.forms["Myform"]["adresse"];
        var date_debut = document.forms["Myform"]["date_debut"];
        var salaire =document.forms["Myform"]["salaire"];
        var centre = document.forms["Myform"]["centre"];
        var statut = document.forms["Myform"]["statut"];
        
         if (matricule.value == "") {
            alert("Mettez le matricule!");
            matricule.focus();
            return false;
        }

        if (name.value == "") {
            alert("Mettez le  nom!");
            name.focus();
            return false;
        }

         if (prenom.value == "") {
            alert("Mettez le prenom!");
            prenom.focus();
            return false;
        }

          if (adresse.value == "") {
            alert("Mettez l'adresse!");
            adresse.focus();
            return false;
        }

         if (telephone.value == "") {
            alert("Mettez le telephone!");
            telephone.focus();
            return false;
        }

       if (date_debut.value == "") {
            alert("Mettez la date!");
            date_debut.focus();
            return false;
        }
        

         if (salaire.value == "") {
            alert("Mettez le salaire!");
            salaire.focus();
            return false;
        }

         if (centre.value == "") {
            alert("Mettez le centre!");
            centre.focus();
            return false;
        }

         if (statut.value == "-------selectionnez-----------") {
            alert("Mettez le statut!");
            statut.focus();
            return false;
        }
        
       




        return true;
    }

</script>