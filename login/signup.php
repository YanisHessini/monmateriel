<!DOCTYPE html>
<head>
  <title>S'inscrire'</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="signup.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
  <?php
    include '../header/header.php';

    ?>
      <div class="content-wrapper">
        <div class="content">
          <div class="site-title-wrapper">
            <h1 class ="site-title">Inscription</h1>
        </div>

        <form action="inscription.php" method="post">
          Identifiant : <input type="text" name="username"><br>
          Mot de passe : <input type="password" name="password"><br>
          <input type="submit" id='submit' value="S'inscrire">
        </form>
        
        <a class="login" href="login.php">
          <h3 class="login-text">Déjà inscrit ? Cliquez ici pour vous connecter.</h3>
        </a>
          
      </div>
    </div>

</body>