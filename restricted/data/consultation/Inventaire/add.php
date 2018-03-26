<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";

$connect = mysqli_connect ($hostname,$username,$password,$databasename);
function categorie($connect)
{
  $output = '';
  $sql = "select * from categorie";
  $result = mysqli_query($connect,$sql);
  while($row=mysqli_fetch_array($result))
  {
    $output .='<option value="'.$row["categorieID"].'">'.$row["type"].'</option>';
  }
  return $output;
}
?>
<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>INVENTAIRE</title>
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
    <li><a  href="inventaire.php">Consultation</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
    <form action="" method="post">
    <table id="hor-minimalist-b">
    <tr>
      <th>EXERCICE</th>
      <th>DATE</th>
      <th>TYPE</th>
      <th>VALEUR</th>
      <th>PROGRAMME</th>
    </tr>
      <tr>
        <td><input type="text" name="exercice"></td>
        <td><input type="text" name="date"></td>
        <td><select style="background-color:#eee;text-align-last:center;width:100%;" id="categorieID" name="categorie">
              <option value="">Type de vignette</option>
              <?php echo categorie($connect) ?>
        </select></td>
        <td><input type="text" name="valeur"></td>
        <td><input type="radio" name="type" value="1" checked >Normal <br> <input type="radio" name="type" value="2">Pacczoo </td>
      </tr>
    </table>
    <input type="submit" value="Enregistrer" name="submit" class="kek">
</body>
</html>
<?php
if (isset($_POST['submit']))
{

$exercice = isset($_POST["exercice"]) ? $_POST["exercice"] : 0;

$date = isset($_POST["date"]) ? $_POST["date"] : 0;

$categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : 0;

$valeur = $_POST["valeur"];

$prog = $_POST["type"];

$sql = "insert into vignette (exercice,date,valeurE,categorieID,libelle,programmeID,frID) values ('$exercice', '$date','$valeur','$categorie','Stock Initial','$prog','1')";

 if(!mysqli_query($connect,$sql))
 {
   echo 'not inserted';
 }
else
{
    header('location:inventaire.php');
}
}

 ?>
