<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>找回管理员密码</title>
    <link rel="stylesheet" href="./common/css/layui.css"/>
    <script src="./common/layui.js"></script>
    <style>
        body{
        background-image: url(img/8.jpg);background-repeat: no-repeat;background-size: 100%;width:100%;height: 100%;overflow-y:hidden;
    }
    @keyframes pane-left {
    0% {
        position: relative;
        opacity: 0;
        top: 200px;
    }

    100% {
        position: relative;
        opacity: 1;
        top: 0px;
    }
}
    </style>
</head>
<body class="layui-container">
<form class="layui-form" action="find_password.php" method="post" style="">
    <div class="layui-col-md12" style="animation: pane-left 1s;border-radius:20px;padding-right: 80px;border: 1px solid #1e9fff6e; background-color: #ffffff78; margin: 180px 280px;width: 550px;">
        <div style="padding: 30px;">
            <h1 style="text-align: center;color: #1e9fff;">找回管理员密码</h1>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名<i class="layui-icon layui-icon-username" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="text" name="uname" id="uname" required lay-verify="required" placeholder="请输入用户名" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="email" name="email" id="email" required lay-verify="required|email" placeholder="请输入注册邮箱"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <!-- 新增用于显示密码的区域 -->
        <div class="layui-form-item">
            <label class="layui-form-label">您的密码</label>
            <div class="layui-input-block">
                <span id="show-password" style="color: red;"></span>
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="login.php">返回登录</a>
                <button  type="submit" class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>
<script>
    layui.use(['form', 'laydate'], function () {
        var form = layui.form;
        var laydate = layui.laydate;
    });
</script>
</body>
</html>

<?php
require 'functions.php';
require 'conn.php';

if (empty($_POST)) {
    return;
}

$uname = $_POST['uname'];
$email = $_POST['email'];

$sql = "SELECT password FROM admininfo WHERE username = '$uname' AND email = '$email'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $password = $row['password'];
    // 输出 JavaScript 代码来显示用户名、邮箱和密码
    echo "<script>
            document.getElementById('uname').value = '$uname';
            document.getElementById('email').value = '$email';
            document.getElementById('show-password').innerHTML = '$password';
          </script>";
} else {
    echo "<script>alert('用户名或邮箱不正确，请重新输入');</script>";
}

$db->close();
?>