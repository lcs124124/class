<?php
session_start();
error_reporting(0);
include '../conn.php';
    require '../functions.php';
    $pwd = $_POST['pwd'];
    $npwd = $_POST['npwd'];
    $cnpwd = $_POST['cnpwd'];

    if ($npwd != $cnpwd) {
        alert('两个密码不一致，请重新输入。');
        href("change.php");
        return;
    }
    $uname = $_SESSION['xuehao'];
    $sql = "SELECT * FROM studentinfo where xuehao=$uname and password = $pwd";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "update studentinfo set password='$npwd' where password='$pwd' and xuehao=$uname";
    
        if ($db->query($sql) === TRUE) {
            alert('修改成功，请重新登录！');
            href("../login.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    else {
        alert('原密码不正确。');
        href("student.php");
    }
    $db->close();

?>