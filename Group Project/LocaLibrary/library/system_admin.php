<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理系统</title>
    <!--jquery-->
    <script src="./Resources/jquery.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="./Resources/bootstrap.min.css">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="./Resources/bootstrap.min.js"></script>
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
                    <b>后台管理系统</b>
                </a>
            </div>


        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="h3 text-center" style="margin-top: 100px;">
        <b>添加图书管理员</b>
    </div>
    <form id="form" method="POST" action="add_system_admin.php" class="form-horizontal text-center" style="width:250px;margin: 20px auto 0;">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">用户名</div>
                <input type="text" class="form-control" placeholder="请输入用户名" name="account">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">密&nbsp;&nbsp;&nbsp;码</div>
                <input type="password" class="form-control" placeholder="请输入密码" name="password">
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">姓&nbsp;&nbsp;&nbsp;名</div>
                <input type="text" class="form-control" placeholder="请输入姓名" name="name">
            </div>
        </div>
        <div class="form-group">
            <button  type="submit" class="btn btn-primary" style="margin-right: 10px">添&nbsp;加</button>
        </div>
    </form>
</body>

</html>