<?php 



class User{

static public function login($data){
		$login = $data['login'];
			try {
		$query = ('SELECT * FROM users where login = :login');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":login" => $login));
			$user = $stmt ->fetch(PDO::FETCH_OBJ);
			return $user;
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}

static public function getAll(){
	$stmt = DB::connect()->prepare('SELECT * from users');
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}





static public function add($data){
		$stmt = DB::connect()->prepare("INSERT INTO users (fullname, login, password,email,telephone,adresse,description,id_profile ) VALUES(:fullname, :login, :password,:email,:telephone,:adresse,:description ,:id_profile )");
		$stmt->bindParam(':fullname', $data['fullname']);
		$stmt->bindParam(':login', $data['login']);
		$stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':email', $data['email']);
		$stmt->bindParam(':telephone', $data['telephone']);
		$stmt->bindParam(':adresse', $data['adresse']);
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


static public function update($data){
		$stmt = DB::connect()->prepare("UPDATE  users SET fullname=:fullname, login=:login, password=:password,email=:email,telephone=:telephone,adresse=:adresse,description=:adresse ,id_profile=:id_profile WHERE login = :login ");
		$stmt->bindParam(':id_user', $data['id_user']);
		$stmt->bindParam(':fullname', $data['fullname']);
		$stmt->bindParam(':login', $data['login']);
		$stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':email', $data['email']);
		$stmt->bindParam(':telephone', $data['telephone']);
		$stmt->bindParam(':adresse', $data['adresse']);
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
		$id_user = $data['id_user'];
			try {
		$query = ('DELETE FROM users where id_user = :id_profid_userile');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id_user" => $id_user));
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}

	static public function searchUser($data){
		$search = $data['search'];
			try {
		$query = ('SELECT * FROM users where fullname LIKE ? OR login LIKE ? OR email LIKE ? OR telephone LIKE ? OR adresse LIKE ?  ');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%'));
		 $action =$stmt-> fetchAll();
		 return $action;
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}
	}

	static public function PasswordForgot($data){
		$email = $data['email'];

			try {
		$query = ('SELECT * FROM users where  email = :email');

			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":email" => $email));
			$user = $stmt ->fetch(PDO::FETCH_OBJ);

			return $user;
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}



}