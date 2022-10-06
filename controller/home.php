<?php
class homeController{
	function __construct(){
		include('model/home.php');
		$this->obj=new homeModel();
	}
	
	function index(){
		$arr=$this->obj->page(1);
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
	function about(){
		$arr=$this->obj->page(2);
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
	function contact(){
		$arr=$this->obj->page(6);
		include('view/header.php');
		include('view/page.php');
		include('view/footer.php');
	}
}
?>