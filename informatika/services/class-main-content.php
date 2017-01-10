<?php 

class MainContent {

	public function GETmainContent(){
		
		include_once('class-config.php');
		
		$sql = "SELECT contentId, content FROM content WHERE contentId='1'";
		$result = $conn->query($sql);

		$content = array();

		while($row = $result->fetch_assoc()) {
			array_push($content, array(
				'id' => $row["contentId"],
				'content' => $row["content"]
				));
        	//$content = $row["content"];
    	}

        $conn->close();

		$json = $content;

		return $json;
	}

	public function POSTmainContent(){
		
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$content = mysql_escape_string($post['content']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";
		 
		// Insert data into data base
		$sql = "INSERT INTO content (content)
		VALUES ('$content')";

		if ($conn->query($sql) === TRUE) {
		    $json = array("status" => 1, "message" => "Content added!");
		} else {
		    $json = array("status" => 0, "message" => "Error adding content!");
		}

		$conn->close();
		 
		return $json;
	}

	public function PUTmainContent(){

		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = mysql_escape_string($post['id']);
		$content = mysql_escape_string($post['content']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";

		$sql = "UPDATE content SET content='$content' WHERE contentId = '$id'";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Content updated!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error updating content!",
				'error' => $conn->error
			);
    		
		}

		$conn->close();

		return $json;
	}

	public function DELETEmainContent(){
				include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = $_GET['cid'];

		$sql = "DELETE FROM content WHERE contentId = $id";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Content deleted!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error deleting content!",
				'error' => $conn->error
			);
		}

		$conn->close();

		return $json;
	}
}