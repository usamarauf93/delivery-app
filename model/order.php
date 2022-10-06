<?php
include('model/model.php');
class orderModel extends modelModel{
	function __construct(){
		parent::__construct();
	}
	function savePickupOrder($data){
		$customer_id = (int)$_SESSION['logged_in_user_data'][0]['id'];
		$created_datetime = $updated_datetime = time();
		$pickup_note = $data['pickup_note'];
		$status = $data['status'];
		$sql="INSERT INTO pickup_order ( `customer_id`, `pickup_notes`, `status`, `rating`, `created_datetime`, `updated_datetime`)
			   VALUES ('$customer_id','$pickup_note', '$status', ' ', '$created_datetime', '$updated_datetime') ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		return $this->con->lastInsertId();
    } 	
	function savePickupOrderDetails($data){
		$pickup_order_id = (int)$data['pickup_order_id']; 
		$retailer_id= (int)$data['retailer_id'];
		$retailer_order_id= (int)$data['retailer_order_id'];
		$pickup_data= $data['pickup_data'];
		$status= $data['status'];
		$pickup_datetime= strtotime($data['pickup_datetime']);
		$sql="INSERT INTO pickup_order_detail ( `pickup_order_id`, `retailer_id`, `retailer_order_id`, `pickup_data`, `status`, `pickup_datetime` )
			   VALUES ('$pickup_order_id', '$retailer_id', '$retailer_order_id', '$pickup_data', '$status', '$pickup_datetime') ";
		$stmt=$this->con->prepare($sql);
		return $stmt->execute();
	}
	function userOrders($id){
		$sql="select * from pickup_order where customer_id='$id'";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
	}
	
	function updateStatus($id,$status){
       $sql="UPDATE `pickup_order` SET `status`='$status' WHERE id = '$id' ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$sql2="UPDATE `pickup_order_detail` SET `status`='$status' WHERE pickup_order_id = '$id' ";
		$stmt=$this->con->prepare($sql2);
		$stmt->execute();
		return true;
	}
	function getOrderDetails($order_id){
		$sql="select * from pickup_order_detail where pickup_order_id='$order_id'";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
	}
	function updateRating($id,$rating){
		$sql="UPDATE `pickup_order` SET `rating`='$rating' WHERE id = '$id' ";
		$stmt=$this->con->prepare($sql);
		return $stmt->execute();
	}
}
?>