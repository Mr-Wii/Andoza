<?php
  session_start();
  $date=$_SESSION['exercice'];
  if(isset($_SESSION['user_id']) && ($_SESSION['user_level']) && ($_SESSION['user_level']=="admin")) {
  ?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "andzoa";

$connect = mysqli_connect ($hostname,$username,$password,$databasename);

// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $exercice, $num_conv, $date, $valeur, $numero_E_S, $observation, $libelle, $error)
{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>Exercice: *</strong> <input type="text" name="exercice" value="<?php echo $exercice; ?>" /><br/>

<strong>Numero conv: *</strong> <input type="text" name="num_conv" value="<?php echo $num_conv; ?>" /><br/>

<strong>Date: *</strong> <input type="text" name="date" value="<?php echo $date; ?>" /><br/>

<strong>Valeur: *</strong> <input type="text" name="valeur" value="<?php echo $valeur; ?>" /><br/>

<strong>Numero: *</strong> <input type="text" name="numero_E_S" value="<?php echo $numero_E_S; ?>" /><br/>

<strong>Observation: *</strong> <input type="text" name="observation" value="<?php echo $observation; ?>" /><br/>

<strong>Libelle: *</strong> <input type="text" name="libelle" value="<?php echo $libelle; ?>" /><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}


include('../../../../connect.php');


// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];

$exercice = mysql_real_escape_string(htmlspecialchars($_POST['exercice']));

$num_conv = mysql_real_escape_string(htmlspecialchars($_POST['num_conv']));

$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));

$valeur = mysql_real_escape_string(htmlspecialchars($_POST['valeur']));

$numero_E_S = mysql_real_escape_string(htmlspecialchars($_POST['numero_E_S']));

$observation = mysql_real_escape_string(htmlspecialchars($_POST['observation']));

$libelle = mysql_real_escape_string(htmlspecialchars($_POST['libelle']));


// check that firstname/lastname fields are both filled in

if ($exercice == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $exercice, $num_conv, $date, $valeur, $numero_E_S, $observation, $libelle, $error);
}

else

{

// save the data to the database

mysql_query("UPDATE vignette SET exercice='$exercice', num_conv='$num_conv', date='$date', valeur='$valeur', numero_E_S='$numero_E_S', observation='$observation', libelle='$libelle' WHERE vignetteID='$id'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: consultation.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db


$id = $_GET['id'];

$result = mysql_query("SELECT * FROM vignette WHERE vignetteID=$id")

or die(mysql_error());

$sorties = mysql_fetch_array($result);


// check that the 'id' matches up with a row in the databse

if($sorties)

{



// get data from db

$exercice = $sorties['exercice'];

$num_conv = $sorties['num_conv'];

$date = $sorties['date'];

$valeur = $sorties['valeur'];

$numero_E_S = $sorties['numero_E_S'];

$observation = $sorties['observation'];

$libelle = $sorties['libelle'];

$error = '';


// show form

renderForm($id, $exercice, $num_conv, $date, $valeur, $numero_E_S, $observation, $libelle, $error);
}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>
<?php } else { ?>
  <a href="../../../../login.php">vous n'avez pas d'autorisation</a>

  <?php
  }

  ?>
