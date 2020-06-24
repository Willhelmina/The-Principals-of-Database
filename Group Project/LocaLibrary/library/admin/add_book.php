<?php
require_once ('../includes/config.php');

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
                    <li class="active">
                        <a href="admin_book.php">图书管理</a>
                    </li>
                    <li>
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
    <div class="h3 text-center">
        <b>添加图书</b>
    </div>
    <form id="form" class="form-horizontal text-center" style="width:500px;margin: 20px auto 0;" method="POST" action="update_book.php" >
    	<div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">&nbsp;&nbsp;&nbsp;ISBN&nbsp;&nbsp;&nbsp;</div>
                <input type="text" class="form-control" placeholder="请输入ISBN" name="bookcode">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">图&nbsp;&nbsp;书&nbsp;&nbsp;名</div>
                <input type="text" class="form-control" placeholder="请输入图书名" name="name">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">&nbsp;作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者&nbsp;</div>
                <input type="text" class="form-control" placeholder="请输入作者" name="author">
            </div>
        </div>
                <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">&nbsp;类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;</div>
                <input type="text" class="form-control" placeholder="请输入类别" name="category">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">出&nbsp;&nbsp;版&nbsp;&nbsp;社</div>
                <input type="text" class="form-control" placeholder="请输入出版社" name="press">
            </div>
        </div>
        <div class="form-group">
         	<button type="submit" class='btn btn-primary btn-xs'>添加</button>
        </div>
    </form>
</body>
</html>