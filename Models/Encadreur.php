<?php 



class Encadreur{
static public function getAll(){
 

	$stmt = DB::connect()->prepare('SELECT * from encadreurs ');
      
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}

static public function getEncadreur($data){
	$id_encadreurs = $data['id_encadreurs'];
	try {
		$query = ('SELECT * FROM encadreurs where id_encadreurs = :id_encadreurs');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_encadreurs" => $id_encadreurs));
			$encadreur = $stmt->fetch(PDO::FETCH_OBJ);
			return $encadreur;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
}
//Add function
static public function add($data){
		$stmt = DB::connect()->prepare("INSERT INTO encadreurs (matricule,nom, prenom, adresse, telephone, date_debut, salaire, centre, statut ) VALUES(:matricule,:nom,:prenom,:adresse, :telephone, :date_debut, :salaire, :centre, :statut )
			");
		$stmt->bindParam(':matricule', $data['matricule']);
		$stmt->bindParam(':nom', $data['nom']);
		$stmt->bindParam(':prenom', $data['prenom']);
		$stmt->bindParam(':adresse', $data['adresse']);
		$stmt->bindParam(':telephone', $data['telephone']);
		$stmt->bindParam(':date_debut', $data['date_debut']);
		$stmt->bindParam(':salaire', $data['salaire']);
		$stmt->bindParam(':centre', $data['centre']);
		$stmt->bindParam(':statut', $data['statut']);

		if ($stmt->execute()) {
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}

//Update function
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE encadreurs SET matricule= :matricule,nom= :nom , prenom= :prenom, adresse= :adresse, telephone= :telephone , date_debut= :date_debut , salaire= :salaire, centre= :centre , statut=:statut WHERE id_encadreurs = :id_encadreurs' );


		$stmt->bindParam(':id_encadreurs', $data['id_encadreurs']);
		$stmt->bindParam(':matricule', $data['matricule']);
		$stmt->bindParam(':nom', $data['nom']);
		$stmt->bindParam(':prenom', $data['prenom']);
		$stmt->bindParam(':adresse', $data['adresse']);
		$stmt->bindParam(':telephone', $data['telephone']);
		$stmt->bindParam(':date_debut', $data['date_debut']);
		$stmt->bindParam(':salaire', $data['salaire']);
		$stmt->bindParam(':centre', $data['centre']);
		$stmt->bindParam(':statut', $data['statut']);

		if ($stmt->execute()) {
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}

	//Delete function

	static public function delete($data){
		$id_encadreurs = $data['id_encadreurs'];
			try {
		$query = ('DELETE FROM encadreurs where id_encadreurs = :id_encadreurs');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_encadreurs" => $id_encadreurs));
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}

	static public function searchEncadreur($data){
		$search = $data['search'];
			try {
		$query = ('SELECT * FROM encadreurs where matricule LIKE ? OR nom LIKE ? OR prenom LIKE ? OR adresse LIKE ? OR date_debut LIKE ? OR salaire LIKE ? OR centre LIKE ? OR statut LIKE ?');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%'));
		 $encadreur =$stmt-> fetchAll();
		 return $encadreur;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
	}

}