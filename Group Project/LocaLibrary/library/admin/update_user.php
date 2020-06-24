<?php
require_once ('../includes/config.php');

if(isset($_POST["card"])&&isset($_POST["name"])&&isset($_POST["gender"])&&isset($_POST["department"])&&isset($_POST["class"])&&isset($_POST["books"])){
  $query0=$_POST["card"];
  $query1=$_POST["name"];
  $query2=$_POST["gender"];
  $query3=$_POST["department"];
  $query4=$_POST["class"];
  $query5=$_POST["books"];}
$sql="INSERT INTO reader (card, name, gender, department, class, books)
VALUES
('{$query0}','{$query1}','{$query2}','{$query3}','{$query4}','{$query5}')";
$result=mysqli_query($conn,$sql);
if ($result)
  {
    echo"<script language='javascript'>
		alert('添加成功！');
		window.location.href= 'admin_user.php';
   </script>";
  }
  else{
    echo"<script>alert('添加失败！');
    window.location.href= 'admin_user.php';
    </script>";
  }
 
mysqli_close($conn)
?>
