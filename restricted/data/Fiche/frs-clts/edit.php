<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);
    if(isset($_GET['id']) )
    {
          $id=$_GET['id'];
          $sql = "select * from fournisseur_client where frID='$id'";
          $result = mysqli_query($connect, $sql);
    }
    if(isset($_POST['submit']))
    {
        $nom=$_POST['nom'];
        $dir=$_POST['dir'];
        $ville=$_POST['ville'];
        $depa=$_POST['depa'];

        $sql = "update fournisseur_client set nom_prenom='$nom',direction='$dir',ville='$ville',departement='$depa' where frID='$id'";
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
 <!DOCTYPE HTML>
 <HTML>
   <head>
     <meta charset="utf-8">
     <title>Utilisateurs</title>
     <link rel="stylesheet" href="../../../styles/article.css">
     <style type="text/css">
       input {font-weight:bold;
       font-size: 15px;}
    </style>
   </head>
   <body>
     <ul>
   <li><a href="../../../Projet.php">Home</a></li>
   <li><a  href="../categories/Article.php">Categories</a></li>
   <li><a class="active1"
      href="beneficiaire.php">Fournisseurs & clients</a></li>
   <li style="float:right"><a class="active" href="about.asp">About</a></li>
     </ul>
     <center>
     <br>
<form action="" method="POST">
     <table id="hor-minimalist-b">
     <tr>
       <th>Nom et Prénom</th>
       <th>Direction</th>
       <th>Ville</th>
       <th>Département</th>
     </tr>
     <tr>
       <?php while($sorties = mysqli_fetch_assoc($result)) { ?>
<td><input type="text" style="width:50%;" name="nom" value="<?php echo $sorties['nom_prenom'];?>"></td>
<td><input type="text" style="width:50%;" name="dir" value="<?php  echo $sorties['direction']; ?>" ></td>
<td><input type="text" style="width:50%;" name="ville" value="<?php echo $sorties['ville'];?>"></td>
<td><input type="text" style="width:50%;" name="depa" value="<?php  echo $sorties['departement'];} ?>" ></td>
</tr>
</table>
  <input type="submit" value="Enregistrer" name="submit" class="kek">
</form>
