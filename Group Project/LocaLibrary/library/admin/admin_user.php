<?php
require_once ('../includes/config.php');

/*$sql_librarian = "SELECT name FROM librarian";

$librarian = mysqli_query($conn,$sql_librarian);

$row = mysqli_fetch_array($librarian,MYSQLI_ASSOC);*/

session_start();


?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOCALIBRARY</title>
    <!--jquery-->
    <script src="../Resources/jquery.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="../Resources/bootstrap.min.css">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="../Resources/bootstrap.min.js"></script>

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/jeditable.js/2.0.15/jquery.jeditable.min.js"></script>
<script src="https://cdn.bootcss.com/jeditable.js/2.0.15/jquery.jeditable.autogrow.min.js"></script>
<script src="js/jquery.autogrowtextarea.min.js"></script>	
<script src="js/echarts.min.js"></script>
<script src="js/echarts-wordcloud.min.js"></script>
<link href="js/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

    <style type="text/css">
        td {
            vertical-align: middle !important;
        }
    </style>
    <script language="javascript">
function myfunction(boo,boo1,boo2,boo3){
    $.ajax({ url: 'delete_user.php',
		type: 'post',
		data:{"content":boo,"page1":boo1,"page2":boo2,"flag":boo3}, 
		dataType:'text',
		success: function(msg)
		{	
			$("#txtHint").html(msg);
																  
					},
		error: function(){
           alert("请求失败！");
		}});
	
} 
</script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="JavaScript:void(0)">
                    <b>LocaLibrary</b>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="nav">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin_home.php">主页</a>
                    </li>
                    <li>
                        <a href="admin_book.php">图书管理</a>
                    </li>
                    <li class="active">
                        <a href="admin_user.php">用户管理</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="" style="cursor:default"><?php echo $_SESSION['admin_id'];?></a>
                    </li>
                    <li>
                        <a href="../index.php">退出</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php 
    mysqli_select_db($conn,"library"); //连接数据库

    mysqli_query($conn,"set names utf8"); //防止乱码
    $pageSize = 10;
			

    if (isset($_GET['page']) && $_GET['page'] >1) {
        $pageVal = $_GET['page'];
    }else {
        $pageVal = 1;
    }
    //计算起始位置
   $page = ($pageVal-1)*$pageSize;
    ?>
    <div class="container-fluid">
        <div style="width:200px" class="center-block">
        <form method="POST" action="select_user.php">
            <div class="form-inline">
                <div class="form-group">
                    <input type="text" id="input" class="form-control" placeholder="输入(姓名/卡号）" name="keyword" style="width:130px;">
                </div>
                <div class="form-group">
                    <button type="submit" id="research" class="btn btn-primary">搜索</button>
                </div>
            </div>
        </form>
        </div>
        <div class="container">
            <a class="btn btn-info pull-right" href="add_user.php" style="margin:15px 10px 10px;">添加用户</a>

    <?php


/*if(isset($_POST["keyword"]))
		{  $query = "";
			$query = $_POST["keyword"];
			
			$sql = "SELECT card,name,class FROM reader WHERE `card`='{$query}' or `name`='{$query}'";
			$result = mysqli_query($conn,$sql);
			
        }*/
       // else{
           $flag=0;
           $res=mysqli_query($conn,"select * from reader");
            $numrows = mysqli_num_rows($res);
			$pageNum = ceil($numrows/$pageSize);

	      $result = mysqli_query($conn,"select card,name,class from reader limit $page,$pageSize");
		//}
		if($pageVal <=3){
			$begin =1;
			$end = $pageNum>=5?5:$pageNum;
		}else{
			$end = $pageVal+2>=$pageNum?$pageNum:$pageVal+2;
			$begin =$end -4<=1?1:$end -4; 
		}
		$prev = $pageVal -1<=1?1:$pageVal-1;
        $next = $pageVal +1 >=$pageNum?$pageNum:$pageVal +1;
        echo "<table class='table table-bordered table-hover text-center'  id='txtHint'>";
    echo "<thead>";
    echo "<tr class='active'>";
    echo "<th class='text-center'>用户ID</th>";
    echo "<th class='text-center'>姓名</th>";
    echo "<th class='text-center'>班级</th>";
    echo "<th class='text-center' style='width: 70px;'>操作</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        
    if($result){
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
            echo "<tr>";
            echo "<td>".$row['card']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['class']."</td>";
            echo "<td><button class='btn btn-primary btn-xs' onclick='myfunction({$row["card"]},{$page},{$pageSize},{$flag})'>删除</button></td>";
            echo "</tr>";
            }  

    echo "</tbody>";
    echo "</table>\n";}

    ?>

        </div>
        <!-- 分页 -->
        <nav class='text-center'>
                            <ul class='pagination'>
                                <li>
                                    <a href="?page=<?php echo $prev; ?>">
                                        <span>&laquo;</span>
									</a>
								</li>
 
					<?php 
					for($i=$begin;$i<=$end;$i++){
						if($pageVal==$i){
							echo "<li class='active'><a href='?page=$i'>".$i."</a></li>";
						}
						else {
							echo "<li><a href='?page=$i'>".$i."</a></li>";
						}
					}
					?>
								<li>
                                    <a href="?page=<?php echo $next; ?>" aria-label='Next'>
                                        <span aria-hidden='true'>&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                         </nav>
</body>
</html>