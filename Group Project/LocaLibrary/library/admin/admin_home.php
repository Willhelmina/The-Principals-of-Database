<?php
require_once ('../includes/config.php');

$sql_book = "SELECT * FROM book";

if($result_book=mysqli_query($conn,$sql_book))
{
  //返回图书记录数
  $rowcount_book = mysqli_num_rows($result_book);
  //释放图书结果集
  mysqli_free_result($result_book);
}

$sql_user = "SELECT * FROM reader";

if($result_user=mysqli_query($conn,$sql_user))
{
  //返回用户记录数
  $rowcount_user = mysqli_num_rows($result_user);
  //释放用户结果集
  mysqli_free_result($result_user);
}

session_start();

?>

<!DOCTYPE html>
<html lang="zh-CN" style="height: 100%;">

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
</head>

<body style="background-image: url(../Resources/index.jpg);background-size:100% 100%;">
 <?php 

  $res=mysqli_query($conn,"select name from librarian where `account`='{$_SESSION['admin_id']}'");
  $row=mysqli_fetch_assoc($res);
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
        <a class="navbar-brand" href="JavaScript:void(0)">
          <b>LocaLibrary</b>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="nav">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="admin_home.php">管理员主页</a>
          </li>
          <li>
            <a href="admin_book.php">图书管理</a>
          </li>
          <li>
            <a href="admin_user.php">用户管理</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="" style="cursor:default"><?php echo $_SESSION['admin_id']?></a>
          </li>
          <li>
            <a href="../index.php">退出</a>
          </li>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="center-block" style="margin-top:50px;padding:20px;width:500px;background-color:rgba(255, 255, 255, 0.55);border-radius:30px;">
      <h3 class="text-center">管理员<?php echo $row["name"] ?>，您好！</h3>
      <h3 class="text-center" style="margin-top:70px;">当前共有<?php echo $rowcount_book ?>本图书</h3>
      <h3 class="text-center">当前共有<?php echo $rowcount_user ?>位用户</h3>
      <h3 class="text-center">祝您工作顺利！</h3>
    </div>
  </div>
</body>

</html>