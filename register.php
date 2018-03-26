<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password, user_level) VALUES (:email, :password,'normal')";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', (password_hash($_POST['password'], PASSWORD_BCRYPT)));

	if( $stmt->execute() ):
		$message = 'Enregistré avec succès ';
	else:
		$message = 'Essayer à nouveau';
	endif;

endif;

?>
<html>
<head>
    <meta charset="utf-8">
    <title>ANDZOA</title>
    <link rel="stylesheet" href="restricted/styles/projet.css">
</head>
<body>
  <ul>
    <li><a href="index.php">Home</a></li>
		<li><a href="login.php">Identifier</a></li>
		<li><a class="active1" href="register.php">Enregistrer</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
  </ul>
  <center>
    <?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
<form class="login" method="POST" action="./register.php">
  <div class="imgcontainer">
  <img src="restricted/images/signup.png" alt="Avatar" class="avatar">
</div>
<div class="container">
  <label><b>Email</b></label>
  <input type="text" placeholder="Email" name="email" class="login1" required>

  <label><b>Mot de passe</b></label>
  <input type="password" placeholder="Mot de passe" name="password" class="login2" required>
  <label><b>Confirmation</b></label>
  <input type="password" placeholder="Confirmation du mot de passe" name="confirm_password" class="login2" required>
  <button type="submit" class="btnnn">Enregistrer</button>
</div>
</form>
</center>
<div class="terms">
<p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
</div>
</body>

</html>
