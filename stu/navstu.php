<?php
header("Content-type:text/html; charset=utf-8");
?>
<ul class="layui-nav layui-bg-cyan layui-nav-tree layui-nav-side" lay-filter="">
    <li class="layui-nav-item"><a href="../login.php">返回登录  <i class="layui-icon layui-icon-return" style="font-size: 15px;"></i></a></li>
    <li class="layui-nav-item"><a href="student.php">我的信息</a></li>
  <li class="layui-nav-item"><a href="scores.php">学生列表</a></li>
  <li class="layui-nav-item"><a href="change.php">修改密码</a></li>
    <li class="layui-nav-item"><a href="../loginout.php">退出登录  <i class="layui-icon layui-icon-tips" style="font-size: 15px;"></i></a></li>
</ul>
<script>
    layui.use('element', function () {
        var element = layui.element;
    });
</script>
