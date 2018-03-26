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
function nom($connect)
{
  $output = '';
  $sql = "select * from fournisseur_client where frID>1";
  $result = mysqli_query($connect,$sql);
  while($row=mysqli_fetch_array($result))
  {
    $output .='<option value="'.$row["frID"].'">'.$row["nom_prenom"].'</option>';
  }
  return $output;
}
?>
<?php
  session_start();

  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
  ?>
<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>BON DE SORTIE VIGNETTES</title>
    <link rel="stylesheet" href="../../../../styles/styles2.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
    <li><a href="../../../../Projet.php">Home</a></li>
    <li>
      <div class="ayy">
        <button class="ayybtn">Nouveau</button>
        <div class="ayyctn">
            <a  href="../normal/vignette-normal.php">Vignette Normal</a>
            <a class="active2" href="vignette-pack.php">Vignette Pacczoo</a>
        </div>
      </div>
      </li>
    <li><a  href="../../consult.php">Consultation</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <link rel="stylesheet" href="../../../../styles/side.css">
        <div id="mySidenav" class="sidenav">
    <a href="../../../entree/entree.php" id="about">Entrées</a>
    <a href="../../sortie.php" id="blog">Sorties</a>
    <a href="../../../consultation/consultation.php" id="projects">Consultation</a>
    </div>
    <center>
    <img class="png" src="../../../../images/andzoa.png">
    <h2 align="center"class="h2">BON DE SORTIE VIGNETTES</h2>
    <br>
    <form action="insert.php" method="post">
      <div>
      <select style="background-color:#eee;border:2px black;outline:2px;text-align-last:center" id="categorieID" name="categorie">
            <option value="">Type de vignette</option>
            <?php echo categorie($connect) ?>
      </select>
    </div>
      <table class="n1">
        <tr>
          <th>NUMERO</th>
        </tr>
        <tr>
          <td>
          <div id="result">veuillez choisir une catégorie</div><input type="hidden" name="numero" id="numerohidden"/>
        </td>
        </tr>
      </table>
      <table class="n2">
        <tr>
          <th>Acquereur:</td>
            <th><select style="width:100%;background-color:#eee;border:0px;outline:0px;text-align-last:center" name="acquereur" id="frID">
                  <option value="">Nom et prenom</option>
                  <?php echo nom($connect) ?>
              </select></th>
        </tr>
        <tr>
          <th>Direction :</th>
          <td>
            <div id="result2" name="directions">Direction</div><input type="hidden" name="direction" id="directionhidden"/>
          </td>
          </tr>
          <script>
          $(document).ready(function() {
              $("#frID").change(function(){
                  var frID = $(this).val();
                  if(frID == ""){
                    $("#result2").html("Direction");
                  }else{
                        $.ajax({
                          url:"fetch.php",
                          method:"GET",
                          data:{fr:frID},
                          dataType:"text",
                          success:function(data)
                        {
                          $("#directionhidden").val(data);
                          $("#result2").html(data);
                        }
                      });
                  }
                });
            });
          </script>
      </table>
      <br>
      <table class="n3">
        <tr>
          <th>EXERCICE</th>
          <th>DATE</th>
          <th>MONTANT</th>
          <th>OBSERVATION</th>
          <th>LIBELLE</th>
        </tr>
        <tr class="fields">
         <th rowspan="4"><input type="text" name="exercice" placeholder="<?php echo date("Y"); ?>"></th>
         <th rowspan="4"><input type="text" name="DATE" placeholder="JJ/MM/AAAA"></th>
         <th rowspan="4"><input type="text" name="MONTANT" value="0"></th>
         <th rowspan="4"><input type="text" name="OBSERVATION"></th>
         <th rowspan="4"><input type="text" name="LIBELLE"></th>
       </tr>
      </table>
     <br>
        <input type="submit" value="Enregistrer sous normal" name="submit1" class="submit1">
        <br>
        <br>
        <input type="submit" value="Enregistrer sous echange" name="submit2" class="submit2">
        <br>
        <br>
        <button class="hhh" onclick="history.go(-1);">Annuler</button>
    </form>
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
