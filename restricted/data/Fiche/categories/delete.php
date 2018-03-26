<html>
<body>
<?php
include('connect.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from categorie where categorieID='$id'");
if($query1)
{
header('location:Article.php');
}
}
?>
</body>
</html>
