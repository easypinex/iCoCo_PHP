<?php
$Token = $_POST['Token'];
$receiveID = $_POST['receiveID'];
$TranAmt = $_POST['TranAmt'];

if (!empty($Token) && !empty($receiveID) && !empty($TranAmt))
{
	include 'connectDB.php';
	$receiveResult = mysqli_query($con,'SELECT balance FROM icoco.user_bank_acc where uid = '.$receiveID.';');
	if (mysql_num_rows($receiveResult) == 1)
	{
		$receiveBalance = mysql_fetch_array($receiveResult)[0];
		if (!empty($receiveBalance))
		{
			$payeeResult = mysqli_query($con,'SELECT balance FROM icoco.user_bank_acc where uid = '.$Token.';');
			$payeeBalance = mysqli_fetch_array($payeeResult)[0];
			if (!empty($payeeBalance))
			{
				if ($payeeBalance >= $TranAmt)
				{
					mysqli_query($con,'UPDATE `icoco`.`user_bank_acc` SET `balance`= balance - '.$TranAmt.' WHERE uid = '.$Token.';');
					mysqli_query($con,'UPDATE `icoco`.`user_bank_acc` SET `balance`= balance + '.$TranAmt.' WHERE uid = '.$receiveID.';');
					$payeeResult = mysqli_query($con,'SELECT balance FROM icoco.user_bank_acc where uid = '.$Token.';');
					$payeeBalance = mysql_fetch_array($payeeResult)[0];
					echo '{"ResponseCode":"0000","TranAmt":"'.$TranAmt.'","balance":"'.$payeeBalance.'"}';
				}
			}
		}
	}
}