<?php
include 'auth.php';
class orderController extends authController{
	function __construct(){
        if($_SESSION['is_user_login']){
            include('model/order.php');
            $this->obj=new orderModel();
        }else{
			header("Location: ".$_SESSION['base_url']."index.php?controller=auth&function=showLogin"); 
        }
	}

    function index(){
        var_dump($_SESSION['logged_in_user_data'][0]['id']);
        // include('view/order.php');
    }
    function saveOrder(){
        $data = $_POST;
        $order_id = $this->obj->savePickupOrder($data);
        if(isset($order_id)){
            exit(json_encode(['success'=>true,'order_id'=>$order_id]));
        }else{
            exit(json_encode(['success'=>false]));
        }
       
    }
    function saveOrderDetails(){
        $data = $_POST;
        if( $this->obj->savePickupOrderDetails($data) ){
            exit(json_encode(['success'=>true]));
        }else{
            exit(json_encode(['success'=>false]));
        }
       
    }
    function showUserOrders(){
        $user_id = $_SESSION['logged_in_user_data'][0]['id'];
        $orders = $this->obj->userOrders($user_id);
        $orderDetails = [];
        foreach($orders as $order){
            $orderDetailss = $this->obj->getOrderDetails($order['id']);
            // var_dump($orderDetailss);
            array_push($orderDetails,$orderDetailss);
        }
        // echo"<pre>";
        // var_dump($orderDetails);
        include('view/order.php');
    }
    function updateStatus(){
        $order_id = $_GET['id'];
        $status = $_GET['status'];
        $this->obj->updateStatus($order_id,$status);
		header("Location: ".$_SESSION['base_url']."index.php?controller=order&function=rateOrder&id=$order_id"); 

    }
    function rateOrder(){
        $order_id = $_GET['id'];
        include('view/rateOrder.php');
    }
    function saveRating(){
        var_dump($_POST);
        $order_id = $_POST['order_id'];
        $rating = $_POST['rating'];
        $this->obj->updateRating($order_id,$rating);
		header("Location: ".$_SESSION['base_url']."index.php?controller=order&function=showUserOrders"); 
    }
}