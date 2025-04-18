<?php
session_start();
error_reporting(0);
include 'conn.php';
$code = trim($_POST["captcha"]);
if($_POST['role']=='admin'){
    if ($_POST['username']) {
        $sql = "select * from admininfo where username='$_POST[username]' and password='$_POST[loginPW]' ";
        $result = $db->query($sql);
        if ($attr = $result->fetch_row()) {
            $_SESSION["username"] = $_POST["username"]; 
            echo "<script>alert('管理员登录成功！');</script>"; 
            echo "<script>window.location.href='./admin/studentList.php';</script>"; 
        } else {
            // echo '<h1 style="color: red;text-align: center;">用户名或者密码错误！</h1>';
            echo "<script>alert('用户名或者密码错误！');</script>";
        }
}
    
}

if($_POST['role']=='stu'){
    if ($_POST['username']) {
        $sql = "select * from studentinfo where xuehao='$_POST[username]' and password='$_POST[loginPW]' ";
        $result = $db->query($sql);
        if ($attr = $result->fetch_row()) {
            $_SESSION["xuehao"] = $_POST["username"]; 
            echo "<script>alert('学生登录成功！');</script>"; 
            echo "<script>window.location.href='./stu/student.php';</script>"; 
        } else {
            // echo '<h1 style="color: red;text-align: center;">用户名或者密码错误！</h1>';
            echo "<script>alert('用户名或者密码错误！');</script>";
        }
}
   
}
    
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>班级通讯录</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <link rel="stylesheet" href="common/css/login.css"/>
    <script src="common/layui.js"></script>
    <style>
        body{
        background-image: url(img/8.jpg);background-repeat: no-repeat;background-size: 100%;width:100%;height: 100%;overflow-y:hidden;
    }
    @keyframes pane-left{
    0% {
        position: relative;
        opacity: 0;
        bottom: 200px;
    }
    100%{
        position: relative;
        opacity: 1;
        bottom: 0px;
    }
}
    </style>
</head>
<body>
<li class=" layui-btn drop-down"><a href="#">更换壁纸</a>
<div class="menu">
    <ul class="drop-down-content">
        <li><img src="img/1.jpg" ></li>
        <li><img src="img/2.jpg" ></li>
        <li><img src="img/3.jpg" ></li>
        <li><img src="img/4.jpg" ></li>
        <li><img src="img/5.jpg" ></li>
        <li><img src="img/6.jpg" ></li>
        <li><img src="img/7.jpg" ></li>
        <li><img src="img/8.jpg" ></li>
    </ul>
    </li>
    </div>
<div style="width: 550px;margin: 180px auto;border: 1px  solid #1e9fff78;border-radius:20px; background-color:rgba(255,255,255,0.6); animation: pane-left 2s;">
    <h1 style="text-align: center;">班级通讯录管理系统登录界面</h1>
    <br>
    <br>
    <br>
    <form name="addForm" class="layui-form" action="login.php" method="post" style="padding-right: 80px;">
        <div class="layui-form-item"> 
            <label class="layui-form-label">用户名 <i class="layui-icon layui-icon-username" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="text" name="username"  placeholder="请输入用户名" required lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码 <i class="layui-icon layui-icon-password" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="loginPW" placeholder="请输入密码" required lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        
        <div class="layui-form-item">
    <label class="layui-form-label">登录方式</label>
    <div class="layui-input-block">
      <input type="radio" name="role" value="stu" title="学生" checked>
      <input type="radio" name="role" value="admin" title="老师">
    </div>
  </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-radius" type="submit" id="denglu">登录</button>
                <button class="layui-btn layui-btn-radius layui-btn-primary" type="reset">重置</button>
                <!-- <button class="layui-btn layui-btn-radius layui-btn-warm" onclick="window.location.href='register.php'">注册</button> -->
                &nbsp&nbsp您还没有账号？ <a id="reg" href="register.php">立即注册</a>
            </div>
        </div>
    </form>
         
</div>

<style>
	h1 {
  height: 10px;
  color: #1e9fff;
  margin-top: 15px;
}

</style>
<script type="text/javascript">
    layui.use(['form', 'laydate'], function () {
    });
	var change = document.getElementById("change");
	var img = document.getElementById("code_img");
	change.onclick = function()
	{
		img.src="code.php?t="+new Date();//增加一个随机参数，防止图片缓存
		return false;//阻止超链接的跳转动作
	}
</script>
<script type="text/javascript">  
    layui.use('form',function(){  
        const form = layui.form;  
        form.render();  
    });
</script>  
<script type="text/javascript">
			window.onload = function(){
				var imgs = document.getElementsByTagName("img");
				for (var i = 0; i < imgs.length; i++) {
					imgs[i].onclick = function(){
						document.body.style.background = "url("+this.src+") no-repeat ";//通过js控制改变行内样式
						document.body.style.backgroundSize = "100%";

					}
				}
			}
		</script>
</body>
</html>