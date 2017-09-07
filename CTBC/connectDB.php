<?php
//資料庫相關設定
//伺服器
$db_host = "localhost";
//資料庫使用者稱
$db_user = "icoco";
//資料庫密碼
$db_pass = "123456";
//預設資料庫名稱
$db_name = "icoco";

//與資料庫連線並選擇資料庫
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($con,"SET NAMES utf8;");
?>