<?php
session_start();
$date=$_SESSION['exercice'];
if(isset($_GET["categorie"])){
  $categorieID = $_GET["categorie"];
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "andzoa";
  $connect = mysqli_connect ($hostname,$username,$password,$databasename);
}
function code($connect)
{
  $categorieID = $_GET["categorie"];
  $output = '';
  $sql = "select * from categorie where categorieID='$categorieID'";
  $result = mysqli_query($connect,$sql);
  while($row=mysqli_fetch_array($result))
  {
    $output .='<option value="'.$row["categorieID"].'">'.$row["code"].'</option>';
  }
  return $output;
}
$_SESSION['jj'] = $categorieID;
if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
?>
<link rel="stylesheet" href="../../../styles/article.css">
<link rel="stylesheet" type="text/css" href="print0.css" media="print" />
<script src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box1 input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search1.php", {term1: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
  <?php
  $sql = "select vignette.categorieID,vignette.vignetteID,date,numero_E_S,valeurEE,valeurSE,direction,exercice,categorie.type,categorie.code,nom_prenom,libelle,programme,valeurE,valeurS,@b :=@b + valeurE + valeurEE - valeurSE - valeurS as valeurD from (select @b :=0.0) as dummy cross join vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where  vignette.categorieID='$categorieID' and vignette.programmeID=1 and exercice='$date' order by vignetteID";
  $result = mysqli_query($connect, $sql);
  $sum = "select sum(valeurE) as Total1 from vignette where not libelle='stock initial' and categorieID=$categorieID and programmeID=1 and exercice='$date'";
  $tot = mysqli_query($connect, $sum);
  $sum1 = "SELECT SUM(valeurS) AS Total2 from vignette where categorieID='$categorieID' and programmeID=1 and exercice='$date'";
  $tot1 = mysqli_query($connect, $sum1);
  $sum2 ="select sum(valeurE)+sum(valeurEE)-sum(valeurS)-sum(valeurSE) as fror from vignette where categorieID='$categorieID' and programmeID=1 and exercice='$date'";
	$tot2 = mysqli_query($connect, $sum2);
	$fror="select * from categorie where categorieID='$categorieID'";
	$res = mysqli_query($connect,$fror);
	$re = mysqli_fetch_array($res);
	$code=$re['code'];
  ?>
  <div align="left" style="font-size:16px;margin-left:-400px;display:inline-block;margin-top:-56px;"><a>CODE :</a></div>
  <a style="margin-left:300px;"><?php echo $code ?></a>
  <div class="search-box1">
       <input type="text" autocomplete="off" placeholder="Direction" style="float:right;width:10%;margin-right:100px;" />
       <div class="result"></div>
   </div>
   <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Nom et Prenom" style="float:right;width:10%;margin-right:100px;" />
        <div class="result"></div>
    </div>
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

      echo "</tr>";
      }//end while
      echo "<tr>";
      echo "<td>Total</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td></td>";
      while($totals = mysqli_fetch_assoc($tot)) {
      echo "<td>".number_format($totals['Total1'], 2)."</td>";}
      echo "<td></td>";
      echo "<td></td>";
        while($totals2 = mysqli_fetch_assoc($tot1)) {
      echo "<td>".number_format($totals2['Total2'], 2)."</td>";}
    				while($totals3 = mysqli_fetch_assoc($tot2)) {
			echo "<td>".number_format($totals3['fror'], 2)."</td>";}

      ?>
    </tbody>
    </table>
    <?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
      <link rel="stylesheet" href="../../../styles/article.css">
        <?php
        $sql = "select vignette.categorieID,vignette.vignetteID,date,numero_E_S,valeurEE,valeurSE,direction,exercice,categorie.type,categorie.code,nom_prenom,libelle,programme,valeurE,valeurS,@b :=@b + valeurE + valeurEE - valeurSE - valeurS as valeurD from (select @b :=0.0) as dummy cross join vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where  vignette.categorieID='$categorieID' and vignette.programmeID=1 and exercice='$date' order by vignetteID";
        $result = mysqli_query($connect, $sql);
        $sum = "select sum(valeurE) as Total1 from vignette where not libelle='stock initial' and categorieID=$categorieID and programmeID=1 and exercice='$date'";
        $tot = mysqli_query($connect, $sum);
        $sum1 = "SELECT SUM(valeurS) AS Total2 from vignette where categorieID='$categorieID' and programmeID=1 and exercice='$date'";
        $tot1 = mysqli_query($connect, $sum1);
        $sum2 ="select sum(valeurE)+sum(valeurEE)-sum(valeurS)-sum(valeurSE) as fror from vignette where categorieID='$categorieID' and programmeID=1 and exercice='$date'";
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

            echo "</tr>";
            }//end while
            echo "<tr>";
            echo "<td>Total</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            while($totals = mysqli_fetch_assoc($tot)) {
            echo "<td>".number_format($totals['Total1'], 2)."</td>";}
            echo "<td></td>";
            echo "<td>Stock Final</td>";
              while($totals2 = mysqli_fetch_assoc($tot1)) {
            echo "<td>".number_format($totals2['Total2'], 2)."</td>";}
          				while($totals3 = mysqli_fetch_assoc($tot2)) {
      			echo "<td>".number_format($totals3['fror'], 2)."</td>";}

            ?>
          </tbody>
      	  <div align="left" style="font-size:16px;margin-left:-400px;display:inline-block;margin-top:-56px;"><a>CODE :</a></div>
        <a style="margin-left:300px;"><?php echo $code ?></a>
          </table>
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
