<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
  <!DOCTYPE HTML>
  <html>
    <head>
        <meta charset="utf-8">
        <title>ANDZOA</title>
        <link rel="stylesheet" href="styles/projet.css">
        <script src="js/jquery.js"></script>
        <script src="js/text.js"></script>
    </head>
    <body>
      <ul>
    <li><a class="active1" href="#">Home</a></li>
    <li><a  href="../logout.php">Déconnecter</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
      </ul>
      <center>
      <br>
      <img class="pic" src="images/andzoa.png">
      <br>
      <div class="type-js headline">
  <h1 class="text-js">Veuillez choisir une operation ↓ </h1>
      </div>
      <br>
      <br>
      <br>
      <div class="kek">
        <div class="dropdown">
        <button class="dropbtn"><span>Entrées</span></button>
        <div class="dropdown-content">
          <a href="data/entree/consult.php">Consulter</a>
        </div>
      </div>
      <div class="dropdown">
      <button class="dropbtn"><span>Sorties</span></button>
      <div class="dropdown-content">
        <a href="data/sortie/consult.php">Consulter</a>
      </div>
    </div>
    <div class="dropdown">
    <button class="dropbtn"><span>Consultation</span></button>
    <div class="dropdown-content">
      <a href="data/consultation/EtatGlobal/Etat">Etat global</a>
      <a href="data/consultation/consult.php">Fiche undividuel</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn"><span>Outils</span></button>
    <div class="dropdown-content">
      <a href="data/fiche/categories/article.php">Categories</a>
      <a href="data/fiche/frs-clts/beneficiaire.php">frs & clts</a>
      <a href="data/fiche/article.php">Historique</a>
  </div>
  </div>
</div>
  </center>
  <div class="terms">
  <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
  </div>
  </body>
  </html>

    <?php } else { ?>
      <!DOCTYPE HTML>
      <HTML>
        <head>
          <meta charset="utf-8">
          <title>Erreur d'autorisation</title>
          <link rel="stylesheet" href="styles/index.css">
          <style type="text/css">
            input {font-weight:bold;
            font-size: 15px;}
         </style>
        </head>
        <body>
          <ul>
            <li><a class="active1" href="../index.php">Home</a></li>
            <li><a href="../login.php">Identifier</a></li>
            <li><a href="../register.php">Enregistrer</a></li>
            <li style="float:right"><a class="active" href="about.asp">About</a></li>
          </ul>
          <center>
            <br>
            <br>
          <img src="images/andzoa.png">
      <center>
        <h1>vous n'avez pas d'autorisation !!</h1>
      <h2><a href="../login.php">Identifiez vous ici !</a></h2>
      </center>
      <?php
      }
      ?>
