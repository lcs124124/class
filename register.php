<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员注册</title>
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
<?php
?>

<form class="layui-form" action="register.php" method="post" style="">
    <div class="layui-col-md12" style="animation: pane-left 1s;border-radius:20px;padding-right: 80px;border: 1px solid #1e9fff6e; background-color: #ffffff78; margin: 180px 280px;width: 550px;">
        <div style="padding: 30px;">
            <h1 style="text-align: center;color: #1e9fff;">管理员注册</h1>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名<i class="layui-icon layui-icon-username" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="text" name="uname" required lay-verify="required" placeholder="请输入用户名" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码<i class="layui-icon layui-icon-password" style="font-size: 15px;"></i></label>
            <div class="layui-input-block">
                <input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="cpwd" required lay-verify="required" placeholder="请确认密码"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="login.php">返回登录</a>
                <button  type="submit" class="layui-btn" lay-submit lay-filter="formDemo">注册</button>
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

  if (empty($_POST)) {
    return;
  }

  if ($_POST['uname'] == '' || $_POST['pwd'] == '' || $_POST['cpwd'] == '') {
    alert('请填完所有项');
    return;
  }

  if ($_POST['pwd'] != $_POST['cpwd']) {
    alert('密码不一致');
    return;
  }

  require 'conn.php';

  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];

  $sql = "INSERT INTO admininfo (username, password) VALUES ('$uname', '$pwd')";
  
  if ($db->query($sql) === TRUE) {
      alert('注册成功');
      href('login.php');
  }
  else {
      echo "注册失败: " . $sql . "<br>" . $db->error;
  }
 
  $db->close();
?>