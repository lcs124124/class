<?php
session_start();
error_reporting(0);
include '../conn.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员修改密码</title>
    <link rel="stylesheet" href="../common/css/layui.css"/>
    <script src="../common/layui.js"></script>
</head>
<body>
<?php
include 'nav.php';
include 'header.php';
?>

<form class="layui-form" action="dochange.php" method="post" style="">
    <div class="layui-col-md12" style="margin-left: 180px;padding-right: 650px;border: 1px solid #ccc;">
        <div style="padding: 30px;">
            <h1 style="text-align: center;">修改密码</h1>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名<i class="layui-icon layui-icon-username" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="user" required lay-verify="required" placeholder="请输入用户名" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">原密码<i class="layui-icon layui-icon-username" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="pwd" required lay-verify="required" placeholder="请输入原密码" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码<i class="layui-icon layui-icon-password" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="npwd" required lay-verify="required" placeholder="请输入新密码"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码<i class="layui-icon layui-icon-ok-circle" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="cnpwd" required lay-verify="required" placeholder="请确认密码"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="../login.php">返回登录</a>
                <button  type="submit" class="layui-btn" lay-submit lay-filter="formDemo">修改</button>
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