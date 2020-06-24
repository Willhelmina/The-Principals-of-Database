<?php
require_once ('../includes/config.php');

 session_start();
$temp=$_POST['content'];
$temp1=$_POST['page1'];
$temp2=$_POST['page2'];
$temp3=$_POST['flag'];

$sql0="select * from borrow_list where `bookcode`='{$temp}'";
$result0=mysqli_query($conn,$sql0);

if($result0->num_rows==0){
$sql1="delete from book where `bookcode`='{$temp}'";
mysqli_query($conn,$sql1);}
else
echo"<script>alert('此书已借出，无法完成删除操作！');</script>";
if($temp3==1){
  $sql = "select `bookcode`,`name`,`author`,`status` FROM book where `bookcode`='{$_SESSION['cha']}' or `name`='{$_SESSION['cha']}' 
  or `category`='{$_SESSION['cha']}'limit $temp1, $temp2";
  $result= mysqli_query($conn,$sql);
}
else{
$sql = "select `bookcode`,`name`,`author`,`status` FROM book limit $temp1, $temp2";
$result= mysqli_query($conn,$sql);}

echo "<table class='table table-bordered table-hover text-center'>";
echo "<thead>";
echo "<tr class='active'>";
echo "<th class='text-center'>图书号</th>";
echo "<th class='text-center'>图书名</th>";
echo "<th class='text-center'>作者</th>";
echo "<th class='text-center' style='width: 90px;'>状态</th>";
echo "<th class='text-center' style='width: 100px;'>操作</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
        echo "<tr>";
        echo "<td>".$row['bookcode']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td><button class='btn btn-primary btn-xs' onclick='myfunction({$row['bookcode']},{$temp1},{$temp2},{$temp3})'>删除</button></td>";
        echo "</tr>";
        }  

echo "</tbody>";
echo "</table>\n";
mysqli_close($conn);
?>