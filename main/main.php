<?php

	// Connexion à la base de données
	include_once 'config.php';
	$db = new mysqli($config['db']['host'], $config['db']['username'], 
	$config['db']['password'], $config['db']['name']);

	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$frontpage_data_materiel = array(
		array("obj_name"),
		array("img"),
		array("link")
	);

	$query = "SELECT * FROM materiel ORDER BY RAND() LIMIT 2";
	$result = $db->query($query);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$frontpage_data_materiel["obj_name"][] = $row["obj_name"];
			$frontpage_data_materiel["img"][] = $row["img"];
			$frontpage_data_materiel["link"][] = $row["link"];
		}
	}
?>

<head>
	<link href="main/main.css" rel="stylesheet"/>
</head>

<body>
	<div class="content">
		<div class="content-wrapper">
			<div class="site-title"><h1>Référencement du matériel</h1></div>
			<!-- Ajouter balise PHP à partir d'ici (et faire un require?) pour changer dynamiquement l'image, et le nom du matériel -->
			<div class="random-imgs">
				<div class="wrapper-img1">
						<img class = img id="img1" src='<?php echo $frontpage_data_materiel["img"][0] ?>' width="400" height="225">
							<div class='caption'> <?php echo $frontpage_data_materiel["obj_name"][0] ?> </div>	
						</img>
							</div>
							<div class="wrapper-img2">
								<img class = img id="img2" href='<? echo $frontpage_data_materiel["link"][1] ?>'
								src='<?php echo $frontpage_data_materiel["img"][1] ?>' width="400" height="225">
								<div class="caption" > <?php echo $frontpage_data_materiel["obj_name"][1] ?> </div>
							</img>
						</div>
					</div>
					
					<div class="desc-wrapper">
						<div class="site-desc">
							Bienvenue sur mon site. Il permet de référencer du matériel, qui sera stocké dans une base de données.
							Le site permet de visualiser la liste du matériel, d'en ajouter ou d'en supprimer. Vous pouvez détailler différents champs
							pour le matériel, tels que la marque, le prix, ou encore la date d'acquisition.<br> <br>

							Cliquez sur le bouton pour accéder au matériel !
						</div>
						<button type="button" class="materialbtn" onclick="location.href='../materiel/materiel.php'">Accéder au matériel</button>
					</div>
					<div href="materiel.php"></div>
			</div>
		</div>
</body>