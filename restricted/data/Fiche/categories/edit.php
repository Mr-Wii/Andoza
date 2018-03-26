<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);
    if(isset($_GET['id']) )
    {
          $id=$_GET['id'];
          $sql = "select * from categorie where categorieID='$id'";
          $result = mysqli_query($connect, $sql);
    }
    if(isset($_POST['submit']))
    {
        $exercice=$_POST['newexercice'];
        $numc=$_POST['newnumc'];
        $sql = "update categorie set code='$exercice',type='$numc' where categorieID='$id'";
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
 <!DOCTYPE HTML>
 <HTML>
   <head>
     <meta charset="utf-8">
     <title>CATEGORIES</title>
     <link rel="stylesheet" href="../../../styles/article.css">
     <style type="text/css">
       input {font-weight:bold;
       font-size: 15px;}
    </style>
   </head>
   <body>
     <ul>
   <li><a href="../../../Projet.php">Home</a></li>
   <li><a class="active1" href="Article.php">Categories</a></li>
   <li><a href="../frs-clts/beneficiaire.php">Fournisseurs & clients</a></li>
   <li style="float:right"><a class="active" href="about.asp">About</a></li>
     </ul>
     <center>
     <br>
<form action="" method="POST">
     <table id="hor-minimalist-b">
     <tr>
       <th>CODE</th>
       <th>Type de Vignettes</th>
     </tr>
     <tr>
       <?php while($sorties = mysqli_fetch_assoc($result)) { ?>
<td><input type="text" style="width:50%;" name="newexercice" value="<?php echo $sorties['code'];?>"></td>
<td><input type="text" style="width:50%;" name="newnumc" value="<?php  echo $sorties['type'];} ?>" ></td>
</tr>
</table>
  <input type="submit" value="Enregistrer" name="submit" class="kek">
</form>
