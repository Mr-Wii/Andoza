<?php
  session_start();

  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
  ?>
<html>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";
$connect = mysqli_connect ($hostname,$username,$password,$databasename);
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql = "delete from vignette where vignetteID='$id'";
$query1 = mysqli_query($connect, $sql);
if($query1)
{
header('location:consultation.php');
die;
}
}
?>
</body>
</html>
<?php } else { ?>
  <a href="../../../../login.php">vous n'avez pas d'autorisation</a>

  <?php
  }

  ?>
