<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>学生信息管理系统</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://picsum.photos/1920/1080');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 左侧导航栏样式 */
       .sidebar {
            background-color: rgba(91, 130, 183, 0.9);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 16rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: width 0.3s ease;
        }

       .sidebar.collapsed {
            width: 4rem;
        }

       .sidebar.collapsed.nav-text {
            display: none;
        }

       .sidebar-toggle {
            position: absolute;
            right: -1.5rem;
            top: 1rem;
            background-color: rgba(31, 41, 55, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

       .sidebar-toggle:hover {
            transform: scale(1.1);
        }

       .sidebar a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.375rem;
            color: white;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

       .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

       .nav-icon {
            margin-right: 0.75rem;
        }

        /* 内容区域样式 */
       .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70%; /* 调整为合适的宽度，这里设置为70% */
            margin-left: 16rem;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

       .content.collapsed {
            margin-left: 4rem;
        }

        /* 修改密码所在画布（table-container）样式 */
       .table-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            padding: 3rem; /* 增加内边距，使内部空间更大 */
            margin-bottom: 2rem;
            width: 80%; /* 增加宽度，使其更宽 */
        }

       .table-container:hover {
            transform: scale(1.01);
        }
    </style>
</head>

<body class="flex">
    <?php
    session_start();
    error_reporting(0);
    include '../conn.php';
    if (!isset($_SESSION['xuehao'])) {
        echo "<script>alert('请先登录');</script>";
        echo "<script>window.location.href='../login.php';</script>";
    }

    $xuehao = $_SESSION['xuehao'];
    $sql1 = "select * from studentinfo where xuehao='$xuehao'";
    $result1 = $db->query($sql1);
    $row1 = $result1->fetch_array();
    $sql2 = "select * from scoreinfo where xuehao='$xuehao'";
    $result2 = $db->query($sql2);
    $row2 = $result2->fetch_array();
    ?>
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle" id="sidebar-toggle">
            <i class="fa-solid fa-bars"></i>
        </button>
        <?php include 'navstu.php'; ?>
    </div>
    <div class="content" id="content">
        <div class="table-container">
            <form class="layui-form" action="dochange.php" method="post" style="">
                <div class="layui-col-md12" style="padding-right: 80px;border: 1px solid #ccc;">
                    <div style="padding: 30px;">
                        <h1 style="text-align: center;">修改密码</h1>
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
                            <button type="submit" class="layui-btn" lay-submit lay-filter="formDemo">修改</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const sidebarToggle = document.getElementById('sidebar-toggle');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            if (sidebar.classList.contains('collapsed')) {
                sidebarToggle.innerHTML = '<i class="fa-solid fa-arrow-right"></i>';
            } else {
                sidebarToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
            }
        });
    </script>
</body>

</html>