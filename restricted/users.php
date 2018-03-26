<?php
  session_start();
  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "andzoa";
    $connect = mysqli_connect ($hostname,$username,$password,$databasename);
    $sql = "select * from users order by id";
    $result = mysqli_query($connect, $sql);
?>
<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>USERS</title>
    <link rel="stylesheet" href="styles/article.css">
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
      <li><a  href="projet.php">Home</a></li>
      <li><a  class="active1" href="#">Utilisateurs</a></li>
      <li><a  href="../logout.php">Déconnecter</a></li>
      <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
    <form action="" method="post">

    <table id="hor-minimalist-b">
    <tr>
      <th>Email</th>
      <th>Mot De pass</th>
      <th>Type d'utilisateur</th>
      <th class="row1">MODIFIER</td>
      <th class="row2">SUPPRIMER</td>
    </tr>
<?php
while($sorties = mysqli_fetch_assoc($result)) {
  echo "<tr class='hor-minimalist-b'>";
  echo '<td>'.$sorties['email'].'</td>';
  echo "<td>".$sorties['password']."</td>";
  echo "<td>".$sorties['user_level']."</td>";
  echo '<td><a href="users/edit.php?id=' . $sorties['id'] . '"><img src="images/edit.png"></a></td>';
  echo '<td><a href="users/delete.php?id=' . $sorties['id'] . '" class="confirmation"><img src="images/delete.png"></a></td>';
  echo "</tr>";
}
 ?>
    </table>
  </form>
  <div class="cyka">
  <p><a class="a1" href="users/add.php"><img src="images/add.png" alt="Ajouter un nouveau utilisateur"  style="width:300px;"><br>Ajouter un nouveau utilisateur</a></p>
  </div>
  <script type="text/javascript">
var elems = document.getElementsByClassName('confirmation');
var confirmIt = function (e) {
if (!confirm('Vous êtes sûr ?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
elems[i].addEventListener('click', confirmIt, false);
}
</script>
</body>
</html>

<?php } elseif(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="normal")) { ?>

  <!DOCTYPE HTML>
  <HTML>
    <head>
      <meta charset="utf-8">
      <title>Erreur d'autorisation</title>
      <link rel="stylesheet" href="styles/index.css">
      <style type="text/css">
        input {font-weight:bold;
        font-size: 15px;}
     </style>
    </head>
    <body>
      <ul>
        <li><a class="active1" href="../index.php">Home</a></li>
        <li><a href="../login.php">Identifier</a></li>
        <li><a href="../register.php">Enregistrer</a></li>
        <li style="float:right"><a class="active" href="about.asp">About</a></li>
      </ul>
      <center>
        <br>
        <br>
      <img src="images/andzoa.png">
  <center>
    <h1>vous n'avez pas d'autorisation !!</h1>
  </center>
  <?php } else { ?>
    <!DOCTYPE HTML>
    <HTML>
      <head>
        <meta charset="utf-8">
        <title>Erreur d'autorisation</title>
        <link rel="stylesheet" href="styles/index.css">
        <style type="text/css">
          input {font-weight:bold;
          font-size: 15px;}
       </style>
      </head>
      <body>
        <ul>
          <li><a class="active1" href="../index.php">Home</a></li>
          <li><a href="../login.php">Identifier</a></li>
          <li><a href="../register.php">Enregistrer</a></li>
          <li style="float:right"><a class="active" href="about.asp">About</a></li>
        </ul>
        <center>
          <br>
          <br>
        <img src="images/andzoa.png">
    <center>
      <h1>vous n'avez pas d'autorisation !!</h1>
    </center>
    <?php
    }
    ?>
