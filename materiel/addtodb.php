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

	$data_materiel = $_POST;

	// Placement de l'image dans le dossier pictures
	$target_dir = "../data/pictures/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$file_path = "/data/pictures/{$_FILES["image"]["name"]}";
	$uploadOk = 1;

	// Check if file already exists
	if (file_exists($target_file)) {
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". htmlspecialchars( basename( $_FILES["image"]["tmp_name"])). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	$query = "INSERT INTO materiel (obj_name, brand, price, acquisitiondate, mat_type, link, img) VALUES 
	('{$_POST['name']}', '{$_POST['brand']}', '{$_POST['price']}', '{$_POST['date']}', '{$_POST['type']}', '{$_POST['link']}', '{$file_path}')";
	
	if (mysqli_query($conn, $query)) {
		echo "New material created successfully";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	header("Location: /materiel/materiel.php");
?>