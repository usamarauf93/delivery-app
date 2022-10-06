<?php
class modelModel{
	function __construct(){
		try{
			$this->con=new PDO("mysql:host=localhost;dbname=delivery_app","root","");
		}catch(PDOExection $e){
			echo $e->getMessage();
		}
    }
}