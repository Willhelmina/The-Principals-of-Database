<?php
require_once ('./includes/config.php');

session_start();
?>



<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCALIBRARY</title>
    <link rel="stylesheet" href="./Resources/style.css">
	
<style type="text/css">
     button {  
        width: 200px;  
        padding:8px;  
        background-color: #006699;  
        border-color: #357ebd;  
        color: #fff;  
        -moz-border-radius: 10px;  
        -webkit-border-radius: 10px;  
        border-radius: 10px; /* future proofing */  
        -khtml-border-radius: 10px; /* for old Konqueror browsers */  
        text-align: center;  
        vertical-align: middle;  
        border: 1px solid transparent;  
        font-weight: 900;  
        font-size:125%  
      }  
   </style>
<script language="javascript"> 
function myfun(){ 
 <?php $_SESSION=array();
      session_destroy();
      ?>
}
</script>
</head>
<body onload="myfun()">

    <div class="container">

       <div class="sign-box">

            <div class="title">管理员登陆</div>
			
			<form method="POST" action="interval.php">

			
            <div class="input">
                <input type="text" id="sign-user" placeholder="请输入用户名" name="query">
            </div>
            <div class="input">
                <input type="password" id="sign-password" placeholder="请输入登录密码" name="pass">
            </div>
            <div class="btn sign-btn">
            <span><button type="submit">登录</button></span>
            </div>
            <div class="change-box sign-change">
                <div class="change-btn toLogin">
                    <span>我是读者</span>
                </div>
            </div>
			</form>
       </div>
	   
       <div class="login-box">

            <div class="title">读者登录</div>
			
			<form method="POST" action="reader/readerpage.php">

            <div class="input">
                <input type="text" id="login-user" placeholder="请输入您的卡号" name="query">
            </div>
            <div class="btn login-btn">
            <span><button type="submit">登录</button></span>
            </div>
            <div class="change-box login-change">
                <div class="change-btn toSign">
                    <span>我是管理员</span>
                </div>
            </div>
			</form>
       </div>

    </div>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="./Resources/script.js"></script>
</body>
</html>