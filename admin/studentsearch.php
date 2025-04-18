<?php
include 'nav.php';
session_start();
error_reporting(0);
include '../conn.php';
if (!isset($_SESSION['username'])) {
    echo "<script>alert('请先登录');</script>"; 
    echo "<script>window.location.href='../login.php';</script>";
}
?>

<html>
<head>
<meta charset="utf-8">
    <title>学生信息查询</title>
    <link rel="stylesheet" href="../common/css/layui.css"/>
    <script src="../common/layui.js"></script>

</head>
<body>
<?php
include 'nav.php';
include 'header.php';
?>
<form class="layui-form" action="studentsearch.php" method="post" style="">
    <div style="padding: 0px;padding-left: 200px;border: 0px solid #ccc;">
    <div class="layui-col-md12" style="padding: 10px;border: 1px solid #ccc;">
        <div class="layui-form-item">
            <label class="layui-form-label">请输入姓名:</label>
            <div class="layui-input-block">
                <input type="text" name="keywords" required lay-verify="required" placeholder="请输入学生姓名" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" type="submit" lay-submit lay-filter="formDemo"><i class="layui-icon layui-icon-search" style="font-size: 10px; color: #fff;"></i>搜索学生信息</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>
    <table class="layui-table layui-table-hover">
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>学院</td>
            <td>性别</td>
            <td>班级</td>
            <td>电话</td>
        </tr>
        <?php
	require("../conn.php");
	$keywords=$_POST['keywords'];
	$sql="select * from studentinfo where username like '%".$keywords."%'";
	$result=mysqli_query($db,$sql);
    $total = 0;
	if(!$result){
		die('无法读取数据,请联系管理员修复:'.mysqli_error($db));
	}
	while($row=mysqli_fetch_array($result)){
        $total++;
        ?>

<tr bgColor="#ffffff">
                <td><?php echo $row['xuehao']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['xueyuan']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['classname']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
            <?php
        }
        if ($total == 0) {
            echo "没有记录";
        }
        ?>

    </table>
</div>
</body>
</html>

<!-- <form class="layui-form" action="studentsearch.php" method="post" style="">
    <div class="layui-col-md12" style="padding-right: 80px;border: 1px solid #ccc;">
        <div class="layui-form-item">
            <label class="layui-form-label">请输入学生姓名</label>
            <div class="layui-input-block">
                <input type="text" name="keywords" required lay-verify="required" placeholder="请输入学生姓名" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
    </div>
    <input type="submit" value="搜索" class="btn">
</form> -->