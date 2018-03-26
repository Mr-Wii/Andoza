<?php
session_start();
$date=$_SESSION['exercice'];

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";
$connect = mysqli_connect ($hostname,$username,$password,$databasename);
  $sql = "select * from vignette inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where libelle='Stock Initial' and exercice='$date'";
$result = mysqli_query($connect, $sql);
$sql2 = "select distinct exercice from vignette order by exercice";
$result2 = mysqli_query($connect, $sql2);
  function exercice($connect)
  {
    $output = '';
    $sql = "select distinct exercice from vignette order by exercice";
    $result = mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result))
    {
      $output .='<option value="'.$row["exercice"].'">'.$row["exercice"].'</option>';
    }
    return $output;
}
  ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>INVENTAIRE</title>
    <link rel="stylesheet" href="../../../styles/article.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
    <ul>
  <li><a href="../../../Projet.php">Home</a></li>
  <li><a href="../etatglobal/Etat.php">Etat Global</a></li>
  <li><a class="active1" href="inventaire.php">Inventaire</a></li>
  <li><a href="../consult.php">Fiche Individuel</a></li>
  <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <link rel="stylesheet" href="../../../styles/side.css">
    <div id="mySidenav" class="sidenav">
<a href="../../entree/entree.php" id="about">Entrées</a>
<a href="../..sortie//sortie.php" id="blog">Sorties</a>
<a href="../consultation.php" id="projects" class="active1">Consultation</a>
</div>
    <center>
      <br>
      <h1>INVENTAIRE AU TITRE DE L'EXERCICE <?= $date; ?><h1>
      <br>
      <div id="result1">
        <table id="hor-minimalist-b">
        <tr>
          <tH>EXERCICE</th>
          <tH>DATE</th>
          <tH>TYPE DE VIGNETTES</th>
		      <TH>PROGRAMME</th>
          <tH>STOCK INITIAL</th>
          <th class="row1">MODIFIER</td>
          <th class="row2">SUPPRIMER</td>
        </tr>

        <?php
        while($sorties = mysqli_fetch_assoc($result)) {

              echo "<tr class='hor-minimalist-b'>";
              echo '<td>'.$sorties['exercice'].'</td>';
              echo "<td>".$sorties['date']."</td>";
              echo "<td>".$sorties['type']."</td>";
			  echo "<td>".$sorties['programme']."</td>";
              echo "<td>".number_format($sorties['valeurE'], 2)."</td>";
              echo '<td><a href="edit.php?id=' . $sorties['vignetteID'] . '"><img src="../../../images/edit.png"></a></td>';
              echo '<td><a href="delete.php?id=' . $sorties['vignetteID'] . '" class="confirmation"><img src="../../../images/delete.png"></a></td>';
              echo "</tr>";
              }//end while
              ?>
        </table>
      </div>
        <br>
      <div class="cyka">
      <p><a class="a1" href="add.php"><img src="../../../images/add.png" alt="Ajouter un nouveau article"  style="width:300px;"><br>Ajouter</a></p>
      </div>
      </center>
      <div class="terms">
      <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
      </div>
  </body>
</html>
<script type="text/javascript">
var elems = document.getElementsByClassName('confirmation');
var confirmIt = function (e) {
if (!confirm('Vous êtes sûr ?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
elems[i].addEventListener('click', confirmIt, false);
}
</script>
