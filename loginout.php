<?php
session_start();
header("Content-Type: text/html; charset=utf-8");//设置页面编码

// 引入数据库连接文件
include 'conn.php';

// 检查用户是否登录
if (isset($_SESSION['xuehao'])) {
    $xuehao = $_SESSION['xuehao'];

    // 删除学生信息表中的记录
    $deleteStudentSql = "DELETE FROM studentinfo WHERE xuehao = '$xuehao'";
    $db->query($deleteStudentSql);

    // 删除成绩信息表中的记录
    $deleteScoreSql = "DELETE FROM scoreinfo WHERE xuehao = '$xuehao'";
    $db->query($deleteScoreSql);

    // 关闭数据库连接
    $db->close();
}

// 彻底销毁 session
session_destroy();

// 返回登录页面
echo "<script type=\"text/javascript\">alert('用户注销成功，该用户已被删除');</script>"; 
echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; 
?>