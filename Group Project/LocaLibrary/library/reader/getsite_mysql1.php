<?php
require_once ('../includes/config.php');

 $temp=$_POST['content'];
 $temp2=$_POST['time'];


	$sql = "update book set status='在库' WHERE `bookcode`='{$temp}'";
	$sql1=" delete from borrow_list where `bookcode`='{$temp}' and `card`='{$temp2}'";
     mysqli_query($conn,$sql);
     mysqli_query($conn,$sql1);
     echo "<table class='table table-bordered table-hover text-center'>
     <thead>
     <tr class='active'><th class='text-center' style='font-size: 30px' colspan='7'>借书记录</th></tr>
     </thead>";
     echo "<tbody><th class='text-center' width='11%'>图书编码</th>
     <th class='text-center' width='18%'>书名</th>
     <th class='text-center' width='12%'>图书种类</th>
     <th class='text-center' width='18%'>作者</th>
     <th class='text-center' width='19%'>出版社</th>
		 <th class='text-center' width='10%'>状态</th>
		 <th class='text-center' width='12%'>操作</th>";
$sql2="select * from borrow_list where `card`='{$temp2}'";
$result=mysqli_query($conn,$sql2);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{$a=$row["bookcode"];
$sql3="select*from book where `bookcode`='{$a}'";
$result1=mysqli_query($conn,$sql3);

while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
  echo "<tr>
                    <td>{$row1["bookcode"]}</td>
                    <td>{$row1["name"]}</td>
                    <td>{$row1["category"]}</td>
                    <td>{$row1["author"]}</td>
                    <td>{$row1["press"]}</td>
                    <td>{$row1["status"]}</td>
                    <td style='vertical-align: middle;text-align: center;'><button class='btn btn-primary btn-xs' onclick='myfunction({$row1["bookcode"]})'>还书</button></td>
                </tr>";
}
}
echo '</tbody>';
echo "</table>";
mysqli_close($conn);
?>