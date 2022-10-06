<?php
include('model/model.php');
class homeModel extends modelModel{
	function __construct(){
		parent::__construct();
	}
	function page($id){
		$sql="select title,data from page where id='$id'";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if(empty($data)){
			$arr['title']='Page Not Found';
			$arr['data']='Page Not Found';
		}else{
			$arr=$data['0'];
		}
		return $arr;
	} 	
}
?>