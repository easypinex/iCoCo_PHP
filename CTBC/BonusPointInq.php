<?php
$Token = $_POST['Token'];
if (!empty($Token))
{
// 	echo '{"RspCode":"0000","PointValue":"5000","CreditDueDate":"2016-12-31"}';

	include 'connectDB.php';
	$result = mysqli_query($con,'SELECT BonusPoint FROM icoco.user where uid = '.$Token.';');
	$BonusPoint = mysqli_fetch_array($result)[0];
	echo '{"ResponseCode":"0000","BonusPoint":"'.$BonusPoint.'","CreditDueDate":"2016-12-31"}';
}
	