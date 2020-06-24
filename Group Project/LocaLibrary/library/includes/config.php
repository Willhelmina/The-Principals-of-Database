<?php
//连接服务器
$dbhost = "localhost";  //MySQL服务器主机地址
$dbuser = "root";      //MySQL用户名
$dbpass = ""; //MySQL用户名密码

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn)
{
  echo "Connection Failed！！";
}

mysqli_select_db($conn,"library"); //连接数据库

mysqli_query($conn,"set names utf8"); //防止乱码

?>
