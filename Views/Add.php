<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;

  $title = "Encadreurs/Ajout";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

<?php 


if (isset($_POST['submit'])) {
  $newEncadreur = new EncadreursController();
$newEncadreur -> addEncadreur();
}
require_once 'Includes/Nav.php' ;
?>

<section>
  <div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto ">
          <div class="card">
             <div class="card-header">
         
                <h3 class="text-center  mt-4">Ajoutter un Encadreur</h3>
                   <a href="<?php echo BASE_URL ;?>Encadreurs " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>
             </div>
             
          
            <div class="card-body bg-light">
             
         <form id="ajoutform"   method="post"  autocomplete="off" onsubmit="return Mydocs()" class="ajoutform">
                         <!--Matricule field-->
                        <div class="form-groupe">

                            <label for="nom">Matricule:</label>
                            

                            <input type="text" name="matricule" class="form-control" id="matricule"  value="" placeholder="" >                        
                        </div>


                        <!--Name field-->
                        <div class="form-groupe">

                            <label for="nom">Nom:</label>
                            

                            <input type="text" name="nom" class="form-control" id="nom"  value="" placeholder="">                        
                        </div>


                            <!--prenom field-->
                        <div class="form-groupe">
                            <label for="prenom" >Prenom:</label>
                            
                            <input type="text" name="prenom" class="form-control" id="prenom"  value="" placeholder=" ">
                        </div>


                              <!--Adresse field-->
                        <div class="form-groupe">
                            <label for="adresse" >Adresse:</label>
                           
                              
                            <input type="text" name="adresse" class="form-control" id="adresse" value="" placeholder="   "> </div>

                           <!--Tel field-->
                        <div class="form-groupe">
                            <label for="telephone" >Telephone:</label>
                          
                            <input type="text" name="telephone"  class="form-control" id="telephone" value=""placeholder=" " >
                        </div>

                        

                              
                            <!--Date field-->
                        <div class="form-groupe">
                            <label for="date_debut" >Date Embauche:</label>
                            
                            <input type="date" name="date_debut" class="form-control" id="date_debut" placeholder=" " value="">
                        </div>

                           <!--salaire field-->
                        <div class="form-groupe">
                            <label for="salaire" >Salaire Mensuel:</label>
                             
                            <input type="text" name="salaire" class="form-control" id="salaire"  value="" placeholder="   " > </div>

                                <!--centre field-->
                        <div class="form-groupe">
                            <label for="centre" >Centre:</label>
                          
                            <input type="text" name="centre" class="form-control" id="centre"  value="" placeholder="   "> </div>


                           <!--statut field-->
                        <div class="form-groupe" >
                             <label for="centre" >Statut:</label>
                           <select class="form-control" name="statut">
                            <option>-------selectionnez-----------</option>
                            <option value="1">Active</option>
                            <option value="0">Résilier</option>
                             
                           </select>
                           </div>

                           <div class="form-groupe pt-3">
                             <button type="submit" class="btn btn-primary" name="submit">Valider</button>
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

<script>

    //Contrôle formulaire
    $(document).ready( function() {
        /*method regex qui permet de controler la saisie des lettres uniquement au niveau du nom */
        var nameregex = /^[a-zA-Zéèàêçîâôï0-9 ]+$/;
        $.validator.addMethod("validname", function(value, element) {
            return this.optional(element) || nameregex.test(value);
        });
        // valid email pattern
        var mailregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $.validator.addMethod("validemail", function(value, element) {
            return this.optional(element) || mailregex.test(value);
        });
        // Validation du formulaire
        $("#ajoutform").validate({
            rules: {


                matricule: {
                    required: true,
                    validname: true,
                    minlength: 4,
                },

                nom: {
                    required: true,
                    validname: true,
                    minlength: 4,
                },
                prenom: {
                    required: true,
                    validname: true,
                    minlength: 4,
                },
              
                adresse: {
                    required: true,
                    minlength: 6
                },
                telephone: {
                    required: true,
                    number: true,
                    minlength: 8,
                    maxlength: 8

                },

                nom: {
                    required: true,
                    validname: true,
                    minlength: 4,
                },

               
            },
            messages: {
                nom: {
                    required: "Ce champ est obligatoire",
                    validname: "Chiffre, Lettre et caratère spéciaux :éèàêçîâôï ",
                    minlength: "Entrez au moins 4 caractères"
                },
                prenom: {
                    required: "Ce champ est obligatoire",
                    validname: "Chiffre, Lettre et caratère spéciaux :éèàêçîâôï ",
                    minlength: "Entrez au moins 4 caractères"
                },
               
                adresse: {
                    required: "Ce champ est obligatoire",
                    minlength: "Ce champ doit contenir au minimum 6 caractères"
                },
                telephone: {
                    required: "Ce champ est obligatoire",
                    number: "Entrez un numéro de téléphone valide",
                    minlength: "Le numéro doit être de 8 chiffres",
                    maxlength: "Le numéro ne doit pas dépassé 8 chiffres"
                },
                

            }
        });
    })
</script>
<?php require_once 'Includes/Footer.php' ; ?>