<?php 
require_once 'Security.php';
require_once 'Includes/Nav.php' ;
 require_once 'Includes/Constants.php' ;
 ?>
   <?php $title = "Utilisateurs/Profile";?>

   <?php 
    $data = new UsersController();
     $user = $data -> getAllAuth()

    ?>
	
	<title>  <?= isset($title)
    ? WEBSITE_NAME.'/'.$title 
            : WEBSITE_NAME;
        ?></title>

    <div class="container-fluid px-2 px-md-4">
      
      <div class="card card-body mx-3 mx-md-4 mt-n6 ">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
             <i class=" mdi mdi-account-circle text-success "  ></i>
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                    <?php echo $_SESSION['login'];?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
              <?php echo $user->fullname ;?> 
              </p>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4 ml-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Paramèttre</h6>
                </div>
                <div class="card-body p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder">Actions</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" >
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault">Email me when someone follows me</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                      </div>
                    </li>
                  </ul>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Mot de passe</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault3">New launches and projects</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault4">Monthly product updates</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0 ml-5" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center mt-0">
                      <h6 class="mb-0"> Information sur le Profile</h6>
                    </div>

              <div class="col-md-4 text-end">
                   <h6 class="mb-0 mt-4">Modification</h6>
                 <form action="userUpdate" method="post" class="mr-1" >
                 <input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?> ">
                 <button class="btn btn-sm btn-warning me-1"> 
                 <i class="mdi mdi-account-edit"
                      style="color:green;"></i> 
                  </button>
                </form>
              </div>

                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    <?php echo $user->description ;?>
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp   <?php echo $user->fullname ;?> </li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp;  <?php echo $user->telephone ;?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;  <?php echo $user->email ;?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp;  <?php echo $user->adresse ;?></li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fa fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fa fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fa fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
       
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>




<?php require_once 'Includes/Footer.php' ; ?>