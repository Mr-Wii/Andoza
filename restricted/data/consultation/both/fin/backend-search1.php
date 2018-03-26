<?php
session_start();
$categorieID = $_SESSION['jj'];
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";
$connect = mysqli_connect ($hostname,$username,$password,$databasename);
$date=$_SESSION['exercice'];
if(isset($_REQUEST['term1'])){
  $nm = $_REQUEST['term1'];}
$stock_initial = 0;
$sql = "select * from vignette WHERE libelle ='stock initial' and categorieID=$categorieID and exercice='$date'";
$result = mysqli_query($connect, $sql);

    while($sorties = mysqli_fetch_assoc($result)) {
		$exercice = $sorties['date'];
		$libelle = $sorties['libelle'];
      $stock_initial = $stock_initial + $sorties['valeurE'];
	  $formattedNum = number_format($stock_initial, 2);
	}
$sql = "select vignette.categorieID,vignette.vignetteID,date,numero_E_S,valeurEE,valeurSE,direction,exercice,categorie.type,nom_prenom,libelle,programme,valeurE,valeurS from vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where not libelle='stock initial' and  vignette.categorieID='$categorieID' and exercice='$date' and direction LIKE '%$nm%' order by vignetteID";
$result = mysqli_query($connect, $sql);
$sum = "select sum(valeurE) as Total1 from vignette where not libelle='stock initial' and categorieID=$categorieID and exercice='$date'";
$tot = mysqli_query($connect, $sum);
$sum1 = "SELECT SUM(valeurS) AS Total2 from vignette where categorieID='$categorieID' and exercice='$date'";
$tot1 = mysqli_query($connect, $sum1);
$sum2 ="select sum(valeurE)+sum(valeurEE)-sum(valeurS)-sum(valeurSE) as fror from vignette where categorieID='$categorieID' and exercice='$date'";
$tot2 = mysqli_query($connect, $sum2);
$fror="select * from categorie where categorieID='$categorieID'";
$res = mysqli_query($connect,$fror);
$re = mysqli_fetch_array($res);
$code=$re['code'];
?>
<html>
<head>
<link rel="stylesheet" href="table.css" type="text/css">

  <table id="hor-minimalist-b">
    <thead>
    <tr>
      <th>Date</th>
      <th>DIrection</th>
      <th>Numero</th>
      <th>Beneficiaire</th>
      <th>Libelle</th>

      <th>Entrees</th>
      <th>E-Echanges</th>
      <th>S-Echanges</th>
      <th>Sorties</th>
      <th>Disponibles</th>
    </tr>
  </thead>
  <tbody>
  <?php

    while($sorties = mysqli_fetch_assoc($result)) {
	  $disponible = $stock_initial + $sorties['valeurE'] + $sorties['valeurEE'] - $sorties['valeurSE'] -$sorties['valeurS'];
      $sq=$sorties['categorieID'];
      echo "<tr class='hor-minimalist-b'>";
      echo '<td>'.$sorties['date'].'</td>';
      echo "<td>".$sorties['direction']."</td>";
      echo "<td>".$sorties['numero_E_S']."</td>";
      echo "<td>".$sorties['nom_prenom']."</td>";
      echo "<td>".$sorties['libelle']."</td>";

      echo "<td>".number_format($sorties['valeurE'], 2)."</td>";
      echo "<td>".number_format($sorties['valeurEE'], 2)."</td>";
      echo "<td>".number_format($sorties['valeurSE'], 2)."</td>";
      echo "<td>".number_format($sorties['valeurS'], 2)."</td>";
      echo "<td>".number_format($disponible, 2)."</td>";
      echo "</tr>";
	  $stock_initial = $disponible;
      }
      ?>
    </tbody>
  </table>
  <br>
    <h1 class="lel">L'ensemble ↓<h1>
  </body>
</html>
