<?php
  session_start();
  $date=$_SESSION['exercice'];
  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
  ?>
<?php
  if(isset($_GET['id']))
  {
  $id = intval($_GET['id']);
  }
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databasename = "andzoa";
  $connect = mysqli_connect ($hostname,$username,$password,$databasename);

  $sql="select * from vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID where vignetteID ='$id'";

  $records=mysqli_query($connect, $sql);

  while ($sorties=mysqli_fetch_assoc($records)) {
    $num = "<td>".$sorties['numero_E_S']."</td>";
    $acq = "<td>".$sorties['nom_prenom']."</td>";
    $dire = "<td>".$sorties['direction']."</td>";
    $date ="<td>".$sorties['date']."</td>";
    $des = "<td>".$sorties['type']."</td>";
    $mont = "<td>".$sorties['valeur']."</td>";
    $obs = "<td>".$sorties['observation']."</td>";
        }//end while
?>
<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>BON DE SORTIE VIGNETTES</title>
    <link rel="stylesheet" href="../../../../styles/styles2.css">
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
      <li><a  href="../../../../Projet.php">Home</a></li>
      <li><a  href="../../new.php">Nouveau</a></li>
      <li><a class="active1"  href="../../consult.php">Consultation</a></li>
      <li><a href="javascript:window.print()">Imprimer</a></li>
  <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <img src="../../../../images/andzoa.png">
    <h2 align="center"class="h2">BON DE SORTIE VIGNETTES<br>Carburant</h2>
    <table class="n1">
      <tr>
        <th>BON DE SORTIE N</th>
      </tr>
      <?php
        echo $num;
      ?>
    </table>
    <table class="n2">
      <tr >
        <th>Acquereur :</td>
          <?php
          echo $acq;
           ?>
    </tr>
      <tr>
        <th>Direction :</th>
        <?php
        echo $dire;
         ?>
      </tr>
    </table>
    <br>
    <table class="n3">
      <tr height="30px;">
        <th>DATE</th>
        <th>DESIGNATION</th>
        <th>MONTANT</th>
        <th>OBSERVATION</th>
      </tr>
        <tr height="120px;">
      <?php
              echo $date;
              echo $des;
              echo $mont;
              echo $obs;
       ?>
     </tr>
   </table>
     <br>
        <p><b>SIGNATURE:</b></p>
  <style type="text/css" media="print">
  body, html {
transform: scale(0.9);
margin: 0px;
margin-left: -50px;
margin-right: -100px;
padding:0px;
margin-top: 50px;
  }
  ul {
    visibility: hidden;
    display: none;
  }
  .printbutton {
    visibility: hidden;
    display: none;
  }
  </style>
</center>
<div class="terms">
<p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
</div>
  </body>
</html>
<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>
  <?php
    if(isset($_GET['id']))
    {
    $id = intval($_GET['id']);
    }
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);

    $sql="select * from vignette inner join fournisseur_client on vignette.frID=fournisseur_client.frID inner join categorie on vignette.categorieID=categorie.categorieID where vignetteID ='$id'";

    $records=mysqli_query($connect, $sql);

    while ($sorties=mysqli_fetch_assoc($records)) {
      $num = "<td>".$sorties['numero_E_S']."</td>";
      $acq = "<td>".$sorties['nom_prenom']."</td>";
      $dire = "<td>".$sorties['direction']."</td>";
      $date ="<td>".$sorties['date']."</td>";
      $des = "<td>".$sorties['type']."</td>";
      $mont = "<td>".$sorties['valeur']."</td>";
      $obs = "<td>".$sorties['observation']."</td>";
          }//end while
  ?>
  <!DOCTYPE HTML>
  <HTML>
    <head>
      <meta charset="utf-8">
      <title>BON DE SORTIE VIGNETTES</title>
      <link rel="stylesheet" href="../../../styles/styles2.css">
      <style type="text/css">
        input {font-weight:bold;
        font-size: 15px;}
     </style>
    </head>
    <body>
      <ul>
        <li><a  href="../../../Projet.php">Home</a></li>
        <li><a class="active1"  href="../consult.php">Consultation</a></li>
        <li><a href="javascript:window.print()">Imprimer</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
      </ul>
      <center>
      <img src="../../../images/andzoa.png">
      <h2 align="center"class="h2">BON DE SORTIE VIGNETTES<br>Carburant</h2>
      <table class="n1">
        <tr>
          <th>BON DE SORTIE N</th>
        </tr>
        <?php
          echo $num;
        ?>
      </table>
      <table class="n2">
        <tr>
          <th>Acquereur :</td>
            <?php
            echo $acq;
             ?>
        </tr>
        <tr>
          <th>Direction :</th>
          <?php
          echo $dire;
           ?>
        </tr>
      </table>
      <br>
      <table class="n3">
        <tr>
          <th>DATE</th>
          <th>DESIGNATION</th>
          <th>MONTANT</th>
          <th>OBSERVATION</th>
        </tr>
        <?php
                echo $date;
                echo $des;
                echo $mont;
                echo $obs;
         ?>
     </table>
       <br>
          <p><b>SIGNATURE:</b></p>
    <style type="text/css" media="print">
    body, html {
  transform: scale(0.9);
  margin: 0px;
  margin-left: -50px;
  margin-right: -100px;
  padding:0px;
  margin-top: 50px;
    }
    ul {
      visibility: hidden;
      display: none;
    }
    .printbutton {
      visibility: hidden;
      display: none;
    }
    </style>
  </center>
  <div class="terms">
  <p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
  </div>
    </body>
  </html>
  <?php } else { ?>
    <!DOCTYPE HTML>
    <HTML>
      <head>
        <meta charset="utf-8">
        <title>connection erreur</title>
        <link rel="stylesheet" href="../../../styles/index.css">
        <style type="text/css">
          input {font-weight:bold;
          font-size: 15px;}
       </style>
      </head>
      <body>
        <ul>
          <li><a  href="../../../Projet.php">Home</a></li>
          <li style="float:right"><a class="active" href="about.asp">About</a></li>
          <li style="float:right"><a class="active" href="../../.././login.php">Log in</a></li>
        </ul>
        <center>
          <br>
          <br>
        <img src="../../../images/andzoa.png">
    <center>
      <h1>vous n'avez pas d'autorisation !!</h1>
    <h2><a href="../../../../login.php">Identifiez vous ici !</a></h2>
    </center>
    <?php
    }
    ?>
