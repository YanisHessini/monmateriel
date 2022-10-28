<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background: rgb(255,255,255);
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(213,213,213,1) 25%, rgba(210,205,205,1) 75%, rgba(255,255,255,1) 100%);
        }

    </style>
    <link href="header.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="/data/pictures/favicon.ico">
</head>
<body>
    <div class="header">
        <div class="header-wrapper">
            <div class="left-block">
                <img class="logo" src="/data/pictures/logo-cropped.svg"></img>
                <a class="title" href="../index.php">
                    <h1>Mon<span>matériel</span></h1>
                </a>
            </div>
            
            <div class="middle-block">
                <a class="link" id="materiel" href="../materiel/materiel.php"><h2>Matériel</h2></a>
                <a class="link" id="apropos" href="../apropos/apropos.php"><h2>A propos</h2></a>
                <a class="link" id="contact" href="../contact/contact.php"><h2>Contact</h2></a>
            </div>
            
            <a class="right-block" href="../login/login.php">
                <div class="link" id="username">
                    <?php
        
                        //Afficher nom d'utilisateur
                        if(!isset($_COOKIE["username"])) {
                            echo "CONNEXION";
                        }
                        else {
                            echo $_COOKIE['username'];
                        }
                    ?>
                </div>
                <img class="user-image" src="/data/pictures/user.png"></img>
            </a>
        </div>
    </div> 
</body>