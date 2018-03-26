<?php
session_start();
if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
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
    <title>USERS</title>
    <link rel="stylesheet" href="../styles/article.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
      <li><a  href="../projet.php">Home</a></li>
      <li><a  class="active1" href="../users.php">Utilisateurs</a></li>
      <li><a  href="../logout.php">Déconnecter</a></li>
      <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
    <form action="" method="post">
    <table id="hor-minimalist-b">
    <tr>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>TYPE D'UTILISATEUR</th>
    </tr>
      <tr>
        <td><input type="text" style="width:50%;" name="email"></td>
        <td><input type="password" name="password"></td>
        <td><input type="radio" name="type" value="admin">Admin <br> <input type="radio" name="type" value="normal">Normal </td>
      </tr>
    </table>
    <input type="submit" value="Enregistrer" name="submit" class="kek">
  </form>
</body>
</html>
<?php
if (isset($_POST['submit']))
{

$email = isset($_POST["email"]) ? $_POST["email"] : 0;

$password = (password_hash($_POST['password'], PASSWORD_BCRYPT));

$type = isset($_POST["type"]) ? $_POST["type"] : 0;


$sql = "insert into users (email,password,user_level) values ('$email', '$password','$type')";

 if(!mysqli_query($connect,$sql))
 {
   echo 'not inserted';
 }
else
{
    header('location:../users.php');
}
}

 ?>
 <?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>

   <!DOCTYPE HTML>
   <HTML>
     <head>
       <meta charset="utf-8">
       <title>Erreur d'autorisation</title>
       <link rel="stylesheet" href="../styles/article.css">
       <style type="text/css">
         input {font-weight:bold;
         font-size: 15px;}
      </style>
     </head>
     <body>
       <ul>
         <li><a class="active1" href="../../index">Home</a></li>
         <li><a href="../../login.php">Identifier</a></li>
         <li><a href="../../register.php">Enregistrer</a></li>
         <li style="float:right"><a class="active" href="about.asp">About</a></li>
       </ul>
       <center>
         <br>
         <br>
       <img src="../images/andzoa.png">
   <center>
     <h1>vous n'avez pas d'autorisation !!</h1>
   </center>
   <?php } else { ?>
     <!DOCTYPE HTML>
     <HTML>
       <head>
         <meta charset="utf-8">
         <title>Erreur d'autorisation</title>
         <link rel="stylesheet" href="../styles/article.css">
         <style type="text/css">
           input {font-weight:bold;
           font-size: 15px;}
        </style>
       </head>
       <body>
         <ul>
           <li><a class="active1" href="../../index.php">Home</a></li>
           <li><a href="../../login.php">Identifier</a></li>
           <li><a href="../../register.php">Enregistrer</a></li>
           <li style="float:right"><a class="active" href="about.asp">About</a></li>
         </ul>
         <center>
           <br>
           <br>
         <img src="../images/andzoa.png">
     <center>
       <h1>vous n'avez pas d'autorisation !!</h1>
     </center>
     <?php
     }
     ?>
