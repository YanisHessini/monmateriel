<!DOCTYPE html>
<head>
  <title>Se connecter</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="login.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
  <?php
    if (isset($_COOKIE["username"])) {
      header("Location: disconnect.php");
    }

    include '../header/header.php';

    if(isset($_GET['erreur'])){
      $err = $_GET['erreur'];
      if($err == 1):
        echo "<p style='color:red'>Identifiant ou mot de passe incorrect.</p>";
      elseif ($err == 2):
        echo "<p style='color:red'>Veuillez entrer un identifiant et un mot de passe.</p>";
      endif;
    }

    ?>
    <div class="content-wrapper">
      <div class="content">
        <div class="site-title-wrapper">
          <h1 class ="site-title">Connexion</h1>
        </div>

        <form action="verification.php" method="post">
          Identifiant : <input type="text" name="username"><br>
          Mot de passe : <input type="password" name="password"><br>
          <input type="submit" id='submit' value="Se connecter">
        </form>
        
        <a class="signup" href="signup.php">
          <h3 class="signup-text">Non inscrit ? Cliquez ici pour vous inscrire.</h3>
        </a>
          
      </div>
    </div>

</body>