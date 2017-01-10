<?php

class Common {
	public function GETallcommon(){
		
		include_once('class-config.php');
		
		$sql = "SELECT elementId, name, value  FROM common";
		$result = $conn->query($sql);

		$element = array();

		while($row = $result->fetch_assoc()) {
			array_push($element, array(
				'id' => $row["elementId"],
				'name' => $row["name"],
				'value' => $row["value"]
				));
    	}

        $conn->close();

		$json = $element;

		return $json;
	}
	public function GETcommon(){
		
		include_once('class-config.php');

		$id = $_GET['eid'];

		if(is_null($id)){
			$json = array("status" => 0, "message" => "Id missing!");
		}
		else{
			$sql = "SELECT * FROM common WHERE elementId='$id'";
			$result = $conn->query($sql);

			$element = array();

			while($row = $result->fetch_assoc()) {
				array_push($element, array(
				'id' => $row["elementId"],
				'name' => $row["name"],
				'value' => $row["value"]
				));
	    	}
			$json = $element;
		}
		$conn->close();

		return $json;
	}

	public function POSTcommon(){
		
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$elName = mysql_escape_string($post['name']);
		$elValue = mysql_escape_string($post['value']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";
		 
		// Insert data into data base
		$sql = "INSERT INTO common (name, value)
		VALUES ('$elName', '$elValue')";

		if ($conn->query($sql) === TRUE) {
		    $json = array("status" => 1, "message" => "Element added!");
		} else {
		    $json = array("status" => 0, "message" => "Error adding element!");
		}

		$conn->close();
		 
		return $json;
	}

	public function PUTcommon(){

		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = mysql_escape_string($post['id']);
		$elName = mysql_escape_string($post['name']);
		$elValue = mysql_escape_string($post['value']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";

		$sql = "UPDATE common SET name='$elName', value='$elValue' WHERE elementId = '$id'";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Element updated!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error updating element!",
				'error' => $conn->error
			);
    		
		}

		$conn->close();

		return $json;
	}

	public function DELETEcommon(){
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = $_GET['eid'];

		$sql = "DELETE FROM common WHERE elementId = $id";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Element deleted!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error deleting element!",
				'error' => $conn->error
			);
		}

		$conn->close();

		return $json;
	}
} 