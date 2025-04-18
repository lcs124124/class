<?php
$mysql_host = "127.0.0.1";    //链接地址
$mysql_user = "root";         //数据库用户名
$mysql_password = "123456";     //数据库登录密码
$mysql_database = "stu";     //数据库名
$db = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database") or die("数据库链接错误");
$db->query("SET NAMES utf8");//写法一
header("Content-type:text/html; charset=utf-8");
?> 