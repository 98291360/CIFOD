<?php 

class EncadreursController{
	
	public function getAllEncadreurs(){
		$encadreurs = Encadreur::getAll();
		return $encadreurs;
	}
	public function getOneEncadreur(){
		if (isset($_POST['id_encadreurs'])) {
			$data = array(
             'id_encadreurs' => $_POST['id_encadreurs']
			);
			$encadreur = Encadreur::getEncadreur($data);
        return $encadreur;
		}
        
	}

	//find encadreur
	public function findEncadreurs(){
		if (isset($_POST['search'])) {
		  $data = array('search' => $_POST['search']);
		}

		$encadreur = Encadreur::searchEncadreur($data);
		return $encadreur;
	}
//Add function
	public function addEncadreur(){
		if (isset($_POST['submit'])) {
			$data = array(
				'matricule'=> $_POST['matricule'],
                  'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                      'adresse' => $_POST['adresse'],
                        'telephone' => $_POST['telephone'],
                            'date_debut' => $_POST['date_debut'],
                              'salaire' => $_POST['salaire'],
                                'centre' => $_POST['centre'],
                                  'statut' => $_POST['statut']
			);
			
			$result = Encadreur::add($data);
			if ($result === 'ok') {
					Session::set('success', 'Encadreur ajouter avec succès!');
				Redirect::to('Homme');
			}else{
				echo $result;
			}
		}
	}
//Update function
		public function updateEncadreur(){
		if (isset($_POST['submit'])) {
			$data = array(
			'id_encadreurs' => $_POST['id_encadreurs'],
				'matricule'=> $_POST['matricule'],
                  'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                      'adresse' => $_POST['adresse'],
                        'telephone' => $_POST['telephone'],
                            'date_debut' => $_POST['date_debut'],
                              'salaire' => $_POST['salaire'],
                                'centre' => $_POST['centre'],
                                  'statut' => $_POST['statut'],

			);
		
			$result = Encadreur::update($data);
			if ($result === 'ok') {
					Session::set('success', 'Encadreur modifier avec succès!');
				Redirect::to('Encadreurs');
			}else{
				echo $result;
			}
		}
	}

	//Encadreur Delete

	public function deleteEncadreur(){
		if (isset($_POST['id_encadreurs'])) {
			$data['id_encadreurs'] = $_POST['id_encadreurs'];
			$result = Encadreur::delete($data);
			if ($result === 'ok') {
					Session::set('success', 'Suppresionn effectuer avec succès!');
				Redirect::to('Encadreurs');
			}else{
				echo $result;
			}
		}
	}
              
}
?>