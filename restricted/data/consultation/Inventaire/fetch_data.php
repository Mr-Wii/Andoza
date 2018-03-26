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
?>
<link rel="stylesheet" href="table.css" type="text/css">
  <?php
  $sql = "select * from vignette inner join categorie on vignette.categorieID=categorie.categorieID inner join programme on vignette.programmeID=programme.programmeID where libelle='Stock Initial' and exercice='$date'";
  $result = mysqli_query($connect, $sql);
  ?>
  <table id="hor-minimalist-b">
    <thead>
    <tr>
      <th>EXERCICE</th>
      <th>DATE</th>
      <th>STOCK INITIAL</th>
      <th width="5%" class="he1">modifier</th>
      <th width="5%" class="he1">supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($sorties = mysqli_fetch_assoc($result)) {
      echo "<tr class='hor-minimalist-b'>";
      echo '<td>'.$sorties['exercice'].'</td>';
      echo "<td>".$sorties['date']."</td>";
      echo "<td>".number_format($sorties['valeurE'], 2)."</td>";
      echo '<td><a href="edit.php?id=' . $sorties['vignetteID'] . '"><img src="../../../../images/edit.png"></a></td>';
      echo '<td><a href="delete.php?id=' . $sorties['vignetteID'] . '" class="confirmation"><img src="../../../../images/delete.png"></a></td>';
      echo "</tr>";
      }//end while
      ?>
    </thead>
    <script type="text/javascript">
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) {
  if (!confirm('Vous êtes sûr ?')) e.preventDefault();
  };
  for (var i = 0, l = elems.length; i < l; i++) {
  elems[i].addEventListener('click', confirmIt, false);
  }
  </script>
    </table>
    <div class="cyka">
    <p><a class="a1" href="add.php"><img src="../../../images/add.png" alt="Ajouter un nouveau article"  style="width:300px;"><br>Ajouter</a></p>
    </div>
