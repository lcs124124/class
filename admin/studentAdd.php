<?php
session_start();
error_reporting(0);
include '../conn.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('请先登录');</script>";
    echo "<script>window.location.href='../login.php';</script>"; 
}
if ($_POST['xuehao']) {

    $sql = "INSERT INTO  studentinfo(xuehao,username,xueyuan,sex,classname,phone,password) VALUES('$_POST[xuehao]','$_POST[username]','$_POST[xueyuan]','$_POST[sex]','$_POST[classname]','$_POST[phone]','123456')";
    $result = $db->query($sql);
    if ($result) {
        echo "<script>alert('添加成功');window.location.href='studentList.php';</script>";
    } else {
        echo "<script>alert('添加失败');window.location.href='studentAdd.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生成绩添加</title>
    <link rel="stylesheet" href="../common/css/layui.css"/>
    <script src="../common/layui.js"></script>
</head>
<body >
<?php
include 'nav.php';
include 'header.php';
?>

<form class="layui-form" action="studentAdd.php" method="post" style="">
    <div class="layui-col-md12" style="margin-left: 180px;padding-right: 200px;border: 1px solid #ccc;">
        <div style="padding: 30px;">
            <h1 style="text-align: center;">学生信息录入</h1>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生学号</label>
            <div class="layui-input-block">
                <input type="text" name="xuehao" required lay-verify="required" placeholder="请输入学生学号" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生姓名</label>
            <div class="layui-input-block">
                <input type="text" name="username" required lay-verify="required" placeholder="请输入学生姓名"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生学院</label>
            <div class="layui-input-block">
                <input type="text" name="xueyuan" required lay-verify="required" placeholder="请输入学生学院"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">学生性别</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="男" title="男">
                <input type="radio" name="sex" value="女" title="女" checked>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">学生班级</label>
            <div class="layui-input-block">
                <input type="text" name="classname" required lay-verify="required" placeholder="请输入学生班级"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号码</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required lay-verify="required" placeholder="请输入手机号码"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div style="height: 50px;"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="studentList.php">返回首页</a>
                <button class="layui-btn" lay-submit lay-filter="formDemo">添加学生信息</button>
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