<?
class params{
	public static $params=array();
	public static function init_default_params(){
		self::$params=array(
							"db_type" => array ("value" => "mysql"), // ���� mysql, oracle ��� mssql
							"db_server" => array ("value" => "localhost"), // ������ �� ��� MySQL
							"db_name" => array ("value" => "u6724423_issues"), // ��� MySQL � MSSQL - �������� ��, ��� Oracle - SID
							"db_user" => array ("value" => "u6724423_issues"), // ������������ ��
							"db_password" => array ("value" => 'Bylecnhbz2018'), // ������ ��
						);
	}
}
params::init_default_params();