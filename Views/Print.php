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


if (isset($_POST['find'])) {
    $data = new EncadreursController();
    $encadreurs = $data->findEncadreurs();

}    else{
        
$data = new EncadreursController();
$encadreurs = $data -> getAllEncadreurs();
    }
?>
<img src="css/assets/images/CIFOD1.svg" alt="logo" style="height:200px; width:280px; margin-top: 20px; margin-left:50px" />

<img src="css/assets/images/CIFOD1.svg" alt="logo" style="height:200px; width:280px; margin-top: 20px; margin-left: 910px;" />


<section class="pt-5 ">
  <div class="container">
    <div class="row">
        <div class="col-md-12  ">
          
          <div class="card">

          <div class="card-header">
                <h3>Liste des Encadreurs</h3>
             </div>

        <div class="card-body bg-light">
              
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
            
             
               
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
         
          </div>
            
               <div align="center"><button onclick="window.print()" class="btn btn-primary btn-sm btn-icon-text border mt-3 ">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Imprimer </button>
                   <a href="<?php echo BASE_URL ;?>Encadreurs" class="btn btn-danger btn-sm btn-icon-text border mt-3 ml-3">
                   Annuler </a></div>
        </div>
        
    </div>
    
</div>
</section>


        <script>
 




  
</script>
<?php require_once 'Includes/Footer.php' ; ?>