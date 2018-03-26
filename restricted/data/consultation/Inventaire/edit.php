<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);
    if(isset($_GET['id']) )
    {
          $id=$_GET['id'];
          $sql = "select * from vignette where vignetteID='$id'";
          $result = mysqli_query($connect, $sql);
    }
    if(isset($_POST['submit']))
    {
        $exercice=$_POST['newexercice'];
        $date=$_POST['newdate'];
        $mt=$_POST['newmt'];
        $lbl=$_POST['newlbl'];
        $sql = "update vignette set exercice='$exercice',date='$date',valeurE='$mt',libelle='$lbl' where vignetteID='$id'";
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
 <!DOCTYPE HTML>
 <HTML>
   <head>
     <meta charset="utf-8">
     <title>INVENTAIRE</title>
     <link rel="stylesheet" href="../../../styles/article.css">
     <style type="text/css">
       input {font-weight:bold;
       font-size: 15px;}
    </style>
   </head>
   <body>
     <ul>
   <li><a href="../../../Projet.php">Home</a></li>
   <li><a href="../etatglobal/Etat.php">Etat Global</a></li>
   <li><a class="active1" href="inventaire.php">Inventaire</a></li>
   <li><a href="../consult.php">Fiche Individuel</a></li>
   <li style="float:right"><a class="active" href="about.asp">About</a></li>
     </ul>
     <center>
     <br>
<form action="" method="POST">
     <table id="hor-minimalist-b">
     <tr>
       <th>EXERCICE</th>
       <th>DATE</th>
       <th>MONTANT</th>
       <th>LIBELLE</th>
     </tr>
     <tr>
       <?php while($sorties = mysqli_fetch_assoc($result)) { ?>
<td><input type="text" style="width:50%;" name="newexercice" value="<?php echo $sorties['exercice'];?>"></td>
<td><input type="text" style="width:50%;"  name="newdate" value="<?php  echo $sorties['date']; ?>" ></td>
<td><input type="text" style="width:50%;" name="newmt" value="<?php  echo $sorties['valeurE']; ?>" ></td>
<td><input type="text" style="width:50%;" name="newlbl" value="<?php  echo $sorties['libelle'];} ?>" ></td>
</tr>
</table>
  <input type="submit" value="Enregistrer" name="submit" class="kek">
</form>
