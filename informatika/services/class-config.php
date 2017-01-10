<?php

$conn = new mysqli('localhost', 'root', 'toor', 'informatika');
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
