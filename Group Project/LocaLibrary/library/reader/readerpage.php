<?php
require_once ('../includes/config.php');

session_start();
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--jquery-->
<script src="./Resources/jquery.min.js"></script>
 <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="./Resources/bootstrap.min.css">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="./Resources/bootstrap.min.js"></script>

<style type="text/css">
        td {
            vertical-align: middle !important;
        }
    </style>
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

<script src="/js/jquery-1.8.3.js"></script>
<script language="javascript">
function myfunction(boo){
    $.ajax({ url: 'getsite_mysql1.php',
		type: 'post',
		data:{"content":boo,"time":<?php echo "{$_SESSION['user_id']}";?>}, 
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

<title>个人主页</title>
<style>

</style>
</head>
<body>

        <?php
   
     if(!isset($_SESSION['user_id']))
        $query = $_POST["query"]; //获取用户输入的卡号
     else $query=$_SESSION['user_id'];
   

      $sql1="SELECT * FROM borrow_list WHERE `card`='{$query}'";
      $result1 = mysqli_query($conn,$sql1);



		  $sql = "SELECT * FROM reader WHERE `card`='{$query}'";
      $result = mysqli_query($conn,$sql);        
       if($result->num_rows==0){
        echo " 
        <script language='javascript'> 
          alert('用户不存在！请重新输入正确卡号。');
          window.location.href='../index.php';
          </script>
        ";
       }
       
       
      if(!isset($_SESSION['user_id']))
         $_SESSION['user_id']=$query;
      ?>


        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">
                    <b>LocaLibrary</b>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="nav">
                <ul class="nav navbar-nav">
				      <li class="active"><a href="readerpage.php">个人主页</a></li>
	            <li><a href="search.php">图书信息查询</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> 
                    <a href="" style="cursor:default"><?php echo $_SESSION['user_id']?></a>
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
    <div class="container-fluid">
    <div class="container">
            <table class="table table-bordered table-hover text-center">
   
					<thead>
          <tr class="active"><th class="text-center" style="font-size: 30px" colspan="6">个人信息</th></tr>
        </thead>
        <tbody><tr>
					<th class='text-center' width='17%'>借书证卡号</th>
                    <th class="text-center" width='17%'>姓名</th>
                    <th class="text-center" width='16%'>性别</th>
                    <th class="text-center" width='17%'>系部</th>
                    <th class="text-center" width='17%'>班级</th>
                    <th class="text-center" width='16%'>可借阅数目</th>
            </tr>
        <?php
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
          echo " <tr>
							<td>{$row["card"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["gender"]}</td>
                            <td>{$row["department"]}</td>
                            <td>{$row["class"]}</td>
                            <td>{$row["books"]}</td>
            </tr> ";
        }  
        ?>
    </tbody>
    </table>
      <table class="table table-bordered table-hover text-center" id='txtHint'>
      <thead>
        <tr class="active"><th class="text-center" style="font-size: 30px" colspan="7">借书记录</th></tr>
    </thead>
    
    <?php
        if($result1->num_rows>0){echo'<tbody><tr>
      <th class="text-center" width="11%">图书编码</th>
      <th class="text-center" width="18%">书名</th>
      <th class="text-center" width="12%">图书种类</th>
      <th class="text-center" width="18%">作者</th>
      <th class="text-center" width="19%">出版社</th>
		  <th class="text-center" width="10%">状态</th>
      <th class="text-center" width="12%">操作</th>
      </tr>';
          while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
        {$a=$row["bookcode"];
        $sql2="select*from book where `bookcode`='{$a}'";
        $result2=mysqli_query($conn,$sql2);
        while($row1 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
          echo "
          <tr>
							<td>{$row1["bookcode"]}</td>
              <td>{$row1["name"]}</td>
              <td>{$row1["category"]}</td>
              <td>{$row1["author"]}</td>
              <td>{$row1["press"]}</td>
							<td>{$row1["status"]}</td>
							<td style='vertical-align: middle;text-align: center;'><button class='btn btn-primary btn-xs' onclick='myfunction({$row["bookcode"]})'>还书</button></td>
						</tr>";
        }
        }
        }
        ?>
        </tbody>
        </table>
  </div>
</div>    
</body>
</html>