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
          function beneficiaire($connect)
          {
            $id=$_GET['id'];
            $output = '';
            $sql = "select * from fournisseur_client where frID>1";
            $result = mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result))
            {
              $output .='<option value="'.$row["frID"].'">'.$row["nom_prenom"].'</option>';
            }
            return $output;
          }
    }
    if(isset($_POST['submit']))
    {
        $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : 0;
        $exercice=$_POST['newexercice'];
        $numc=$_POST['newnumc'];
        $date=$_POST['newdate'];
        $mt=$_POST['newmt'];
        $mt2=$_POST['newmt2'];
        $num=$_POST['newnumero'];
        $obs=$_POST['newobs'];
        $lbl=$_POST['newlbl'];
        $sql = "update vignette set exercice='$exercice',num_conv='$numc',date='$date',valeurE='$mt',valeurEE='$mt2',numero_E_S='$num',observation='$obs',libelle='$lbl',frID='$categorie' where vignetteID='$id'";
        if(!mysqli_query($connect,$sql))
        {
          echo 'not inserted';
        }
        else
        {
           header('location:consultation.php');
        }
        }
 ?>
 <!DOCTYPE HTML>
 <HTML>
   <head>
     <meta charset="utf-8">
     <title>Utilisateurs</title>
     <link rel="stylesheet" href="../../../../styles/article.css">
     <style type="text/css">
       input {font-weight:bold;
       font-size: 15px;}
    </style>
   </head>
   <body>
     <ul>
     <li><a href="../../../../Projet.php">Home</a></li>
     <li><a  href="../../new.php">Nouveau</a></li>
     <li>
       <div class="ayy">
         <button class="ayybtn">Consultation</button>
         <div class="ayyctn">
             <a class="active2" href="consultation.php">Normal</a>
             <a href="../pack/consultation.php">Pacczoo</a>
         </div>
       </div>
       </li>
     <li style="float:right"><a class="active" href="about.asp">About</a></li>
     </ul>
     <center>
     <br>
<form action="" method="POST">
     <table id="hor-minimalist-b">
     <tr>
       <th>EXERCICE</th>
       <th>NUMERO CONV</th>
       <th>DATE</th>
       <th>MONTANT</th>
       <th>ECHANGE</th>
       <th>NUMERO</th>
       <th>OBSERVATION</th>
       <th>LIBELLE</th>
       <th>Fr/clt</th>
     </tr>
     <tr>
       <?php while($sorties = mysqli_fetch_assoc($result)) { ?>
<td><input type="text" style="width:50%;" name="newexercice" value="<?php echo $sorties['exercice'];?>"></td>
<td><input type="text"  name="newnumc" value="<?php  echo $sorties['num_conv']; ?>" ></td>
<td><input type="text"  name="newdate" value="<?php  echo $sorties['date']; ?>" ></td>
<td><input type="text"  name="newmt" value="<?php  echo $sorties['valeurE']; ?>" ></td>
<td><input type="text"  name="newmt2" value="<?php  echo $sorties['valeurEE']; ?>" ></td>
<td><input type="text"  name="newnumero" value="<?php  echo $sorties['numero_E_S']; ?>" ></td>
<td><input type="text"  name="newobs" value="<?php  echo $sorties['observation']; ?>" ></td>
<td><input type="text"  name="newlbl" value="<?php  echo $sorties['libelle'];} ?>" ></td>
<td><select style="background-color:#eee;border:2px black;outline:2px;text-align-last:center" id="categorieID" name="categorie">
      <option value="">Beneficiaire</option>
      <?php echo beneficiaire($connect) ?>
</select>
</td>
</tr>
</table>
  <input type="submit" value="Enregistrer" name="submit" class="kek">
</form>
