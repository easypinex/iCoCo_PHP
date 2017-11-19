<?php
include 'connectDB.php';
try 
{
	$sql = $_POST['sql'];
	$sqlLt = explode (";",$sql);
	$result = false;
	for ($i = 0 ; $i < count($sqlLt) ; $i++)
	{
	    if ($sqlLt[$i] != "")
    	    if (mysqli_query($con, $sqlLt[$i]) === TRUE) {
    	        $result = true;
    	    }else {
    	        $result = false;
    	    }
	}
	if ($result) echo 'true';
}
catch (Exception $e)
{
echo 'false';
}
