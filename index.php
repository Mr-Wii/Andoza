<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ANDZOA</title>
	<link rel="stylesheet" type="text/css" href="restricted/styles/index.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
  <ul>
    <li><a class="active1" href="index.php">Home</a></li>
		<li><a href="login.php">Identifier</a></li>
		<li><a href="register.php">Enregistrer</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
  </ul>
  <br>
  <img class="pic" src="restricted/images/andzoa.png">
  <br>
  <br>
	<div class="header">
		<a href="/"></a>
	</div>

	<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['email']; ?>
		<br /><br />Vous êtes déjà identifié !
		<br /><br />
		<a href="logout.php">Déconnecter?</a>
		<br>
		<br>
		<a href="restricted/projet.php">Visiter le site web?</a>

	<?php else: ?>

		<h1>Merci de s'identifier ou d'enregistrer</h1>
		<a href="login.php">Identifier</a> ou
		<a href="register.php">Enregistrer</a>

	<?php endif; ?>

</body>
<div class="terms">
<p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
</div>
</html>
