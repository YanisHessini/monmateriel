<?php
  session_start();
?>
<!DOCTYPE html>
<head>
  <title>Mon matériel - Parcourir</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="materiel.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
  <?php
    include '../header/header.php';
    if (!isset($_COOKIE["username"])) {
      echo "
        <div class='d_content-wrapper'>
          <div class='d_title'>
            <h1>Veuillez vous connecter.</h1>
          </div>

          <form class='d_connectbtn'>
            <button class='d_connect' type='submit' name='connect' method='get' formaction='../login/login.php'>
              <p>Cliquez ici pour vous connecter</p>
            </button>
          </form>
        </div>
      ";
      die();
    }
  ?>
  <div class="site-title">
    <h1>Liste du matériel possédé</h1>
  </div>
  <div class="material-wrapper">
    <?php
      // Connexion à la base de données
			require_once('../config.php');
			$db = new mysqli($config['db']['host'], $config['db']['username'], 
														$config['db']['password'], $config['db']['name']);
			
			if (!$db) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$data_materiel = array(
				array("id"),
				array("obj_name"),
				array("brand"),
				array("price"),
				array("acquisitiondate"),
				array("mat_type"),
				array("link"),
				array("img")
			);

			$query = "SELECT * FROM materiel";

			$result = $db->query($query);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$data_materiel["id"][] = $row["id"];
					$data_materiel["obj_name"][] = $row["obj_name"];
					$data_materiel["brand"][] = $row["brand"];
					$data_materiel["price"][] = $row["price"];
					$data_materiel["acquisitiondate"][] = $row["acquisitiondate"];
					$data_materiel["mat_type"][] = $row["mat_type"];
					$data_materiel["link"][] = $row["link"];
					
					// Récupération de l'image
					// $data_materiel["img"][] = $row["img"];
			 }
			}



			$query = "SELECT COUNT(*) FROM materiel";
      $exec_requete = mysqli_query($db, $query);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['COUNT(*)'];

			// Affichage sur la page
			for ($qty = 0; $qty < $count ; $qty++) { 

        // Ajouter la ligne suivante pour ajouter l'image
        # <p class='image_objet'>Image : %s</p>

				printf(
					"<button type='button' class='collapsible'>
						<p class='nom_objet'>N°%d : %s<p>
					</button>
      		<div class='content'>
      		  <p class='marque_objet'>Marque : <div class='content_string'>%s</div></p>
      		  <p class='prix_objet'>Prix : <div class='content_string'>%d €</div></p>
      		  <p class='date_objet'>Date d'acquisition : <div class='content_string'>%s</div></p>
      		  <p class='type_objet'>Catégorie d'objet : <div class='content_string'>%s</div></p>
      		  <p class='lien_objet'>Lien utile : <a class='a_lien_objet' href='%s'>%s</a>
      		</div>",


					$qty+1,
					$data_materiel["obj_name"][$qty],
					$data_materiel["brand"][$qty],
					$data_materiel["price"][$qty],
					$data_materiel["acquisitiondate"][$qty],
					$data_materiel["mat_type"][$qty],
					$data_materiel["link"][$qty],
					$data_materiel["link"][$qty]
        );
			}

    ?>
  </div>

	<div class="buttons_wrapper">
			<a class="add_material" href="add.php">Ajouter</a>
			<a class="remove_material" href="remove.php">Supprimer</a>
	</div>

	<?php
		require "../footer/footer.php";
	?>
  
  <script>

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){ // If open when clicking
          panel.style.maxHeight = null;
					this.style.borderBottomLeftRadius = "10px";
					this.style.borderBottomRightRadius = "10px";

        } else { // If closed when clicking
          panel.style.maxHeight = panel.scrollHeight + "px";
					this.style.borderBottomLeftRadius = "0px";
					this.style.borderBottomRightRadius = "0px";
        }
      });
    }
  </script>
</body>
</html>