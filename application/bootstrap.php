<?
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
session_start();

require_once 'lib/lib_abstract.php';

require_once 'controllers/controller_user.php';
require_once 'models/model_users.php';

$users_controller = new Controller_user;

if($_GET["logout"]){
	$users_controller->logout();
	header("Location: /");
}

require_once 'core/route.php';
Route::start(); 