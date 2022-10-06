<?php

// Turn off error reporting
// error_reporting(0);

// Report all errors
error_reporting(E_ALL);
session_start();

$_SESSION['base_url'] = 'http://localhost/delivery-app/';
$controller='home';
$function='home';
if(isset($_GET['controller']) && $_GET['controller']!=''){
	$controller=$_GET['controller'];
}
if(isset($_GET['function']) && $_GET['function']!=''){
	$function=$_GET['function'];
}

if(file_exists('controller/'.$controller.'.php')){
	include('controller/'.$controller.'.php');
	$class=$controller.'Controller';
	$obj = new $class();
	if(method_exists($class,$function)){
		$obj->$function();
	}
	elseif(method_exists($class,'index')){
		$obj->index();
	}
	else{
		echo "Function not found";
	}
}else{
	echo "Controller not found";
}

?>
<script>
var base_url = "<?=$_SESSION['base_url'] ?>";

console.log(base_url);
</script>