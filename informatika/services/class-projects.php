<?php

class Projects {
	public function GETprojects(){
		
		include_once('class-config.php');
		
		$sql = "SELECT * FROM projects";
		$result = $conn->query($sql);

		$projects = array();

		while($row = $result->fetch_assoc()) {
			array_push($projects, array(
				'id' => $row["projectId"],
				'name' => $row["name"],
				'author' => $row["author"],
				'description' => $row["description"],
				'content' => $row["content"],
				'thumbnail' => $row["thumbnail"],
				'link' => $row["link"]
				));
    	}

        $conn->close();

		$json = $projects;

		return $json;
	}

	public function GETproject(){
		
		include_once('class-config.php');

		$id = $_GET['pid'];

		if(is_null($id)){
			$json = array("status" => 0, "message" => "Id missing!");
		}
		else{
			$sql = "SELECT * FROM projects WHERE projectId='$id'";
			$result = $conn->query($sql);

			$project = array();

			while($row = $result->fetch_assoc()) {
				array_push($project, array(
				'id' => $row["projectId"],
				'name' => $row["name"],
				'author' => $row["author"],
				'description' => $row["description"],
				'content' => $row["content"],
				'thumbnail' => $row["thumbnail"],
				'link' => $row["link"]
				));
	    	}
			$json = $project;
		}
		$conn->close();

		return $json;
	}

	public function POSTproject(){
		
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$name = mysql_escape_string($post['name']);
		$author = mysql_escape_string($post['author']);
		$desc = mysql_escape_string($post['description']);
		$content = mysql_escape_string($post['content']);
		$thumbnail = mysql_escape_string($post['thumbnail']);
		$link = mysql_escape_string($post['link']);
		//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";
		 
		// Insert data into data base
		$sql = "INSERT INTO projects (name, author, description, content, thumbnail, link)
		VALUES ('$name', '$author', '$desc', '$content', '$thumbnail', '$link')";

		if ($conn->query($sql) === TRUE) {
		    $json = array("status" => 1, "message" => "Project added!");
		} else {
		    $json = array("status" => 0, "message" => "Error adding project!");
		}

		$conn->close();
		 
		return $json;
	}

	public function PUTproject(){

		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = mysql_escape_string($post['id']);
		$name = mysql_escape_string($post['name']);
		$author = mysql_escape_string($post['author']);
		$desc = mysql_escape_string($post['description']);
		$content = mysql_escape_string($post['content']);
		$thumbnail = mysql_escape_string($post['thumbnail']);
		$link = mysql_escape_string($post['link']);//isset($post['content']) ? mysql_real_escape_string($post['content']) : "";

		$sql = "UPDATE projects SET name='$name', author='$author', description='$desc', content='$content', thumbnail='$thumbnail', link='$link'  WHERE projectId = '$id'";

		if ($conn->query($sql) === TRUE) {
    		$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Project updated!"
			);
		} else {
			$json = array(
				'success' => "true",
				'id' => $id,
				'message' => "Error updating project!",
				'error' => $conn->error
			);
    		
		}

		$conn->close();

		return $json;
	}

	public function DELETEproject(){
		include_once('class-config.php');

		$post = json_decode(file_get_contents('php://input'), true);

		$id = $_GET['pid'];

		$sql = "DELETE FROM projects WHERE projectId = $id";

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