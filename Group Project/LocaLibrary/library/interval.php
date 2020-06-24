<?php 
require_once ('./includes/config.php');

session_start();
 if(!isset($_SESSION['admin_id'])&&!isset($_SESSION['admin_pass']))
{    $query = $_POST["query"]; //获取管理员输入的用户名
    $pass=$_POST["pass"];
  }
  else {$query=$_SESSION['admin_id'];
    $pass=$_SESSION['admin_pass'];}
  
$sql = "select * from librarian where `account`='{$query}' and `password`='{$pass}'";
$result = mysqli_query($conn,$sql);

  
  if(mysqli_num_rows($result)==NULL){
    echo "
    <script language='javascript'> 
      alert('管理员用户名或密码错误！请重新输入。');
      window.location.href='index.php';
      </script>";
}
else{
if(!isset($_SESSION['admin_id'])&&!isset($_SESSION['admin_pass'])){
         $_SESSION['admin_id']=$query;
         $_SESSION['admin_pass']=$pass;
        }
  echo "
  <script language='javascript'> 
    window.location.href='./admin/admin_home.php';
    </script>";}
    ?>
    