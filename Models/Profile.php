<?php 



class Profile{
static public function getAll(){
 

	$stmt = DB::connect()->prepare('SELECT * from profiles ');
      
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}

static public function getProfile($data){
	$id_profile = $data['id_profile'];
	try {
		$query = ('SELECT * FROM profiles where id_profile = :id_profile');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_profile" => $id_profile));
			$action = $stmt->fetch(PDO::FETCH_OBJ);
			return $action;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
}

static public function getProfileModule($data){
	$id_profile = $data['id_profile'];
	try {
		$query = ('SELECT * FROM modules where id_profile = :id_profile AND statut = 1');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_profile" => $id_profile));
			$module = $stmt->fetchAll();
			return $module;
			$stmt->close();
			$stmt = null;

	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
}

//Add function
static public function Add($data){
		$stmt = DB::connect()->prepare("INSERT INTO profiles (libelle_profile,id_action) VALUES(:libelle_profile, :id_action)");
		
		$stmt->bindParam(':libelle_profile', $data['libelle_profile']);
		$stmt->bindParam(':id_action', $data['id_action']);
		
		if ($stmt->execute()) {
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}
//Update function
	static public function Update($data){
		$stmt = DB::connect()->prepare('UPDATE profiles SET libelle_profile= :libelle_profile, id_action= :id_action WHERE id_profile= :id_profile');
        
        $stmt->bindParam(':id_profile', $data['id_profile']);
		$stmt->bindParam(':libelle_profile', $data['libelle_profile']);
		$stmt->bindParam(':id_action', $data['id_action']);

		if ($stmt->execute()) {
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}


	//Delete function

	static public function Delete($data){
		$id_profile = $data['id_profile'];
			try {
		$query = ('DELETE FROM profiles where id_profile = :id_profile');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_profile" => $id_profile));
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}

	static public function searchAction($data){
		$search = $data['search'];
			try {
		$query = ('SELECT * FROM profiles where libelle_profile LIKE ? ');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
		 $action =$stmt-> fetchAll();
		 return $action;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
	}

}