<!DOCTYPE html>
<head>
  <title>Message envoyé !</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="confirmation.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
	<?php
		require "../header/header.php";

	?>

	<div class='d_content_wrapper'>
    <div class='d_title'>
      <h1>Message bien envoyé.</h1>
    </div>
    <form class='d_returnbtn'>
      <button class='d_return' type='submit' name='return' method='post' formaction='/index.php'>
        <p>Cliquez ici pour revenir sur la page d'accueil.</p>
      </button>
    </form>
  </div>

</body>