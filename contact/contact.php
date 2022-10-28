<!DOCTYPE html>
<head>
  <title>Mon matériel - Contact</title>
  <meta charset="utf-8"/>
  <meta name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="contact.css" rel="stylesheet"/>
  <link href="../header/header.css" rel="stylesheet"/>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
</head>
<body>
  <?php
    include '../header/header.php';
  ?>
 <div class="window_wrapper">
        <div class="window_title_wrapper">
            <div class="window_title">Contact</div>
        </div>
        <form method="POST" action="addmsgtodb.php" class="form_material" enctype="multipart/form-data">
            <div class="form_input">
                <label class="name">Nom : </label>
                <input name="name" id="name" autocomplete="off" required>
            </div>

            <div class="form_input">
                <label class="surname">Prénom : </label>
                <input name="surname" class="in_surname" id="surname" autocomplete="off">
            </div>

            <div class="form_input">
                <label class="email">Email : </label>
                <input name="email" type="email" class="in_email" id="email" required>
            </div>

            <div class="form_input" id="form-msg">
                <label class="msg">Message : </label>
                <textarea name="msg" class="in_msg" id="msg" required></textarea>
            </div>

            <div class="btn_wrapper">
                <input class="btn_add" type="reset" value="Tout effacer"></input>
                <input class="btn_add" type="submit" value="Envoyer"></input>
            </div>
        </form>

    </div>

</body>