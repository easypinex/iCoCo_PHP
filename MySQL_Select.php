<?php
include 'connectDB.php';
error_reporting(E_ALL ^ E_NOTICE);
$sql = $_POST['sql'];

// 找出 Table 與 欄位名稱
$table = str_replace(";","",explode('.', explode(' ', $sql)[array_search('FROM',explode(' ', $sql))+1])[1]);
$tableCol = array();
if (explode(' ', $sql)[1] == "*")
{
    $tableResult = mysqli_query($con,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'");
	for ($i=0;$i<mysqli_num_rows($tableResult);$i++)
	{
		$row = mysqli_fetch_array($tableResult);
		$tableCol[$i]= $row[0];
	}
}
else
{
	$tableCol = explode(',',explode(' ', $sql)[1]);
}

// 資料處理
$return_arr = array();
$fetch = mysqli_query($con,$sql); 

while ($row = mysqli_fetch_array($fetch))
{
	for ($i=0;$i<count($tableCol);$i++)
	{
	        
		$row_array[$tableCol[$i]] = $row[$tableCol[$i]];
	}
    array_push($return_arr,$row_array);
}

// 輸出
echo json_encode($return_arr);
