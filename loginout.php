<?php
session_start();
header("Content-Type: text/html; charset=utf-8");//设置页面编码
//正确的注销session方法： //
//1开启session 
//2、彻底销毁session 
session_destroy();

//返回登录页面
echo "<script type=\"text/javascript\">alert('退出登录成功');</script>"; //提示
echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; //页面跳转查看编辑的结果
?>


