## PHP中提供了哪些内置数组，各代表什么意思？

* $_GET,经由URL请求提交至脚本的变量
* $_POST,经由POST方法提交至脚本的变量
* $_SERVER,由web服务器设定或者直接与当前脚本的执行环境相关联
* $_SESSION,当前注册给脚本会话的变量
* $_COOKIE,经由cookies方法提交至脚本的变量
* $_FILES,经由post文件上传而提交至脚本的变量
* $_ENV,执行环境提交至脚本的变量
* $_REQUEST,经由机制提交至脚本的变量
* $_GLOBALS，指向当前脚本的全局范围内有效的变量

![image](https://github.com/Willhelmina/The-Principals-of-Database/blob/master/Lesson%2012/POST.png)

## PHP中实现网页间数据传递，可以使用哪几种方法？

* URL附加数据（GET方法）
* 表单提交数据（POST方法）

![image](https://github.com/Willhelmina/The-Principals-of-Database/blob/master/Lesson%2012/Method.png)

## PHP中Cookie和Session都可以实现用户登陆，他们有什么区别？

Cookie通过在客户端记录信息确定用户身份，Session通过在服务器端记录信息确定用户身份，cookie不是很安全，别人可以分析存放在本地的cookie，设置cookie时间可以使cookie过期。但是使用session-destory（），我们将会销毁会话；session会在一定时间内保存在服务器上。当访问增多，会比较占用你服务器的性能考虑到减轻服务器性能方面，应当使用cookie。

![image](https://github.com/Willhelmina/The-Principals-of-Database/blob/master/Lesson%2012/SESSION1.png)

![image](https://github.com/Willhelmina/The-Principals-of-Database/blob/master/Lesson%2012/SESSION2.png)

## PHP中我们可以通过内置数组获取哪些服务器信息，如何获取？

$_GET,$_POST,$_SSESSION,$_COOKIE,$_FILE

同上

