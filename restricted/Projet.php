<?php
    require('db.php');
$currentyear = date('Y');
session_start();
if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
if(isset($_POST['exercice'])){
      $_SESSION['exercice'] = $_POST['exercice'];
  }
  else {
    $_SESSION['exercice']=$currentyear;
  }

?>
  <!DOCTYPE HTML>
  <html>
    <head>
        <meta charset="utf-8">
        <title>ANDZOA</title>
        <link rel="stylesheet" href="styles/projet.css">
        <link rel="stylesheet" href="styles/side.css">
        <script src="js/jquery.js"></script>
        <script src="js/text.js"></script>
    </head>
    <body>
      <ul>
    <li><a class="active1" href="../index.php">Home</a></li>
    <li><a  href="users.php">Utilisateurs</a></li>
    <li><a  href="../logout.php">Déconnecter</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
<form action="" method="post">  <li style="float:right">
      <div class="ayy">
        <button class="ayybtn" >↳ Exercice ↲</button>
        <div class="ayyctn">
          <select style="background-color:#fff;text-align-last:center;width:100%;height:30px;border:1px solid #6678b1;" id="exercice" name="exercice" onchange="this.form.submit()">
          <?php
          require('db.php');
          $sql = "SELECT distinct exercice FROM vignette order by exercice";
          $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)) {
              $exercice = $row['exercice'];

           ?>
           <option value="" disabled selected>Exercice ↲</option>
            <option value="<?= $exercice; ?>"><?= $exercice; ?></option>
            <?php } if (isset($_POST['exercice'])) {
              $date = isset($_POST['exercice']) ? $_POST['exercice'] : 2017;
            }
            else {
              $date=$currentyear;
            }?>
          </select>

        </div>
      </div>
      </li>
      </ul>
      <div id="mySidenav" class="sidenav">
  <a href="data/entree/entree.php?date=<?= $date; ?>" id="about">Entrées</a>
  <a href="data/sortie/sortie.php?date=<?= $date; ?>" id="blog">Sorties</a>
  <a href="data/consultation/consultation.php?date=<?= $date; ?>" id="projects">Consultation</a>
  </div>
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
          <a href="data/entree/New.php?date=<?= $date; ?>">Nouveau</a>
          <a href="data/entree/consult.php?date=<?= $date; ?>">Consulter</a>
        </div>
      </div>
      <div class="dropdown">
      <button class="dropbtn"><span>Sorties</span></button>
      <div class="dropdown-content">
        <a href="data/sortie/New.php?date=<?= $date; ?>">Nouveau</a>
        <a href="data/sortie/consult.php?date=<?= $date; ?>">Consulter</a>
      </div>
    </div>
    <div class="dropdown">
    <button class="dropbtn"><span>Consultation</span></button>
    <div class="dropdown-content">
      <a href="data/consultation/EtatGlobal/Etat?date=<?= $date; ?>">Etat global</a>
      <a href="data/consultation/Inventaire/inventaire.php?date=<?= $date; ?>">Inventaire</a>
      <a href="data/consultation/consult.php?date=<?= $date; ?>">Fiche undividuel</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn"><span>Outils</span></button>
    <div class="dropdown-content">
      <a href="data/fiche/categories/article.php?date=<?= $date; ?>">Categories</a>
      <a href="data/fiche/frs-clts/beneficiaire.php?date=<?= $date; ?>">Beneficiaires</a>
      <a href="new">Ouverture</a>
      <a href="save">Sauvegarder</a>
  </div>
  </div>
</div>
  </center>
  <div class="terms">
  <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
  </div>
  </body>
  </html>
  <?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) {
    if(isset($_POST['exercice'])){
          $_SESSION['exercice'] = $_POST['exercice'];
      }
      else {
        $_SESSION['exercice']=$currentyear;
      }?>
    <!DOCTYPE HTML>
    <html>
      <head>
          <meta charset="utf-8">
          <title>ANDZOA</title>
          <link rel="stylesheet" href="styles/projet.css">
          <link rel="stylesheet" href="styles/side.css">
          <script src="js/jquery.js"></script>
          <script src="js/text.js"></script>
      </head>
      <body>
        <ul>
      <li><a class="active1" href="../index.php">Home</a></li>
      <li><a  href="../logout.php">Déconnecter</a></li>
      <li style="float:right"><a class="active" href="about.asp">About</a></li>
  <form action="" method="post">  <li style="float:right">
        <div class="ayy">
          <button class="ayybtn" >↳ Exercice ↲</button>
          <div class="ayyctn">
            <select style="background-color:#fff;text-align-last:center;width:100%;height:30px;border:1px solid #6678b1;" id="exercice" name="exercice" onchange="this.form.submit()">
            <?php
            require('db.php');
            $sql = "SELECT distinct exercice FROM vignette order by exercice";
            $result = mysqli_query($connect, $sql);
              while($row = mysqli_fetch_assoc($result)) {
                $exercice = $row['exercice'];

             ?>
             <option value="" disabled selected>Exercice ↲</option>
              <option value="<?= $exercice; ?>"><?= $exercice; ?></option>
              <?php } if (isset($_POST['exercice'])) {
                $date = isset($_POST['exercice']) ? $_POST['exercice'] : 2017;
              }
              else {
                $date=$currentyear;
              }?>
            </select>

          </div>
        </div>
        </li>
        </ul>
        <div id="mySidenav" class="sidenav">
      <a href="data/entree/entree.php?date=<?= $date; ?>" id="about">Entrées</a>
      <a href="data/sortie/sortie.php?date=<?= $date; ?>" id="blog">Sorties</a>
      <a href="data/consultation/consultation.php?date=<?= $date; ?>" id="projects">Consultation</a>
    </div>
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
        <a href="data/fiche/frs-clts/beneficiaire.php">Beneficiaires</a>
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
