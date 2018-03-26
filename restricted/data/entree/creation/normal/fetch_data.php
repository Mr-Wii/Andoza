<?php

if(isset($_GET["categorie"])){
  $categorieID = $_GET["categorie"];
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "andzoa";
  $connect = mysqli_connect ($hostname,$username,$password,$databasename);
}

$sql = "select count(*)+1 num_conv from vignette where not libelle='stock initial' and categorieID=$categorieID and typeID=1";
$result = mysqli_query($connect, $sql);

  while($d = mysqli_fetch_assoc($result))
echo $d['num_conv'];
?>
