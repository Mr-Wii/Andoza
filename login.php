<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location:index");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	$records = $conn->prepare('SELECT id,email,password,user_level FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
		$_SESSION['user_id'] = $results['id'];
		$_SESSION['user_level'] = $results['user_level'];
		header("Location: restricted/projet.php");

	} else {
		$message = 'Identification incorrect !';
	}

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
		<li><a class="active1" href="login.php">Identifier</a></li>
		<li><a  href="register.php">Enregistrer</a></li>
    <li style="float:right"><a class="active" href="about.asp">About</a></li>
  </ul>
  <center>
    <?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
<form class="login" method="POST" action="./login.php">
  <div class="imgcontainer">
  <img src="restricted/images/login.png" alt="Avatar" class="avatar">
</div>
<div class="container">
  <label><b>Email</b></label>
  <input type="text" placeholder="Email" name="email" class="login1" required>

  <label><b>Mot de passe</b></label>
  <input type="password" placeholder="Mot de passe" name="password" class="login2" required>
  <button type="submit" value="Submit" name="B1" class="btnnn">S'identifier</button>
</div>
</form>
</center>
<div class="terms">
<p class="p1">ANDZOA - BNI OUAIL <script>document.write(new Date().getFullYear())</script></p>
</div>
</body>

</html>
