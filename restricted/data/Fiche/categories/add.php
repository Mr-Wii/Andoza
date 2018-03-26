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
    <title>CATEGORIES</title>
    <link rel="stylesheet" href="table.css">
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
    <li><a  href="article.php">Consultation</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
    <form action="" method="post">
    <table id="hor-minimalist-b">
    <tr>
      <th>CODE</th>
      <th>TYPE DE VIGNETTE</th>
    </tr>
      <tr>
        <td><input type="text" name="CODE"></td>
        <td><input type="text" name="TYPE"></td>
      </tr>
    </table>
    <input type="submit" value="Enregistrer" name="submit" class="kek">
</body>
</html>
<?php
if (isset($_POST['submit']))
{

$CODE = isset($_POST["CODE"]) ? $_POST["CODE"] : 0;

$TYPE = isset($_POST["TYPE"]) ? $_POST["TYPE"] : 0;


$sql = "insert into categorie (code,type) values ('$CODE', '$TYPE')";

 if(!mysqli_query($connect,$sql))
 {
   echo 'not inserted';
 }
else
{
    header('location:article.php');
}
}

 ?>
