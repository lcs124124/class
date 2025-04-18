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

       .table-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            padding: 2rem;
            margin-bottom: 2rem;
            width: 100%; /* 撑满内容区域宽度 */
        }

       .table-container:hover {
            transform: scale(1.01);
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
            font-weight: 600;
            padding: 1rem;
        }

        td {
            color: #4b5563;
            padding: 1rem;
        }

        tr:nth-child(even) td {
            background-color: #f9fafb;
        }

        h1 {
            color: #1f2937;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
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
            <h1>学生个人信息</h1>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tr>
                    <th class="border border-gray-300 w-1/4">学号</th>
                    <td class="border border-gray-300"><?php echo $row1['xuehao']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">姓名</th>
                    <td class="border border-gray-300"><?php echo $row1['username']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">性别</th>
                    <td class="border border-gray-300"><?php echo $row1['sex']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">学院</th>
                    <td class="border border-gray-300"><?php echo $row1['xueyuan']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">班级</th>
                    <td class="border border-gray-300"><?php echo $row1['classname']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">电话</th>
                    <td class="border border-gray-300"><?php echo $row1['phone']; ?></td>
                </tr>
            </table>
        </div>
        <div class="table-container">
            <h1>学生个人成绩</h1>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tr>
                    <th class="border border-gray-300 w-1/4">Android成绩</th>
                    <td class="border border-gray-300"><?php echo $row2['android']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">J2EE成绩</th>
                    <td class="border border-gray-300"><?php echo $row2['j2ee']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">PHP成绩</th>
                    <td class="border border-gray-300"><?php echo $row2['php']; ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300">JavaScript成绩</th>
                    <td class="border border-gray-300"><?php echo $row2['javascript']; ?></td>
                </tr>
            </table>
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