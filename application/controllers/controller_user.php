<?
class Controller_user extends Controller{

	function __construct(){
		$this->model = new Model_Users();
		$this->view = new View();
	}
	
	function action_index(){
		
	}
	
	function authorized(){
		if(isset($_SESSION['user'])){
			return true;
		}else{
			return false;
		}
	}
	
	function is_admin(){
		if(isset($_SESSION['user'])){
			return $_SESSION['user']['is_admin'];
		}else{
			return 0;
		}
	}
	
	function auth_form(){
		
		$data["error"] = "";
		if(isset($_POST["submit"]) && $_POST["submit"]){
			if(!$_POST["login"]){
				$data["error"] .= "Не указан логин. ";
			}
			if(!$_POST["password"]){
				$data["error"] .= "Не указан пароль. ";
			}
			if($_POST["login"] && $_POST["password"]){
				$auth_result = $this->authorize($_POST["login"], $_POST["password"]);
				if(!$auth_result){
					$data["error"] .= "Не верно указан логин или пароль";
				}else{
					header("Location: /");
				}
			}
		}
	
		$this->view->generate('auth_form_view.php', 'template_view.php', $data);
	}
	
	function authorize($login, $password){
		$users = $this->model->get_by_login($login);
		
		$authorized = false;
		if(count($users)){
			foreach($users as $user){
				if($user["password"] == md5($password)){
					$authorized = true;
					$_SESSION["user"] = $user;
				}
			}
		}
		return $authorized;
	}
	function logout(){
		unset($_SESSION["user"]);
	}
	
}
