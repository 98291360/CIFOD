<?php 
require_once 'Security.php';
require_once 'Includes/Constants.php' ;
  $title = "Encadreurs/Liste";?>
    
    <title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>



<?php 



//recuperer le nombre d'enregistrement
$count = DB::connect()->prepare("SELECT count(*) as nbr_encadreur from encadreurs");
$count-> setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount = $count->fetchAll();



        
$data = new EncadreursController();
$encadreurs = $data -> getAllEncadreurs();
    
require_once 'Includes/Nav.php' ;
?>

<section class="pt-5 ">
  <div class="container">
    <div class="row">
        <div class="col-md-12  ">
            <?php include('./Views/Includes/Alerts.php'); ?>
          <div class="card">

          <div class="card-header">
                <h3>Liste des Encadreurs</h3>
             </div>

        <div class="card-body bg-light">
            
            <?php if ($_SESSION['login']==='Administrateur') {
                echo '  <a href="Add " class="btn btn-sm btn-primary mr-2 mb-2">
            <i class="fa fa-plus"></i>
            </a>';
            } ?>
            
           
               
                   <a href="<?php echo BASE_URL ;?>Encadreurs " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>

         <?php if ($_SESSION['login']==='Administrateur') {
             echo '  <a href="Print" class="btn btn-success btn-sm btn-icon-text border ml-3  mr-2 mb-2">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Sauvegarder </a>' ;
         }  ?>

          

            <div align="right"  >
            <form method="post" >
                 
                <input type="text" class="" name="search" placeholder="Recherche" style="height: 35px;">
                <button class="btn btn-info btn-sm ml-1" name="find" type="submit">
                    <i class="fa fa-search "></i> </button>
                
            </form>
            
        </div>

            <div><?php echo $tcount[0]["nbr_encadreur"]; ?> Enregistrements au Total</div>
        </div>

                  <table class="table-bordered " style="text-align: center;" >
                <thead>
                    <tr>
                         <th scope="col">Matricule</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">DateDebut</th>
                         <th scope="col">SalaireMensuel</th>
                        <th scope="col">Centre</th>
                        <th scope="col">Statut</th>
                           <?php if ($_SESSION['login']==='Administrateur') {
                echo '  <th scope="col">Action</th>';
            } ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($encadreurs as $encadreur):?>
                        <tr>
                            <th> <?php echo $encadreur['matricule'] ;?> </th>
                            <th scope="row"> <?php echo $encadreur['nom'] ;?> </th>
                             <th scope="row"> <?php echo $encadreur['prenom'] ;?> </th>
                             <td> <?php echo $encadreur['adresse']; ?></td>
                               <td> <?php echo $encadreur['telephone']; ?></td>
                                 <td> <?php echo $encadreur['date_debut']; ?></td>
                                   <td> <?php echo $encadreur['salaire']; ?></td>
                                     <td> <?php echo $encadreur['centre']; ?></td>
                                     
                                     <td> 
                                      <?php if ($encadreur['statut'] == 1)  {
                                              echo 
                                       '<div class="btn btn-success mt-3">Active </div>';
                                      }else{
                                        echo'<div class="btn btn-danger mt-3">Resilier </div>';
                                      }
             
                                       ?>
                                           
                                     </td>

                        
                             <td class="d-flex " style="padding-top: 1.6em;">
                <form action="Update" method="post" class="mr-1" >
                 <input type="hidden" name="id_encadreurs" value="<?php echo $encadreur['id_encadreurs']; ?> ">
                 <button class="btn btn-sm btn-warning me-1"> 
                 <i class="fa fa-edit"
                      style="color:green;"></i> 
                    </button>
                </form>
            
                <form action="Delete" method="post" class="mr-1" >
                 <input type="hidden" name="id_encadreurs" value="<?php echo $encadreur['id_encadreurs']; ?> " onclick="return confirm('Confirmer la suppression!')" class="Supprimer">
                 <button class="btn btn-sm btn-warning"> 
                 <i class="fa fa- fa-trash-o"
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


        <script>
  $(document).ready(function(){
    $(".Supprimer").click(function(){
        if(!confirm("Vous voulez terminé cette suppression")){
          return false;
        }
    });




  });
</script>
<?php require_once 'Includes/Footer.php' ; ?>