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

	$remove_material = $_POST['obj_name'];

	$query = "DELETE FROM materiel WHERE obj_name='{$remove_material}'";

	if (mysqli_query($conn, $query)) {
		echo "Material deleted successfully";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	header("Location: /materiel/materiel.php");

?>