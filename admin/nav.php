<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>班级通讯录导航</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/layui/2.8.10/css/layui.min.css">
    <script src="https://cdn.staticfile.org/layui/2.8.10/layui.min.js"></script>
    <?php
    header("Content-type:text/html; charset=utf-8");
    ?>
    <style>
        .layui-bg-black {
            height: 50px;
        }
        /* 添加背景颜色 */
        .layui-nav {
            background-color:rgba(91, 130, 183, 0.9); 
        }
    </style>
</head>
<body>
    <ul class="layui-nav layui-bg-cyan layui-nav-tree layui-nav-side" lay-filter="">
        <div class="layui-logo layui-hide-xs layui-bg-black" style="font-weight: bold;font-size:23px;margin-top:10px;margin-left:10px;">班级通讯录</div>
        <li class="layui-nav-item"><a href="studentList.php">学生表</a></li> 
        <li class="layui-nav-item"><a href="studentAdd.php">添加学生</a></li> 
        <li class="layui-nav-item"><a href="studentsearch.php">查询学生</a></li> 
        <li class="layui-nav-item"><a href="../loginout.php">注销登录  <i class="layui-icon layui-icon-tips" style="font-size: 15px;"></i></a></li>
    </ul>
    <script>
        layui.use('element', function () {
            var element = layui.element;
        });
    </script>
</body>
</html>