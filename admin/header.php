
<div class="layui-header"style="background:rgb(47,64,86);margin-left:199px;">
    <ul class="layui-nav layui-layout-right layui-bg-cyan">
        <img style="width:50px; height:50px; border-radius:50%;outline-style: auto;" class="tupian" src="./touxiang/1.jpg">
        <li class="layui-nav-item layui-hide layui-show-md-inline-block">
            <a href="javascript:;">欢迎 <?php echo $_SESSION['username']; ?> 管理员登录！</a>
    <dl class="layui-nav-child">
      <dd><a href="upload.php">上传头像 <i class="layui-icon layui-icon-add-1" style="font-size: 15px;"></i></a></dd>
      <dd><a href="change.php">修改密码 <i class="layui-icon layui-icon-password" style="font-size: 15px;"></i></a></dd>
      <dd><a href="../loginout.php">退出登录 <i class="layui-icon layui-icon-tips" style="font-size: 15px;"></i></a></dd>
    </dl>
        </li>
    </ul>
</div>