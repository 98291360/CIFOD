
<?php 



class Module{
static public function getAll(){
 

	$stmt = DB::connect()->prepare('SELECT * from modules ');
      
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}

static public function getModule($data){
	$id_module = $data['id_module'];
	try {
		$query = ('SELECT * FROM modules where id_module = :id_module');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_module" => $id_module));
			$module = $stmt->fetch(PDO::FETCH_OBJ);
			return $module;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
}
//Add function
static public function Add($data){
		$stmt = DB::connect()->prepare("INSERT INTO modules (libelle_module,description,id_profile) VALUES(:libelle_module,:description,:id_profile)");
		$stmt->bindParam(':libelle_module', $data['libelle_module']);
		$stmt->bindParam(':description', $data['description']);
		$stmt->bindParam(':id_profile', $data['id_profile']);
		
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
		$stmt = DB::connect()->prepare('UPDATE modules SET libelle_module= :libelle_module, description=:description, id_profile= :id_profile WHERE id_module= :id_module');
          

		$stmt->bindParam(':id_module', $data['id_module']);
		$stmt->bindParam(':libelle_module', $data['libelle_module']);
		$stmt->bindParam(':description', $data['description']);
		$stmt->bindParam(':id_profile', $data['id_profile']);

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
		$id_module = $data['id_module'];
			try {
		$query = ('DELETE FROM modules where id_module = :id_module');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_module" => $id_module));
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
		$query = ('SELECT * FROM modules where libelle_module LIKE ? ');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%'));
		 $action =$stmt-> fetchAll();
		 return $action;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
	}

}