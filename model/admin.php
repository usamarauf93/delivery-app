<?php
include('model/model.php');
class adminModel extends modelModel{
	function __construct(){
		parent::__construct();
    }


    function login($val)
    {
        $email = $val['email'];
        $password = md5($val['password']);
        $sql="SELECT * from  admin WHERE email = '$email' and password = '$password' ";
        $stmt=$this->con->prepare($sql);
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);       
        if(count($res) == 1){
            $_SESSION['logged_in_user_data'] = $res;
            $_SESSION['is_admin'] = true;

            return true;
        }else{
            return false;
        }
    }
    function getRetailer(){
		$sql="select * from retailer ";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
    } 	
    function saveRetailer($data){
        $name= $data['name'];
		$contact= $data['contact'];
		$email= $data['email'];
		$address= $data['address'];
		$sql="INSERT INTO `retailer`( `name`, `contact`, `email`, `address`, `active`) 
               VALUES ('$name', '$contact', '$email', '$address', '1') ";
		$stmt=$this->con->prepare($sql);
		return $stmt->execute();
    }
    function editRetailer($id){
		$sql="select * from retailer where id='$id'";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    function updateRetailer($data){
        $id= $data['id'];
        $name= $data['name'];
		$contact= $data['contact'];
		$email= $data['email'];
		$address= $data['address'];
		$sql="UPDATE `retailer` SET `name`='$name',`contact`='$contact',
                `email`='$email',`address`='$address' WHERE id = '$id' ";
                // var_dump($sql);die();
		$stmt=$this->con->prepare($sql);
		return $stmt->execute();
    }
    function deleteRetailer($id){
        $sql="Delete from `retailer` where id = '$id'";
        $stmt=$this->con->prepare($sql);
        return $stmt->execute();

    }
}