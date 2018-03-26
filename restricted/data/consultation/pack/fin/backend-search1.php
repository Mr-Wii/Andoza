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
?>
  <?php
  $sql = "select vignette.categorieID,vignette.vignetteID,date,numero_E_S,valeurEE,valeurSE,direction,exercice,categorie.type,nom_prenom,libelle,programme,valeurE,valeurS,@b :=@b + valeurE - valeurS as valeurD from (select @b :=0.0) as dummy cross join vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where  vignette.categorieID='$categorieID' and vignette.programmeID=2 and exercice='$date'and direction LIKE '%$nm%'";
  $result = mysqli_query($connect, $sql);
  $sum = "select sum(valeurE) as total1 from vignette where not libelle='stock initial' and programmeID=2 and categorieID='$categorieID' and exercice='$date' and direction LIKE '%$nm%'";
  $tot = mysqli_query($connect, $sum);
  $sum1 = "SELECT SUM(valeurS) AS Total2 from vignette where categorieID='$categorieID' and programmeID=2 and exercice='$date' and direction LIKE '%$nm%'";
  $tot1 = mysqli_query($connect, $sum1);
  $sum2 ="select sum(valeurE)+sum(valeurEE)-sum(valeurS)-sum(valeurSE) as fror from vignette where categorieID='$categorieID' and programmeID=1 and exercice='$date' and direction LIKE '%$nm%'";
	$tot2 = mysqli_query($connect, $sum2);
	$fror="select * from categorie where categorieID='$categorieID'";
	$res = mysqli_query($connect,$fror);
	$re = mysqli_fetch_array($res);
	$code=$re['code'];
  ?>
  <table id="hor-minimalist-b">
    <thead>
    <tr>
      <th>Date</th>
      <th>Direction</th>
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
      echo "<td>".number_format($sorties['valeurD'], 2)."</td>";
}
      ?>
    </tbody>
    </table>
    <br>
    <h1 class="lel">L'ensemble ↓<h1>
