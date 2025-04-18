<?php
require '../functions.php';
$con=mysqli_connect("127.0.0.1","root","000000","stu");
if (!$con)
{
    die("error:".mysqli_connect_error());
}

$user=$_POST['user'];
$pwd=$_POST['pwd'];
$npwd=$_POST['npwd'];
$cnpwd=$_POST['cnpwd'];
if ($npwd != $cnpwd) {
    alert('两个密码不一致，请重新输入。');
    href("change.php");
    return;
}
$sql="select * from admininfo where username='$user' and password='$pwd'";

$res=mysqli_query($con,$sql);
//查询结果保存在$res对象中


//把$res转换成索引数组
$row=mysqli_fetch_array($res,MYSQLI_NUM);

// 数组不为空就显示登入成功
if(!is_null($row))
{
    $sql1="update admininfo set password='$npwd' where username='$user' and password='$pwd'";
    $res1=mysqli_query($con,$sql1);
    alert('修改成功，请重新登录！');
    href("../login.php");
}
else{
    alert('原密码不正确。');
    href("change.php");
}

