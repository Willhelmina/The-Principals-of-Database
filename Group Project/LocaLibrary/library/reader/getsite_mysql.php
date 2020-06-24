<?php
 
require_once ('../includes/config.php');

 session_start();
$temp=$_POST['content'];
$temp3=$_POST['qq'];
$temp4=$_POST['page1'];
$temp5=$_POST['page2'];

	$sql1="insert into borrow_list (bookcode,card) values('".$temp."','".$_SESSION['user_id']."')";
	mysqli_query($conn,$sql1);
	$sql = "update book set status='已借出' WHERE `bookcode`='{$temp}'";
  mysqli_query($conn,$sql);
if($temp3==1){
$sql="SELECT * FROM book where `bookcode`='{$_SESSION['CHA']}' OR `name`='{$_SESSION['CHA']}'or `category`='{$_SESSION['CHA']}' limit $temp4,$temp5";
$result=mysqli_query($conn,$sql);
}
else{
$sql="SELECT * from book limit $temp4,$temp5";
$result=mysqli_query($conn,$sql);}
echo "<table class='table table-bordered table-hover text-center'>
<thead>
<th class='text-center' width='11%'>图书编码</th>
<th class='text-center' width='18%'>书名</th>
<th class='text-center' width='12%'>图书种类</th>
<th class='text-center' width='18%'>作者</th>
<th class='text-center' width='19%'>出版社</th>
<th class='text-center' width='10%'>状态</th>
<th class='text-center' width='12%'>操作</th>
</thead>";
echo '<tbody>';
$sql0="select count(*) from borrow_list where card='{$_SESSION['user_id']}'";
$num=mysqli_query($conn,$sql0);
$row1 = mysqli_fetch_array($num, MYSQLI_ASSOC);
 if($row1["count(*)"]==3)
      {
					//echo'<script>alert("借阅数目已达上限！");</script>';					
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
          {
				  echo "<tr>
					<td>{$row["bookcode"]}</td>
					<td>{$row["name"]}</td>
					<td>{$row["category"]}</td>
					<td>{$row["author"]}</td>
					<td>{$row["press"]}</td>
					<td>{$row["status"]}</td>
					<td></td>
				    </tr>";
					}
      }
  else{
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{   if($row['status']=="已借出"){
    echo "<tr>";
    echo "<td>" . $row['bookcode'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['press'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td></td>";
    echo "</tr>";}
    else{
      echo "<tr>
							<td>{$row["bookcode"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["category"]}</td>
                            <td>{$row["author"]}</td>
                            <td>{$row["press"]}</td>
							<td>{$row["status"]}</td>
							<td style='vertical-align: middle;text-align: center;'><button class='btn btn-primary btn-xs' onclick='myfunction({$row["bookcode"]},{$temp4},{$temp5},{$temp3})'>借阅</button></td>
						</tr>";
    }
}
  }
echo '</tbody>';
echo "</table>";
mysqli_close($conn);
?>