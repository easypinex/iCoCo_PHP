<?php
$Token = $_POST['Token'];
$receiveID = $_POST['receiveID'];
$TranAmt = $_POST['TranAmt'];

if (!empty($Token) && !empty($receiveID) && !empty($TranAmt))
{
	include 'connectDB.php';
	$receiveResult = mysqli_query($con,'SELECT ctbcAc FROM icoco.user where uid = '.$receiveID.';');
	if (mysql_num_rows($receiveResult) == 1)
	{
		$receiveCtbcAc = mysql_fetch_array($receiveResult)[0];
		if (!empty($receiveCtbcAc))
		{
		    $payeeResult = mysqli_query($con,'SELECT PointValue FROM icoco.user where uid = '.$Token.';');
			$payeeBounsPoint = mysql_fetch_array($payeeResult)[0];
			if (!empty($payeeBounsPoint))
			{
				if ($payeeBounsPoint >= $TranAmt)
				{
				    mysqli_query($con,'UPDATE `icoco`.`user` SET `PointValue`= PointValue - '.$TranAmt.' WHERE uid = '.$Token.';');
				    mysqli_query($con,'UPDATE `icoco`.`user` SET `PointValue`= PointValue + '.$TranAmt.' WHERE uid = '.$receiveID.';');
				    $payeeResult = mysqli_query($con,'SELECT PointValue FROM icoco.user where uid = '.$Token.';');
					$payeeBounsPoint = mysql_fetch_array($payeeResult)[0];
					echo '{"RspCode":"0000","TranAmt":"'.$TranAmt.'","PointValue":"'.$payeeBounsPoint.'"}';
				}
			}
		}
	}
}