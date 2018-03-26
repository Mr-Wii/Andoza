<html>
<body>
<?php
include('connect.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from fournisseur_client where frid='$id'");
if($query1)
{
header('location:beneficiaire.php');
}
}
?>
</body>
</html>
