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
if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
?>
<link rel="stylesheet" href="../../../styles/article.css">
  <?php
  $sql = "select * from vignette where not libelle='stock initial' and programmeID=1 and categorieID='$categorieID' and typeID=1 and exercice='$date' order by vignetteID";
  $result = mysqli_query($connect, $sql);
  ?>
  <table id="hor-minimalist-b">
    <thead>
    <tr>
      <th>EXERCICE</th>
      <th>NUMERO CONV</th>
      <th>DATE</th>
      <th>MONTANT</th>
      <th>ECHANGE</th>
      <th>NUMERO</th>
      <th>OBSERVATION</th>
      <th>LIBELLE</th>
      <th width="5%" class="he1">afficher</th>
      <th width="5%" class="he1">modifier</th>
      <th width="5%" class="he1">supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($sorties = mysqli_fetch_assoc($result)) {
      echo "<tr class='hor-minimalist-b'>";
      echo '<td>'.$sorties['exercice'].'</td>';
      echo "<td>".$sorties['num_conv']."</td>";
      echo "<td>".$sorties['date']."</td>";
      echo "<td>".number_format($sorties['valeurE'], 2)."</td>";
      echo "<td>".number_format($sorties['valeurEE'], 2)."</td>";
      echo "<td>".$sorties['numero_E_S']."</td>";
      echo "<td>".$sorties['observation']."</td>";
      echo "<td>".$sorties['libelle']."</td>";
      echo '<td><a href="view.php?id=' . $sorties['vignetteID'] . '"><img src="../../../../images/view.png"></a></td>';
      echo '<td><a href="edit.php?id=' . $sorties['vignetteID'] . '"><img src="../../../../images/edit.png"></a></td>';
      echo '<td><a href="delete.php?id=' . $sorties['vignetteID'] . '" class="confirmation"><img src="../../../../images/delete.png"></a></td>';
      echo "</tr>";
      }//end while
      ?>
    </thead>
    </table>
    <script type="text/javascript">
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) {
  if (!confirm('Vous êtes sûr ?')) e.preventDefault();
  };
  for (var i = 0, l = elems.length; i < l; i++) {
  elems[i].addEventListener('click', confirmIt, false);
  }
  </script>
<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
  <?php
  $sql = "select * from vignette where not libelle='stock initial' and programmeID=1 and categorieID='$categorieID' and typeID=1 and exercice='$date' order by vignetteID";
  $result = mysqli_query($connect, $sql);
  ?>
  <table id="hor-minimalist-b">
    <thead>
    <tr>
      <th>EXERCICE</th>
      <th>NUMERO CONV</th>
      <th>DATE</th>
      <th>MONTANT</th>
      <th>ECHANGE</th>
      <th>NUMERO</th>
      <th>OBSERVATION</th>
      <th>LIBELLE</th>
      <th width="5%" class="he1">afficher</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($sorties = mysqli_fetch_assoc($result)) {
      echo "<tr class='hor-minimalist-b'>";
      echo '<td>'.$sorties['exercice'].'</td>';
      echo "<td>".$sorties['num_conv']."</td>";
      echo "<td>".$sorties['date']."</td>";
      echo "<td>".number_format($sorties['valeurE'], 2)."</td>";
      echo "<td>".number_format($sorties['valeurEE'], 2)."</td>";
      echo "<td>".$sorties['numero_E_S']."</td>";
      echo "<td>".$sorties['observation']."</td>";
      echo "<td>".$sorties['libelle']."</td>";
      echo '<td><a href="view.php?id=' . $sorties['vignetteID'] . '"><img src="../../../../images/view.png"></a></td>';
      echo "</tr>";
      }//end while
      ?>
    </thead>
    </table>
    <script type="text/javascript">
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) {
  if (!confirm('Vous êtes sûr ?')) e.preventDefault();
  };
  for (var i = 0, l = elems.length; i < l; i++) {
  elems[i].addEventListener('click', confirmIt, false);
  }
  </script>
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
      <h2><a href="../../../../login.php">Identifiez vous ici !</a></h2>
      </center>
      <?php
      }
      ?>
