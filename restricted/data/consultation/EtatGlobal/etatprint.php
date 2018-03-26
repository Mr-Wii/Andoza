<?php
session_start();
$date=$_SESSION['exercice'];
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";
$connect = mysqli_connect ($hostname,$username,$password,$databasename);
$sql = "select observation,vignette.categorieID,code,type,sum(valeurE)as entree,sum(valeurS)as valeurS,sum(valeurE)-sum(valeurS)as valeurD from vignette inner join categorie on vignette.categorieID=categorie.categorieID and exercice='$date' group by code,type,categorieid,observation";
$result = mysqli_query($connect, $sql);
if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {

  ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Etat Global</title>
    <link rel="stylesheet" href="../../../styles/article.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print" />
  </head>
  <body>
    <ul>
  <li><a href="../../../Projet.php">Home</a></li>
  <li><a class="active1" href="Etat.php">Etat Global</a></li>
  <li><a href="../inventaire/inventaire.php">Inventaire</a></li>
  <li><a href="../consult.php">Fiche Individuel</a></li>
    <li><a href="etatprint" class="active1">Fin d'exercice</a></li>
  <li><a class="active1" href="javascript:window.print()">Imprimer</a></li>
  <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <link rel="stylesheet" href="../../../styles/side.css">
    <div id="mySidenav" class="sidenav">
<a href="../../entree/entree.php" id="about">Entrées</a>
<a href="../../sortie/sortie.php" id="blog">Sorties</a>
<a href="../consultation.php" id="projects" class="active1">Consultation</a>
</div>
    <center>
      <img src="../../../images/andzoa.png">
      <h1>ETAT DE CONSOMMATION DES VIGNETTES AU TITRE DE L'EXERCICE <?= $date; ?><h1>
      <br>
      <table id="hor-minimalist-b">
        <tr>
            <th>CODE</th>
            <th>Type de vignette</th>
            <th>Stock initial<br>01/01/<?= $date ?></th>
            <th>Entrees<br><?= $date; ?></th>
            <th>Consommation<br><?= $date; ?></th>
			<th>Stock Final<br>31/12/<?= $date; ?></th>
            <th>Retour après Inventaire</th>
          </tr>

        <?php

            while($article = mysqli_fetch_assoc($result) ){
              $sq=$article['categorieID'];
                echo "<tr>";
                echo "<td>".$article['code']."</td>";
                echo "<td>".$article['type']."</td>";

                  $sql2 = "select sum(valeurE) as si from vignette where libelle='stock initial' and categorieid='$sq' and exercice='$date'";
                  $result2 = mysqli_query($connect,$sql2);
                  while($article2= mysqli_fetch_assoc($result2)) {
                echo "<td>".number_format($article2['si'], 2)."</td>";}



                $sql6 = "select sum(valeurE) as norm from vignette where not libelle='stock initial' and categorieID='$sq'and exercice='$date'";
                $result6 = mysqli_query($connect,$sql6);
                while($article6= mysqli_fetch_assoc($result6)) {
                echo "<td>".number_format($article6['norm'], 2)."</td>";}



                $sql7 = "select sum(valeurS) as norm1 from vignette where not libelle='stock initial'  and categorieID='$sq'and exercice='$date'";
                $result7 = mysqli_query($connect,$sql7);
                while($article7= mysqli_fetch_assoc($result7)) {
                echo "<td>".number_format($article7['norm1'], 2)."</td>";}



                  $sql8 = "select sum(valeurE) - sum(valeurS) as vd from vignette where categorieid='$sq'and exercice='$date'";
                  $result8 = mysqli_query($connect,$sql8);
                  while($article8= mysqli_fetch_assoc($result8)) {
                echo "<td>".number_format($article8['vd'], 2)."</td>";}
                echo "<td>".$article['observation']."</td>";


            }

         ?>

       </tr>
        </table>
        <br>
      </center>
      <div class="terms">
      <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
      </div>
  </body>
</html>
<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Etat Global</title>
      <link rel="stylesheet" href="../../../styles/article.css">
      <link rel="stylesheet" type="text/css" href="print.css" media="print" />
    </head>
    <body>
      <ul>
    <li><a href="../../../Projet.php">Home</a></li>
    <li><a class="active1" href="Etat.php">Etat Global</a></li>
    <li><a href="../consult.php">Fiche Individuel</a></li>
    <li><a href="etatprint" class="active1">Fin d'exercice</a></li>
    <li><a class="active1" href="javascript:window.print()">Imprimer</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
      </ul>
      <link rel="stylesheet" href="../../../styles/side.css">
      <div id="mySidenav" class="sidenav">
  <a href="../../entree/entree.php" id="about">Entrées</a>
  <a href="../../sortie/sortie.php" id="blog">Sorties</a>
  <a href="../consultation.php" id="projects" class="active1">Consultation</a>
  </div>
      <center>
        <img src="../../../images/andzoa.png">
        <h1>ETAT DE CONSOMMATION DES VIGNETTES AU TITRE DE L'EXERCICE <?= $date; ?><h1>
        <br>
        <table id="hor-minimalist-b">
          <tr>
            <th>CODE</th>
            <th>Type de vignette</th>
            <th>Stock initial<br>01/01/<?= $date ?></th>
            <th>Entrees<br><?= $date; ?></th>
            <th>Consommation<br><?= $date; ?></th>
      <th>Stock Final<br>31/12/<?= $date; ?></th>
            <th>Retour après Inventaire</th>
            </tr>

          <?php

              while($article = mysqli_fetch_assoc($result) ){
                $sq=$article['categorieID'];
                  echo "<tr>";
                  echo "<td>".$article['code']."</td>";
                  echo "<td>".$article['type']."</td>";

                    $sql2 = "select sum(valeurE) as si from vignette where libelle='stock initial' and categorieid='$sq' and exercice='$date'";
                    $result2 = mysqli_query($connect,$sql2);
                    while($article2= mysqli_fetch_assoc($result2)) {
                  echo "<td>".number_format($article2['si'], 2)."</td>";}



                  $sql6 = "select sum(valeurE) as norm from vignette where not libelle='stock initial' and categorieID='$sq'and exercice='$date'";
                  $result6 = mysqli_query($connect,$sql6);
                  while($article6= mysqli_fetch_assoc($result6)) {
                  echo "<td>".number_format($article6['norm'], 2)."</td>";}



                  $sql7 = "select sum(valeurS) as norm1 from vignette where not libelle='stock initial'  and categorieID='$sq'and exercice='$date'";
                  $result7 = mysqli_query($connect,$sql7);
                  while($article7= mysqli_fetch_assoc($result7)) {
                  echo "<td>".number_format($article7['norm1'], 2)."</td>";}



                    $sql8 = "select sum(valeurE) - sum(valeurS) as vd from vignette where categorieid='$sq'and exercice='$date'";
                    $result8 = mysqli_query($connect,$sql8);
                    while($article8= mysqli_fetch_assoc($result8)) {
                  echo "<td>".number_format($article8['vd'], 2)."</td>";}
                  echo "<td>".$article['observation']."</td>";


              }

           ?>

         </tr>
          </table>
          <br>
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
          <li style="float:right"><a class="active" href="../../.././login.php">Log in</a></li>
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
