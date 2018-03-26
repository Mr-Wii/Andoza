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
    <title>OUVERTURE</title>
    <link rel="stylesheet" href="styles/article.css">
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
      <li><a class="active1" href="projet.php">Home</a></li>
      <li><a  href="../logout.php">Déconnecter</a></li>
      <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
<h1>Ouverture d'un nouveau exercice <script>document.write(new Date().getFullYear())</script></h1>
<br>
<br>
<br>
<br>
<h1>↓</h1>
<form action="" method="post">
  <input type="submit" value="procéder" name="submit" class="kek">
</form>
<script type="text/javascript">
var elems = document.getElementsByClassName('kek');
var confirmIt = function (e) {
if (!confirm('Vous êtes sûr ?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
elems[i].addEventListener('click', confirmIt, false);
}
</script>
<?php
if (isset($_POST['submit']))
{

$sql .= "alter table vignette auto_increment=1;";
mysqli_multi_query($connect, $sql);
header('location:data/consultation/inventaire/inventaire.php');}
?>
