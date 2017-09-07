<?php
include 'connectDB.php';
try 
{
	$sql = $_POST['sql'];
	$sqlLt = explode (";",$sql);
	for ($i = 0 ; $i < count($sqlLt) ; $i++)
	{
		mysqli_query($con,$sqlLt[$i]);
	}
	echo 'true';
}
catch (Exception $e)
{
echo 'false';
}
