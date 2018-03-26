<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <title>DB backup</title>
    <link rel="stylesheet" href="styles/article.css">
    <style type="text/css">
      input {font-weight:bold;
      font-size: 15px;}
   </style>
  </head>
  <body>
    <ul>
      <li><a class="active1" href="projet.php">Home</a></li>
      <li><a  href="../logout.php">Déconnecter</a></li>
      <li style="float:right"><a class="active" href="about.asp">About</a></li>
    </ul>
    <center>
    <br>
<h1>Sauvgarde de la database ! </script></h1>
<br>
<br>
<br>
<br>
<h1>↓</h1>
<form action="backup.php" method="post">
  <input type="submit" value="procéder" name="submit" class="kek">
</form>
<script type="text/javascript">
var elems = document.getElementsByClassName('kek');
var confirmIt = function (e) {
if (!confirm('Vous êtes sûr ?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
elems[i].addEventListener('click', confirmIt, false);
}
</script>
