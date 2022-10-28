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
	
	// Récupération du matériel
	$data_materiel = array(
		array("id"),
		array("obj_name"),
	);

	$query = "SELECT * FROM materiel";

	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
				$data_materiel["id"][] = $row["id"];
				$data_materiel["obj_name"][] = $row["obj_name"];
		}
	}

?>

<!DOCTYPE html>
<head>
    <title>Supression de matériel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="remove.css" rel="stylesheet"/>
    <link href="add.css" rel="stylesheet"/>

    <link href="/header/header.css" rel="stylesheet"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>
<body>
	<?php 
    require_once("../header/header.php");
  ?>

	<div class="window_wrapper">
		<div class="window_title_wrapper">
			<div class="window_title">Supression de matériel</div>
		</div>

		<form class="form_material" method="post" action="removefromdb.php">
			<div class="form_input">
				<label class="label_material">Choisir le matériel à supprimer :</label>
				<select name='obj_name' class="mat_select" required>

					<option value="">-- Veuillez choisir une option --</option>
					<?php
						for ($i = 0; $i < sizeof($data_materiel["id"]) ; $i++) {
							printf("
							<option value='%s'>%s</option>",
							$data_materiel["obj_name"][$i],
							$data_materiel["obj_name"][$i]
						);
					}
					?>
				</select>
			</div>

			<div class="btn_wrapper">
        <input class="btn_confirm" type="submit" value="Supprimer"></input>
      </div>

		</form>

	</div>
</body>
