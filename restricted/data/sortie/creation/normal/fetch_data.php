<?php

if(isset($_GET["categorie"])){
  $categorieID = $_GET["categorie"];
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "andzoa";
  $connect = mysqli_connect ($hostname,$username,$password,$databasename);
}

$sql = "select count(*)+1 numero_E_S from vignette where not libelle='stock initial' and categorieID=$categorieID  and typeID=2";
$result = mysqli_query($connect, $sql);

  while($d = mysqli_fetch_assoc($result))
echo $d['numero_E_S'];
?>
