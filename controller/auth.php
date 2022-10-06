<?php
// include 'home.php';
class authController{
	function __construct(){
		include('model/auth.php');
		$this->obj = new authModel();
	}
	private function includeView($view){
		include('view/auth/authHeader.php');
		include('view/auth/'.$view.'.php');
		include('view/auth/authFooter.php');
	}
	function showLogin(){
		$this->includeView('login');
	}
	function showRegister(){
		$this->includeView('register');
	}
	function showForgetPassword(){
        $this->includeView('forgetPassword');
	}
	function postRegister(){
		$pdo = $this->obj->register($_POST);

		if($pdo){
			$_SESSION['success'] = "Please login here to continue";
			$this->showLogin();
		}else{
			$_SESSION['error'] = "There is something went wrong";
			$this->showRegister();
		}
	}
	function postLogin(){
		$pdo = $this->obj->login($_POST);
		if($pdo){
			$_SESSION['success'] = "You are successfully login";
			$_SESSION['is_user_login'] = true;
			header("Location: ".$_SESSION['base_url']."index.php?controller=dashboard&function=index"); 
		}else{
			$_SESSION['error'] = "There is something went wrong";
			$this->showLogin();
		}
	}
	function logout(){
		unset($_SESSION['is_user_login']);
		unset($_SESSION['logged_in_user_data']);
		header("Location: ".$_SESSION['base_url']."index.php?controller=home&function=index"); 

	}
}
?>