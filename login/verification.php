<?php
  session_start();
  if(isset($_POST['username']) && isset($_POST['password'])) {
    // Connexion à la base de données
			require_once('../config.php');
			$db = new mysqli($config['db']['host'], $config['db']['username'], 
														$config['db']['password'], $config['db']['name']);
    
    if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // On applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])); 

    if($username !== "" && $password !== "") {
      $requete = "SELECT COUNT(*) FROM users WHERE username = '".$username."' AND password = '".$password."' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['COUNT(*)'];
      
      if($count != 0) { // Nom d'utilisateur et mot de passe corrects
        $_SESSION["username"] = $username;

        //Cookie d'identifiant
        $cookie_name = "username";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 jour

        header('Location: ../index.php');
      }
      else {
        header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }

    }
    else {
      header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
  }
  else {
     header('Location: login.php');
  }
  mysqli_close($db); // fermer la connexion

?>