<?php
$CustID = $_POST['CustID'];
$UserID = $_POST['UserID'];
$PIN = $_POST['PIN'];
if (!empty($CustID) and !empty($UserID) and !empty($PIN)) #三個都有資料
{
	echo '{"RspCode":"0000","Token":"'.$UserID.'"}';
// 	echo '{"RspCode":"0000","Token":"b0a9f1 29-d2c4-4d75-bfb4-f6c42dd68798"}';
}
?>