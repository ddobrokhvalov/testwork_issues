<?
class Controller_issues extends Controller{

	function __construct(){
		$this->model = new Model_Issues();
		$this->view = new View();
	}
	
	function action_index(){
		$sortby = $_GET["sortby"]?$_GET["sortby"]:"id";
		$ord = $_GET["ord"]?$_GET["ord"]:"asc";
		$count_per_page = 3;
		$page_num = $_GET["page_num"]?$_GET["page_num"]:1;
		$data = $this->model->get_data($sortby, $ord, $count_per_page, $page_num);
		$this->view->generate('issues_view.php', 'template_view.php', $data);
	}
	
	function action_new(){
		
		if(count($_FILES) && !$_POST["submit"]){
			$this->preview();
			return;
		}
		if(count($_FILES) && $_POST["submit"]){
			$this->create_issue();
		}
		$users = Model_Users::get_list(true);
		$data["users"] = $users;
		$this->view->generate('new_issue.php', 'template_view.php', $data);
	}
	
	function action_view($id = false){
		$data = $this->model->get_by_id($id);
		if(count($data)){
			
			if($_POST["save"]){
				$this->save_issue($id, $_POST["text"], $_POST["completed"]);
			}
			
			$data = $data[0];
			$this->view->generate('view_issue.php', 'template_view.php', $data);
		}else{
			Route::ErrorPage404();
		}
	}
	
	function preview(){
		$file_descr = $_FILES["file"];
		$upload_path = $_SERVER["DOCUMENT_ROOT"]."/images/upload/preview";
		$uploaded = upload::upload_file($file_descr, $upload_path, true, false, array("w"=>320, "h"=>240));
		$uploaded_htdocs = "/images/upload/preview/".basename($uploaded);
		$user = Model_Users::get_by_id($_POST["user_id"]);
		$ret["username"] = $user[0]["username"];
		$ret["email"] = $user[0]["email"];
		$ret["img"] = "<img src='".$uploaded_htdocs."' class='preview_img'>";
		echo json_encode($ret);
	}
	
	function create_issue(){
		$file_descr = $_FILES["img"];
		$upload_path = $_SERVER["DOCUMENT_ROOT"]."/images/upload/img";
		$uploaded = upload::upload_file($file_descr, $upload_path, true, false, array("w"=>320, "h"=>240));
		$uploaded_htdocs = "/images/upload/img/".basename($uploaded);
		$data = $this->model->add_issue($uploaded_htdocs, $_POST["text"]);
		header("Location: /issues/");
	}
	
	function save_issue($id, $text, $completed=0){
		$data = $this->model->update_issue($id, $text, $completed);
		header("Location: /issues/");
	}
	
}
