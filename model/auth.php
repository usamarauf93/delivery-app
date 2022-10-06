<?php
include('model/model.php');
class authModel extends modelModel{
	function __construct(){
		parent::__construct();
    }

    function register($val){
        $data['name'] = $val['name'];
        $data['email'] = $val['email'];
        $data['password'] = md5($val['password']);
        $data['address'] = $val['address'];
        $data['contact'] = $val['contact'];
        $sql="INSERT INTO customer (name,email,password,address,contact) VALUES (:name, :email, :password, :address, :contact)";
        $stmt=$this->con->prepare($sql);
        return $stmt->execute($data);
    }
    function login($val)
    {
        $email = $val['email'];
        $password = md5($val['password']);
        $sql="SELECT * from  customer WHERE email = '$email' and password = '$password' ";
        $stmt=$this->con->prepare($sql);
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);       
        if(count($res) == 1){
            $_SESSION['logged_in_user_data'] = $res;
            return true;
        }else{
            return false;
        }
    }
    function forgetPassword($data)
    {
        # code...
        var_dump($data);
    }
}