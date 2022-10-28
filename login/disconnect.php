<!DOCTYPE html>
<head>
  <title>Déconnexion</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="disconnect.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
  <?php
    include '../header/header.php';
  ?>

  <form class="content">
      <button class="disconnect_btn" type="submit" name="disconnect" method="get">
        <h1>Déconnexion</h1>
      </button>
  </form>

  <?php
    if(isset($_GET["disconnect"])) { 
      if (isset($_COOKIE["username"])){
        setcookie("username", null, time()-3600, "/");
        unset($_COOKIE["username"]);
      }
        header("Location: ../index.php");
    }
  ?>

</body>