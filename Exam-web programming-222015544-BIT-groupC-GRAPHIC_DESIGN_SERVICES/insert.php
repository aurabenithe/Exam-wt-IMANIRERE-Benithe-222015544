<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>export</title>
 </head>
 <body>
  <?php
   $server="localhost";
  $database="cargo";
  $username="root";
  $password="";
  $conn=mysql_connect($server,$username,$password)
  or die('server not found'.mysql_error());
  mysql_select_db($database,$conn)
  or die('database not found'.mysql_error());
  $FurnitureId=$_POST['FurnitureId'];
  $ImportDate=$_POST['ImportDate'];
  $Quantity=$_POST['Quantity'];
  if(isset($_POST['import']))
  $sql="insert into import (FurnitureId,ImportDate,Quantity) values('$FurnitureId','$ImportDate','$Quantity')";
  $insert=mysql_query($sql)or die(mysql_error());
  if($insert)
{
 
	  echo"Record has been imported"; 
	  require("import.html");
	}
?>
 </body>
</html>