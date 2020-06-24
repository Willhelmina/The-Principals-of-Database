<?php
require_once ('../includes/config.php');

session_start();
 $temp=$_POST['content'];
 $temp2=$_POST['page1'];
 $temp3=$_POST['page2'];
 $flag=$_POST['flag'];

$sql0="select * from borrow_list where `card`='{$temp}'";
$result0=mysqli_query($conn,$sql0);

if($result0->num_rows==0){
$sql="delete from reader where `card`='{$temp}'";
mysqli_query($conn,$sql);}
else
echo"<script>alert('此读者有未归还图书，无法完成删除操作！');</script>";
if($flag==1){
$sql_user = "SELECT card,name,class FROM reader where `card`='{$_SESSION['sou']}' or `name`='{$_SESSION['sou']}'limit $temp2, $temp3";

$show_user = mysqli_query($conn,$sql_user);}
else{
$sql_user = "SELECT card,name,class FROM reader limit $temp2, $temp3";

$show_user = mysqli_query($conn,$sql_user);}
echo "<table class='table table-bordered table-hover text-center'>";
    echo "<thead>";
    echo "<tr class='active'>";
    echo "<th class='text-center'>用户ID</th>";
    echo "<th class='text-center'>姓名</th>";
    echo "<th class='text-center'>班级</th>";
    echo "<th class='text-center' style='width: 70px;'>操作</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_array($show_user, MYSQLI_ASSOC)) {  
            echo "<tr>";
            echo "<td>".$row['card']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['class']."</td>";
            echo "<td><button class='btn btn-primary btn-xs' onclick='myfunction({$row['card']},{$temp2},{$temp3},{$flag})'>删除</button></td>";
            echo "</tr>";
            }  

    echo "</tbody>";
    echo "</table>\n";

    
    mysqli_close($conn);

?>