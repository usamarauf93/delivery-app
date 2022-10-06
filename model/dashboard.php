<?php
include('model/model.php');
class dashboardModel extends modelModel{
	function __construct(){
		parent::__construct();
	}
	function getCategories(){
		$sql="select * from category where active = 1 ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
    } 	
    function getRetailers(){
		$sql="select id,name from retailer ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		// var_dump($data);
		return $data;
    } 	
    function search($postData){
        $name = $postData['name'];
        $address = $postData['location'];
        $cat_id = $postData['category'];
        $sql="select * from retailer where id in(select retailer_id from retailer_category where category_id = '$cat_id')
                or  name like '%$name%' and address like '%$address%' ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>