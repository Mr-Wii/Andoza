<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";

$connect = mysqli_connect ($hostname,$username,$password,$databasename);
  session_start();

  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
  ?>

<?php


if (isset($_POST['submit1']))

{

$exercice = isset($_POST["exercice"]) ? $_POST["exercice"] : 0;

$numero = isset($_POST["numero"]) ? $_POST["numero"] : 0;

$categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : 0;

$frID = $_POST["acquereur"];

$DATE = isset($_POST["DATE"]) ? $_POST["DATE"] : 0;

$MONTANT = isset($_POST["MONTANT"]) ? $_POST["MONTANT"] : 0;

$OBSERVATION = isset($_POST["OBSERVATION"]) ? $_POST["OBSERVATION"] : 0;

$LIBELLE = isset($_POST["LIBELLE"]) ? $_POST["LIBELLE"] : 0;

$sql = "insert into vignette (exercice,date,valeurE,num_conv,observation,libelle,categorieID,programmeID,typeID,frID) values ('$exercice', '$DATE','$MONTANT','$numero','$OBSERVATION','$LIBELLE','$categorie','1','1','$frID')";

 if(!mysqli_query($connect,$sql))
 {
   echo 'not inserted';
 }
else
{
    header('location:../../new.php');
}
}
if (isset($_POST['submit2']))
{
  $exercice = isset($_POST["exercice"]) ? $_POST["exercice"] : 0;

  $numero = isset($_POST["numero"]) ? $_POST["numero"] : 0;

  $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : 0;

  $frID = isset($_POST["acquereur"]) ? $_POST["acquereur"] : 0;

  $DATE = isset($_POST["DATE"]) ? $_POST["DATE"] : 0;

  $MONTANT = isset($_POST["MONTANT"]) ? $_POST["MONTANT"] : 0;

  $OBSERVATION = isset($_POST["OBSERVATION"]) ? $_POST["OBSERVATION"] : 0;

  $LIBELLE = isset($_POST["LIBELLE"]) ? $_POST["LIBELLE"] : 0;

  $sql = "insert into vignette (exercice,date,valeurEE,num_conv,observation,libelle,categorieID,programmeID,typeID,frID) values ('$exercice', '$DATE','$MONTANT','$numero','$OBSERVATION','$LIBELLE','$categorie','1','1','$frID')";

   if(!mysqli_query($connect,$sql))
   {
     echo 'not inserted';
   }
  else
  {
      header('location:../../new.php');
  }
  }
 ?>
 <?php } else { ?>
   <a href="../../../login.php">vous n'avez pas d'autorisation</a>
   <?php
   }
   ?>
