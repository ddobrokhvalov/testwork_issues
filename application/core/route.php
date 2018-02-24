<?
class Route{

	static function start(){
		
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		
		
		if($routes[2] == "?".$_SERVER["QUERY_STRING"]){
			$routes[2] = 'index';
		}
		
		if ( !empty($routes[1]) ){	
			$controller_name = $routes[1];
		}
		
		if ( !empty($routes[2]) ){
			$action_name = $routes[2];
		}
		
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path)){
			include_once "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path)){
			include_once "application/controllers/".$controller_file;
			$controller = new $controller_name;
			$action = $action_name;
			
			if(method_exists($controller, $action)){
				$users_controller = new Controller_user;
				if(!$users_controller->authorized() && $controller_name == "Controller_Main"){
					$users_controller->auth_form();
				}else{
					$controller->$action($routes[3]);
				}
			}else{
				Route::ErrorPage404();
			}
		}else{
			Route::ErrorPage404();
		}
	}

	function ErrorPage404(){
        include "application/controllers/controller_404.php";
		$controller = new Controller_404;
		$controller->action_index();
    }
    
}
