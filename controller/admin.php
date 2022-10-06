<?php
class adminController{
	function __construct(){
		include('model/admin.php');
		$this->obj = new adminModel();
	}
	private function includeView($view){
		include('view/admin/adminHeader.php');
		include('view/admin/'.$view.'.php');
		include('view/admin/adminFooter.php');
	}
	function index(){
		if(isset($_SESSION['is_admin']) && isset($_SESSION['is_user_login'])){
			$this->dashboard();
		}else{
			$this->includeView('login');
		}
	}

	function postLogin(){
		$pdo = $this->obj->login($_POST);
		if($pdo){
			$_SESSION['success'] = "You are successfully login";
			$_SESSION['is_user_login'] = true;
			header("Location: ".$_SESSION['base_url']."index.php?controller=admin&function=dashboard"); 
		}else{
			$_SESSION['error'] = "There is something went wrong";
			$this->index();
		}
	}
	function logout(){
		unset($_SESSION['is_user_login']);
		unset($_SESSION['is_admin']);
		header("Location: ".$_SESSION['base_url']."index.php?controller=home&function=index"); 

	}
	function dashboard()
	{	
		if(isset($_SESSION['is_admin'])){
			$ret = $this->obj->getRetailer();
			include('view/admin/adminHeader.php');
			include('view/admin/admin.php');
			include('view/admin/adminFooter.php');
		}else{
			$this->includeView('login');
		}
	}
	function saveRetailer(){
		$data = $_POST;
        if( $this->obj->saveRetailer($data) ){
		$this->dashboard();
		}else{
			$_SESSION['error'] = "Can not save record";
			$this->dashboard();
		}
	}
	function editRetailer(){
		$id = $_GET['id'];
		$singleRet = $this->obj->editRetailer($id);
		include('view/admin/adminHeader.php');
		include('view/admin/admin.php');
		include('view/admin/adminFooter.php');

	}
	function updateRetailer(){
		$data = $_POST;
        if( $this->obj->updateRetailer($data) ){
		
		}else{
			$_SESSION['error'] = "Can not Update record";
			
		}
		header("Location: ".$_SESSION['base_url']."index.php?controller=admin&function=dashboard"); 

	}
	function deleteRetailer(){
		$id = $_GET['id'];
		if( $this->obj->deleteRetailer($id) ){
		
		}else{
			$_SESSION['error'] = "Can not Delete record";
			
		}
		header("Location: ".$_SESSION['base_url']."index.php?controller=admin&function=dashboard"); 

	}
}
