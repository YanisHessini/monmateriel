<?php
    // Connexion à la base de données
    require_once('../config.php');
    $db = new mysqli(
        $config['db']['host'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['name']
    );

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Récupération des catégories
	$material_cat = array();

	$query = "SELECT * FROM category";

	$result = $db->query($query);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
				$material_cat[] = $row["materialtype"];
		}
	}
    
?>

<!DOCTYPE html>
<head>
    <title>Ajout de matériel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="add.css" rel="stylesheet"/>
    <link href="../header/header.css" rel="stylesheet"/>
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
            <div class="window_title">Ajout de matériel</div>
        </div>
        <form method="POST" action="addtodb.php" class="form_material" enctype="multipart/form-data">
            <div class="form_input">
                <label class="name">Nom du matériel : </label>
                <input name="name" id="name" autocomplete="off" required>
            </div>

            <div class="form_input">
                <label class="brand">Marque : </label>
                <input name="brand" class="in_brand" id="brand" autocomplete="off" required>
            </div>

            <div class="form_input">
                <label class="type">Catégorie : </label>
                <select name='type' class="type_select" required>
                    <option value="">-- Veuillez choisir une option --</option>
                    <?php
                        for ($i = 0; $i < sizeof($material_cat) ; $i++) { 
                            printf("
                            <option value='%s'>%s</option>",

                            $material_cat[$i], 
                            $material_cat[$i]
                            );
                        }
                    ?>
                </select>
            </div>

            <div class="form_input">
                <label class="price">Prix : </label>
                <input name="price" type="number" min="0" class="in_price" id="price" placeholder="En €" value="" required>
            </div>

            <div class="form_input" id="date_form">
                <label class="date">Date d'acquisition : </label>
                <input name="date" type="date" class="in_date" id="date" required>
            </div>     

            <div class="form_input">
                <label class="lbl_link">Lien : </label>
                <input name="link" class="in_link" id="link" placeholder="URL" autocomplete="off" required>
            </div>

            <div class="form_input">
                <label class="image">Image : </label>
                <input name="image" type="file" class="in_image" id="image" accept="image/*">
            </div>

            <div class="btn_wrapper">
                <input class="btn_add" type="reset" value="Tout effacer"></input>
                <input class="btn_add" type="submit" value="Ajouter"></input>
            </div>
        </form>

    </div>

</body>