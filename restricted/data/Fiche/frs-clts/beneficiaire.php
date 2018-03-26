<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";
$connect = mysqli_connect ($hostname,$username,$password,$databasename);
$sql = "select * from fournisseur_client where frID>1 order by frID";
$result = mysqli_query($connect, $sql);
session_start();

if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {  ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bénéficiaires</title>
    <link rel="stylesheet" href="../../../styles/article.css">
  </head>
  <body>
    <ul>
  <li><a href="../../../Projet.php">Home</a></li>
  <li><a  href="../categories/Article.php">Categories</a></li>
  <li><a class="active1"
     href="beneficiaire.php">Les Beneficiaires</a></li>
  <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
      <br>
      <h1>Les Beneficiaires<h1>
      <br>
        <table id="hor-minimalist-b">
          <thead>
            <th>Nom et Prénom</th>
            <th>Direction</th>
            <th>Ville</th>
            <th>Département</th>
            <th class="row1">Modifier</th>
            <th class="row2">Supprimer</th>
          </tr>

          <?php

              while($sorties = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>".$sorties['nom_prenom']."</td>";
                  echo "<td>".$sorties['direction']."</td>";
                  echo "<td>".$sorties['ville']."</td>";
                  echo "<td>".$sorties['departement']."</td>";
                  echo '<td><a href="edit.php?id=' . $sorties['frID'] . '"><img src="../../../images/edit.png" </a></td>';
                  echo '<td><a href="delete.php?id=' . $sorties['frID'] . '"class="confirmation"><img src="../../../images/delete.png" </a></td>';
                  echo "</tr>";


              }//end while

           ?>
        </table>
        <br>
      <div class="cyka">
        <p><a class="a1" href="add.php"><img src="../../../images/add.png" alt="Ajouter un nouveau article" style="width:300px;"><br>Ajouter ↑</a></p>
      </div>
      </center>
      <div class="terms">
      <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
    </div>
    <script type="text/javascript">
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) {
  if (!confirm('Vous êtes sûr ?')) e.preventDefault();
  };
  for (var i = 0, l = elems.length; i < l; i++) {
  elems[i].addEventListener('click', confirmIt, false);
  }
  </script>
  </body>
</html>
<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Bénéficiaires</title>
      <link rel="stylesheet" href="../../../styles/article.css">
    </head>
    <body>
      <ul>
    <li><a href="../../../Projet.php">Home</a></li>
    <li><a  href="../categories/Article.php">Categories</a></li>
    <li><a class="active1"
       href="beneficiaire.php">Les Beneficiaires</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
      </ul>
      <center>
        <br>
        <h1>Les Beneficiaires<h1>
        <br>
          <table id="hor-minimalist-b">
            <thead>
              <th>Nom et Prénom</th>
              <th>Direction</th>
              <th>Ville</th>
              <th>Département</th>
            </tr>

            <?php

                while($sorties = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>".$sorties['nom_prenom']."</td>";
                    echo "<td>".$sorties['direction']."</td>";
                    echo "<td>".$sorties['ville']."</td>";
                    echo "<td>".$sorties['departement']."</td>";
                    echo "</tr>";


                }//end while

             ?>
          </table>
          <br>
        </center>
        <div class="terms">
        <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
      </div>
      <script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
    if (!confirm('Vous êtes sûr ?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
    }
    </script>
    </body>
  </html>
  <?php } else { ?>
    <!DOCTYPE HTML>
    <HTML>
      <head>
        <meta charset="utf-8">
        <title>connection erreur</title>
        <link rel="stylesheet" href="../../../styles/index.css">
        <style type="text/css">
          input {font-weight:bold;
          font-size: 15px;}
       </style>
      </head>
      <body>
        <ul>
          <li><a  href="../../../Projet.php">Home</a></li>
          <li style="float:right"><a class="active" href="about.asp">About</a></li>
        </ul>
        <center>
          <br>
          <br>
        <img src="../../../images/andzoa.png">
    <center>
      <h1>vous n'avez pas d'autorisation !!</h1>
    </center>
    <?php
    }
    ?>
