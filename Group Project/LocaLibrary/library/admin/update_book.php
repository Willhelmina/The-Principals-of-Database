<html>
<head></head>
<body>
<?php
require_once ('../includes/config.php');

if(isset($_POST["bookcode"])&&isset($_POST["name"])&&isset($_POST["category"])&&isset($_POST["author"])&&isset($_POST["press"])){
$query0=$_POST["bookcode"];
$query1=$_POST["name"];
$query2=$_POST["category"];
$query3=$_POST["author"];
$query4=$_POST["press"];
$sql="insert into book (bookcode,name,category,author,press) 
VALUES('{$query0}','{$query1}','{$query2}','{$query3}','{$query4}')";
$result=mysqli_query($conn,$sql);
if ($result)
  {
    echo"<script language='javascript'>
		alert('添加成功！');
		window.location.href= 'admin_book.php';
   </script>";
  }
  else{
    echo"<script>alert('添加失败！');
    window.location.href= 'admin_book.php';
    </script>";
  }
}
mysqli_close($conn);
?>
</body>
</html>
