<?php

require_once("class-main-content.php");
require_once("class-projects.php");
require_once("class-users.php");
require_once("class-common.php");

class RESTAPI {
	
	public function processApi(){
		$url = $_SERVER[REQUEST_URI];
		$request = substr($url, strrpos($url, '/') + 1);

		$request = explode('?', $request, 2);

		$req_method = $_SERVER['REQUEST_METHOD'];

		$method = $req_method . $request[0];

		$mainContent = new MainContent;
		$common = new Common;
		$projects = new Projects;
		$users = new Users;

		if(method_exists($mainContent, $method)){
			$json = $mainContent->$method();
		}
		elseif(method_exists($common, $method)){
			$json = $common->$method();
		}
		elseif(method_exists($projects, $method)){
			$json = $projects->$method();
		}
		elseif(method_exists($users, $method)){
			$json = $users->$method();
		}
		else{
			$json = array(
				'status' => false,
				'message' => '404'
				);
		}
		echo json_encode($json);
	}
}

$api = new RESTAPI;
$api->processApi();
