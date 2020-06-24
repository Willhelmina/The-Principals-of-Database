<?php
require_once ('./includes/config.php');

if(isset($_POST['account'])&&isset($_POST['password'])&&isset($_POST['name'])){
$a=$_POST['account'];
$b=$_POST['password'];
$c=$_POST['name'];
}
$sql="insert into librarian (account,password,name) values ('".$a."','".$b."','".$c."')";
$result=mysqli_query($conn,$sql);
if ($result)
  {
    echo"<script language='javascript'>
		alert('添加成功！');
		window.location.href= 'system_admin.php';
   </script>";
  }
  else{
    echo"<script>alert('添加失败！');
    window.location.href= 'system_admin.php';
    </script>";
  }
mysqli_close($conn);

?>