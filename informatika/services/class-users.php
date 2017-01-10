<?php

class Users{
	public function GETusers(){
		
		include_once('class-config.php');
		
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);

		$users = array();

		while($row = $result->fetch_assoc()) {
			array_push($users, array(
				'id' => $row["userId"],
				'email' => $row["email"],
				'password' => $row["password"]
				));
    	}

        $conn->close();

		$json = $users;

		return $json;
	}

	public function GETuser(){
		
		include_once('class-config.php');

		$id = $_GET['uid'];

		if(is_null($id)){
			$json = array("status" => 0, "message" => "Id missing!");
		}
		else{
			$sql = "SELECT * FROM users WHERE userId='$id'";
			$result = $conn->query($sql);

			$user = array();

			while($row = $result->fetch_assoc()) {
				array_push($user, array(
				'id' => $row["userId"],
				'email' => $row["email"],
				'password' => $row["password"]
				));
	    	}
			$json = $user;
		}
		$conn->close();

		return $json;
	}

	public function POSTuser(){
		
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$email = mysql_escape_string($post['email']);
		$password = mysql_escape_string($post['password']);
		//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";
		 
		// Insert data into data base
		$sql = "INSERT INTO users (email, password)
		VALUES ('$email', '$password')";

		if ($conn->query($sql) === TRUE) {
		    $json = array("status" => 1, "message" => "User added!");
		} else {
		    $json = array("status" => 0, "message" => "Error adding user!");
		}

		$conn->close();
		 
		return $json;
	}

	public function PUTuser(){

		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = mysql_escape_string($post['userId']);
		$email = mysql_escape_string($post['email']);
		$password = mysql_escape_string($post['password']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";

		$sql = "UPDATE users SET email='$email', password='$password' WHERE userId = '$id'";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "User updated!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error updating user!",
				'error' => $conn->error
			);
    		
		}

		$conn->close();

		return $json;
	}

	public function DELETEuser(){
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = $_GET['uid'];

		$sql = "DELETE FROM users WHERE userId = $id";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "User deleted!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error deleting User!",
				'error' => $conn->error
			);
		}

		$conn->close();

		return $json;
	}
}