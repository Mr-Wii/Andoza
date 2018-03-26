<?php

if(isset($_GET["fr"])){
  $frID = $_GET["fr"];
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "andzoa";
  $connect = mysqli_connect ($hostname,$username,$password,$databasename);
}

$sql = "select * from fournisseur_client where frID=$frID";
$result = mysqli_query($connect, $sql);

  while($d = mysqli_fetch_assoc($result))
echo $d['direction'];
?>
