<?
class Model_Users extends Model{
	
	public function get_by_login($user_login){
		$user = db::sql_select("select * from users where login = :login", array("login"=>$user_login));
		return $user;
	}
	
	public function get_by_id($user_id){
		$user = db::sql_select("select * from users where id = :user_id", array("user_id"=>$user_id));
		return $user;
	}
	
	public function get_list($not_admins = false){
		$sql = "select * from users";
		if($not_admins){
			$sql .= " where is_admin = 0";
		}
		$users = db::sql_select($sql);
		return $users;
	}

}
