<?php
$Token = $_POST['Token'];

if (!empty($Token))
{
// 	echo '{"RspCode":"0000","PointValue":"5000","CreditDueDate":"2016-12-31"}';
	include 'connectDB.php';

	$result = mysqli_query($con,'SELECT balance FROM icoco.user_bank_acc where uid = "'.$Token.'";');
	
	if (mysqli_num_rows($result) >= 1)
	{
		$balance = mysqli_fetch_array($result)[0];
	}
	echo '{"ResponseCode":"0000","SavingAcctInq":[{"AcctNO": "0000000000000000","Balance":"'.$balance.'"}]}';
}
	