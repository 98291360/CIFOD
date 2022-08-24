<?php 
require_once './Models/Profile.php';
class ProfileController{
	
	public function getAllProfile(){
		$profiles = Profile::getAll();
		return $profiles;
	}
	public function getOneProfile(){
		if (isset($_POST['id_profile'])) {
			$data = array(
             'id_profile' => $_POST['id_profile']
			);
			$profile = Profile::getProfile($data);
        return $profile;
		}
        
	}

	//find function
	public function findProfile(){
		if (isset($_POST['search'])) {
		  $data = array('search' => $_POST['search']);
		}

		$action = Profile::searchProfile($data);
		return $action;
	}
//Add function
	public function AddProfile(){
		if (isset($_POST['submit'])) {
			$data = array(
				'libelle_profile'=> $_POST['libelle_profile'],
				'id_action'=> $_POST['id_action'],
			);
			
			$result = Profile::Add($data);
			if ($result === 'ok') {
					Session::set('success', 'Profile ajouter avec succès!');
				Redirect::to('Profiles');
			}else{
				echo $result;
			}
		}
	}
//Update function
		public function UpdateProfile(){
		if (isset($_POST['submit'])) {
			
			$data = array(
			'id_profile' => $_POST['id_profile'],
				'libelle_action'=> $_POST['libelle_action'],
				'id_action' => $_POST['id_action'],

			);
			var_dump($data);exit();
			$result = Action::Update($data);
			if ($result === 'ok') {
					Session::set('success', 'Profile modifier avec succès!');
				Redirect::to('Profiles');
			}else{
				echo $result;
			}
		}
	}

	//Delete function

	public function DeleteProfile(){
		if (isset($_POST['id_profile'])) {
			$data['id_profile'] = $_POST['id_profile'];
			$result = Profile::Delete($data);
			if ($result === 'ok') {
					Session::set('success', 'Suppresion effectuer avec succès!');
				Redirect::to('Profiles');
			}else{
				echo $result;
			}
		}
	}

		public function getAllModule(){
		$data['id_profile'] = $_SESSION['id_profile'];
		$Auth = Profile::getProfileModule($data);
		return $Auth;
	}
              
}
?>