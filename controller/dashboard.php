<?php
include 'auth.php';
class dashboardController extends authController{
	function __construct(){
        if($_SESSION['is_user_login'] && !isset($_SESSION['is_admin'])){
            include('model/dashboard.php');
            $this->obj=new dashboardModel();
        }else{
			header("Location: ".$_SESSION['base_url']."index.php?controller=auth&function=showLogin"); 
        }
	}

    function index(){
		$categories = $this->obj->getCategories();
		$retailers = $this->obj->getRetailers();
        include('view/main.php');
    }
    function search(){
        $data = $_POST;
        $categories = $this->obj->getCategories();
        $searchRes = $this->obj->search($data);
        $retailers = $this->obj->getRetailers();
        if(!empty($searchRes)){
            $showTable = true ; 
        }
        include('view/main.php');
    }
}