<?php 
require_once './Models/Module.php';
class ModuleController{
	
	public function getAllModules(){
		$modules = Module::getAll();
		return $modules;
	}
	public function getOneModule(){
		if (isset($_POST['id_module'])) {
			$data = array(
             'id_module' => $_POST['id_module']
			);
			$module = Module::getModule($data);
        return $module;
		}
        
	}

	//find function
	public function findModule(){
		if (isset($_POST['search'])) {
		  $data = array('search' => $_POST['search']);
		}

		$module = Action::searchAction($data);
		return $module;
	}
//Add function
	public function AddModule(){
		if (isset($_POST['submit'])) {
			$data = array(
				'libelle_module'=> $_POST['libelle_module'],
				'description'=> $_POST['description'],
				'id_profile'=> $_POST['id_profile'],
			);
			
			$result = Module::Add($data);
			if ($result === 'ok') {
					Session::set('success', 'Module ajouter avec succès!');
				Redirect::to('Modules');
			}else{
				echo $result;
			}
		}
	}
//Update function
		public function UpdateModule(){
		if (isset($_POST['submit'])) {
			$data = array(
			'id_module' => $_POST['id_module'],
				'libelle_module' => $_POST['libelle_module'],
					'description' => $_POST['description'],
						'id_profile' => $_POST['id_profile'],
                 
			);
			
			$result = Module::Update($data);
			if ($result === 'ok') {
					Session::set('success', 'Module modifier avec succès!');
				Redirect::to('Modules');
			}else{
				echo $result;
			}
		}
	}


	//Delete function

	public function DeleteModule(){
		if (isset($_POST['id_module'])) {
			$data['id_module'] = $_POST['id_module'];
			$result = Module::Delete($data);
			if ($result === 'ok') {
					Session::set('success', 'Suppresion effectuer avec succès!');
				Redirect::to('Modules');
			}else{
				echo $result;
			}
		}
	}
              
}
?>