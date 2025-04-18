<?php
session_start();
error_reporting(0);
include '../conn.php';

// 检查用户是否登录
if (!isset($_SESSION['username'])) {
    echo "<script>alert('请先登录');</script>";
    echo "<script>window.location.href='login.php';</script>";
}

// 处理删除请求
if (isset($_POST['xuehao'])) {
    $xuehao = $_POST['xuehao'];
    $stmt = $db->prepare("DELETE FROM studentinfo WHERE xuehao = ?");
    $stmt->bind_param("s", $xuehao);
    if ($stmt->execute()) {
        echo "<script>alert('删除成功');window.location.href='studentList.php';</script>";
    } else {
        echo "<script>alert('删除失败');window.location.href='studentList.php';</script>";
    }
    $stmt->close();
}

// 查询要删除的学生信息
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM studentinfo WHERE xuehao = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row1 = $result->fetch_array();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>学生信息删除</title>
    <link rel="stylesheet" href="../common/css/layui.css" />
    <script src="../common/layui.js"></script>
    <script>
        layui.use(['form', 'layer'], function () {
            var form = layui.form;
            var layer = layui.layer;

            form.on('submit(formDemo)', function (data) {
                layer.confirm('确认要删除该学生信息吗？', {
                    btn: ['确认', '取消']
                }, function () {
                    document.forms[0].submit();
                }, function () {
                    layer.msg('已取消删除', { icon: 1 });
                });
                return false;
            });
        });
    </script>
</head>

<body>
    <?php
    include 'nav.php';
    include 'header.php';
    ?>

    <form class="layui-form" action="studentDelete.php" method="post" style="">
        <div class="layui-col-md12" style="margin-left: 180px;padding-right: 200px;border: 1px solid #ccc;">
            <div style="padding: 30px;">
                <h1 style="text-align: center;">学生信息删除</h1>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">学生学号</label>
                <div class="layui-input-block">
                    <input type="text" name="xuehao" required lay-verify="required" placeholder="请输入学生学号" maxlength="11" readonly
                        autocomplete="off" value="<?php echo $row1['xuehao']; ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">学生姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="username" required lay-verify="required" placeholder="请输入学生姓名"
                        autocomplete="off" value="<?php echo $row1['username']; ?>" readonly class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">学生学院</label>
                <div class="layui-input-block">
                    <input type="text" name="xueyuan" required lay-verify="required" placeholder="请输入学生学院"
                        autocomplete="off" value="<?php echo $row1['xueyuan']; ?>" readonly class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">学生性别</label>
                <div class="layui-input-block">
                    <input type="text" name="sex" required lay-verify="required" placeholder="请输入学生性别"
                        autocomplete="off" value="<?php echo $row1['sex']; ?>" readonly class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-block">
                    <input type="text" name="phone" required lay-verify="required" placeholder="请输入手机号码"
                        autocomplete="off" value="<?php echo $row1['phone']; ?>" readonly class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">学生班级</label>
                <div class="layui-input-block">
                    <input type="text" name="classname" required lay-verify="required" placeholder="请输入学生班级"
                        autocomplete="off" value="<?php echo $row1['classname']; ?>" readonly class="layui-input">
                </div>
            </div>
            <div style="height: 50px;"></div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a class="layui-btn" href="studentList.php">返回首页</a>
                    <button class="layui-btn" lay-submit lay-filter="formDemo">删除学生信息</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>