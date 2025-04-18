<?php
session_start();
error_reporting(0);
include '../conn.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('请先登录');</script>"; 
    echo "<script>window.location.href='login.php';</script>"; 
}
if ($_POST['xuehao']) {
    $sql = "update scoreinfo set username='$_POST[username]',xueyuan='$_POST[xueyuan]',android='$_POST[android]',j2ee='$_POST[j2ee]',php='$_POST[php]',javascript='$_POST[javascript]' where xuehao='$_POST[xuehao]'";
    $result = $db->query($sql);
    if ($result) {
        echo "<script>alert('修改成绩成功');window.location.href='scoreList.php';</script>";
    } else {
        echo "<script>alert('修改成绩失败');window.location.href='scoreList.php';</script>";
    }
}

$sql1 = "select * from scoreinfo where xuehao='$_GET[id]'";
$result1 = $db->query($sql1);
$row1 = $result1->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生成绩修改</title>
    <link rel="stylesheet" href="../common/css/layui.css"/>
    <script src="../common/layui.js"></script>
</head>
<body>
<?php
include 'nav.php';
include 'header.php';
?>

<form class="layui-form" action="scoreUpdate.php" method="post" style="">
    <div class="layui-col-md12" style="margin-left: 180px;padding-right: 200px;border: 1px solid #ccc;">
        <div style="padding: 30px;">
            <h1 style="text-align: center;">学生信息修改</h1>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生学号</label>
            <div class="layui-input-block">
                <input type="text" name="xuehao" required lay-verify="required" placeholder="请输入学生学号" maxlength="11"
                       autocomplete="off" value="<?php echo $row1['xuehao']; ?>"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生姓名</label>
            <div class="layui-input-block">
                <input type="text" name="username" required lay-verify="required" placeholder="请输入学生姓名"
                       autocomplete="off" value="<?php echo $row1['username']; ?>"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生学院</label>
            <div class="layui-input-block">
                <input type="text" name="xueyuan" required lay-verify="required" placeholder="请输入学生学院"
                       autocomplete="off"  value="<?php echo $row1['xueyuan']; ?>"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">Android成绩</label>
            <div class="layui-input-block">
                <input type="text" name="android" required lay-verify="required" placeholder="请输入Android成绩"
                       autocomplete="off"  value="<?php echo $row1['android']; ?>"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">J2EE成绩</label>
            <div class="layui-input-block">
                <input type="text" name="j2ee" required lay-verify="required" placeholder="请输入J2EE成绩"
                       autocomplete="off"  value="<?php echo $row1['j2ee']; ?>"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">PHP成绩</label>
            <div class="layui-input-block">
                <input type="text" name="php" required lay-verify="required" placeholder="请输入php成绩"
                       autocomplete="off"  value="<?php echo $row1['php']; ?>"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">JavaScript成绩</label>
            <div class="layui-input-block">
                <input type="text" name="javascript" required lay-verify="required" placeholder="请输入JavaScript成绩"
                       autocomplete="off"  value="<?php echo $row1['javascript']; ?>"
                       class="layui-input">
            </div>
        </div>

        <div style=""></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="scoreList.php">返回首页</a>
                <button class="layui-btn" lay-submit lay-filter="formDemo">修改学生成绩</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>
<script>
    //Demo
    layui.use(['form', 'laydate'], function () {
        var form = layui.form;
        var laydate = layui.laydate;
    });
</script>
</body>
</html>