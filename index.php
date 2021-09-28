<!--<h1>Bienvenido a mi web con MVC</h1>-->
<?php
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//como es repetitivo el mosrar el error con el controlador se hace una function
function show_error(){
	$error = new errorController();
	$error->index();

}
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';
	//**ruta limpia htaccses clase 270*****
	//para que cargue lo que es producto por defecto si existe el controlador para ruta limpia ->
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){//comprobar si no existe el contorlador y laaccion
	$nombre_controlador = controller_default; // se usar el controller default de parameters.php
	//->
}else{
	show_error();
	exit();
}
//usar el nombre de controlador para acceder al html o funcion ejemplo registro
if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		///ruta limpia ->
		$action_default = action_default;//action default de parameters.php
		$controlador->$action_default();
		//->
	}else{
		show_error();
	}
}else{
	///se carga el controlador de error 
	//$error = new errorController();
	//se selecciona el metodo de erro que se usara
	//$error->index();
	show_error();
}

require_once 'views/layout/footer.php';