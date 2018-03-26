<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";

$connect = mysqli_connect ($hostname,$username,$password,$databasename);
if (isset($_POST['submit']))
{
  $sql = "insert into vignette (exercice,date,valeurE,categorieID,libelle,programmeID,frID,operateurID) values ((select exercice from vignette where libelle='stock initial' and vignetteID=1),(select date from vignette where libelle='stock initial' and vignetteID=1),(select sum(valeurE) from vignette where libelle='stock initial' and operateurID=0),'$categorie','Stock Initial','$prog','1','2')";

   if(!mysqli_query($connect,$sql))
   {
     echo 'not inserted';
   }
  else
  {
      header('location:inventaire.php');
  }
  }
