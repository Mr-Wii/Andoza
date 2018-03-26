<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);
    if(isset($_GET['id']) )
    {
          $id=$_GET['id'];
          $sql = "select email from users where id='$id'";
          $result = mysqli_query($connect, $sql);
          $sql1 = "select password from users where id='$id'";
          $result1 = mysqli_query($connect, $sql1);
    }
    if(isset($_POST['newemail']))
    {
        $newemail=$_POST['newemail'];
        $newpassword = (password_hash($_POST['newpassword'], PASSWORD_BCRYPT));
        $type=$_POST["type"];
        $sql = "update users set email='$newemail',password='$newpassword',user_level='$type' where id='$id'";
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
 <!DOCTYPE HTML>
 <HTML>
   <head>
     <meta charset="utf-8">
     <title>Utilisateurs</title>
     <link rel="stylesheet" href="../styles/article.css">
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
<form action="" method="POST">
     <table id="hor-minimalist-b">
     <tr>
       <th>Email</th>
       <th>Mot De pass</th>
       <th>Type d'utilisateur</th>
     </tr>
     <tr>
<td><input type="text" style="width:50%;" name="newemail" value="<?php
while($sorties = mysqli_fetch_assoc($result)) {
  echo $sorties['email'];
} ?>"></td>
<td><input type="password"  name="newpassword" value="<?php
while($sorties1 = mysqli_fetch_assoc($result1)) {
  echo $sorties1['password'];
} ?>"></td>
<td><input type="radio" id="option-one" name="type" value="admin" ><label for="option-one">Admin</label><br><input type="radio" id="option-two" name="type" value="normal"><label for="option-two">Normal</label></td>
</tr>
</table>
  <input type="submit" value="Enregistrer" name="submit" class="kek">
</form>
