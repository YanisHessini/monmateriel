<?php
	// Connexion à la base de données
		require_once('../config.php');
		$conn = new mysqli(
				$config['db']['host'],
				$config['db']['username'],
				$config['db']['password'],
				$config['db']['name']
		);

		if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
		}

		$query = "INSERT INTO messages (username, surname, mail, msg) VALUES 
		('{$_POST['name']}', '{$_POST['surname']}', '{$_POST['email']}', '{$_POST['msg']}')";

		if (mysqli_query($conn, $query)) {
			echo "New material created successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	
		mysqli_close($conn);

		header("Location: confirmation.php");

?>