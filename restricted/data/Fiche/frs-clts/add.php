<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";

$connect = mysqli_connect ($hostname,$username,$password,$databasename);

?>
<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>Bénéficiaires</title>
    <link rel="stylesheet" href="../../../styles/article.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
    <li><a href="../../../Projet.php">Home</a></li>
    <li>
      <div class="ayy">
        <button class="ayybtn">Nouveau</button>
      </div>
      </li>
    <li><a  href="beneficiaire.php">Consultation</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
    <form action="" method="post">
    <table id="hor-minimalist-b">
    <tr>
      <th>NOM & PRENOM</th>
      <th>DIRECTION</th>
      <th>VILLE</th>
      <th>DEPARTEMENT</th>
    </tr>
      <tr>
        <td><input type="text" name="nom"></td>
        <td><input type="text" name="direction"></td>
        <td><input type="text" name="ville"></td>
        <td><input type="text" name="depart"></td>
      </tr>
    </table>
    <input type="submit" value="Enregistrer" name="submit" class="kek">
</body>
</html>
<?php
if (isset($_POST['submit']))
{

$nom = isset($_POST["nom"]) ? $_POST["nom"] : 0;

$direction = isset($_POST["direction"]) ? $_POST["direction"] : 0;

$ville = isset($_POST["ville"]) ? $_POST["ville"] : 0;

$depart = $_POST["depart"];


$sql = "insert into fournisseur_client (nom_prenom,direction,ville,departement) values ('$nom', '$direction','$ville','$depart')";

 if(!mysqli_query($connect,$sql))
 {
   echo 'not inserted';
 }
else
{
    header('location:beneficiaire.php');
}
}

 ?>
