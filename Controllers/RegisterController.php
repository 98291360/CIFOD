<?php 

require_once './Models/Users.php';


require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/Exception.php';

class UsersController{

	public function auth(){
				if (isset($_POST['submit'])) {

			$data['login'] = $_POST['login'];
		

			$result = User::login($data);

			if ($result->login === $_POST['login'] && password_verify($_POST['password'], $result->password)) {
				var_dump($result);
				$_SESSION['logged'] = true;
				$_SESSION['login'] = $result->login;
				$_SESSION['id_profile'] = $result->id_profile;
				Redirect::to('Dashboard');

			}else{
					Session::set('error', 'Login ou password incorrect');
						Redirect::to('login');
			}
		}
	}
	
	public function getAllUsers(){
		$users = User::getAll();
		return $Users;
	}

	
	public function getAllAuth(){
		$data['login'] = $_SESSION['login'];
		$Users = User::login($data);
		return $Users;
	}

	public function addUsers(){
		if (isset($_POST['register'])) {
			$options = [
                 'cost' => 12
			];
       $password = password_hash("12345678", PASSWORD_BCRYPT, $options);

			$data = array(

                  'fullname' => $_POST['fullname'],
                      'login' => $_POST['login'],
                            'password' => $password,
                                'email' => $_POST['email'],
                                   'telephone' => $_POST['telephone'],
                                      'adresse' => $_POST['adresse'],
                                        'description' => $_POST['description'],
                                         'id_profile' => $_POST['id_profile'],
			);

			$result = User::add($data);
			if ($result === 'ok') {
				$mail = new PHPMailer();
try {
	
				$mail->isSMTP();
				$mail->SMTPAuth();
				$mail->SMTPSecure ='ssl';
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = '465';
				$mail->Username='sofianesani@gmail.com';
				$mail->Password='9829@8082';
				$mail->CharSet = 'UTF-8';
				$mail->From('sofianesani@gmail.com');
				$mail->FromName('CIFOD-TILÂWAT');
				$mail->Subject='Modification du mot de passe';
				$mail->WordWrap = 50;
				$mail->AltBody = 'Welcom To CIFOD-TILÂWAT !';
				$mail->Body = 'Welcom To <b>CIFOD-TILÂWAT</b> !';
				$mail->isHTML();
				$mail->AddAddress($_POST['email'],$_POST['fullname']);

				$mail->Send();
					Session::set('success', 'Compte créé avec succès!');
				Redirect::to('Utilisateurs');
} catch (Exception $e) {
	echo "Message non envoyé.Mailer Error: ".$mail->ErrorInfo;
		Redirect::to('MotdePasseOublier');
}
	}else{
				echo $result;
			}
		}
	}

		public function updateUsers(){
		if (isset($_POST['register'])) {
			$options = [
                 'cost' => 12
			];
         $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

			$data = array(
                   'login' => $_SESSION['login'],
                  'fullname' => $_POST['fullname'],
                      'login' => $_POST['login'],
                            'password' => $password,
                                'email' => $_POST['email'],
                                   'telephone' => $_POST['telephone'],
                                      'adresse' => $_POST['adresse'],
                                        'description' => $_POST['description'],
                                        'id_profile' => $_POST['id_profile'],
			);
			$result = User::update($data);
			if ($result === 'ok') {
				Session::set('success', 'Utilisateurs modifier avec succès!');
				Redirect::to('Utilisateurs');
			}else{
				echo $result;
			}
		}
	}

	//Delete function

	public function DeleteUser(){
		if (isset($_POST['id_user'])) {
			$data['id_user'] = $_POST['id_user'];
			$result = User::Delete($data);
			if ($result === 'ok') {
					Session::set('success', 'Suppresion effectuer avec succès!');
				Redirect::to('Utilisateurs');
			}else{
				echo $result;
			}
		}
	}


	static public function logout(){
	   unset($_SESSION);
			session_destroy();
		/*$_SESSION=array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), time()-4200,'/');
		

		}*/

}

static public function Password_Forgot(){


		if (isset($_POST['submit'])) {

			$data['email'] = $_POST['email'];
		
     
			$result = User::PasswordForgot($data);

			if ( $result->email === $_POST['email'] ) {

				$mail = new PHPMailer();
try {
	
				$mail->isSMTP();
				$mail->SMTPAuth();
				$mail->SMTPSecure ='ssl';
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = '465';
				$mail->Username='sofianesani@gmail.com';
				$mail->Password='9829@8082';
				$mail->CharSet = 'UTF-8';
				$mail->From('sofianesani@gmail.com');
				$mail->FromName('CIFOD-TILÂWAT');
				$mail->Subject='Modification du mot de passe';
				$mail->WordWrap = 50;
				$mail->AltBody = 'Welcom To CIFOD-TILÂWAT !';
				$mail->Body = 'Welcom To <b>CIFOD-TILÂWAT</b> !';
				$mail->isHTML();
				$mail->AddAddress($_POST['email'],$result->nom);

				$mail->Send();
						Session::set('success', 'Envoie effectuer avec succès, verifier votre boite mail ! ');
				Redirect::to('MotdePasseOublier');
} catch (Exception $e) {
	echo "Message non envoyé.Mailer Error: ".$mail->ErrorInfo;
		Redirect::to('MotdePasseOublier');
}
			

			}else{
						Session::set('error', 'Email invalide ! ');
				Redirect::to('MotdePasseOublier');
			}
		}

	}
              
}

