<?php
session_start();
error_reporting(0);
include '../conn.php';
if ($_GET['id']) {
    $sql = "delete from scoreinfo where xuehao='$_GET[id]' ";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('删除学生成绩成功');window.location.href='scoreList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('删除学生成绩失败');window.location.href='scoreList.php';</script>";
    }
}
?>