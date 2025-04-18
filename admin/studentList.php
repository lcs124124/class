<?php
    session_start();
    error_reporting(0);
    include '../conn.php';
    if (!isset($_SESSION['username'])) {
       echo "<script>alert('请先登录');</script>"; 
       echo "<script>window.location.href='../login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>班级通讯录</title>
    <link rel="stylesheet" href="../common/css/layui.css"/>
    <script src="../common/layui.js"></script>
    <style>
        .layui-table {
            margin-left: 50px;
        }
    </style>
</head>

<body>
<?php
    include 'nav.php';
    include 'header.php';
?>
<div class="layui-container">
    <table class="layui-table layui-table-hover">
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>学院</td>
            <td>性别</td>
            <td>电话</td>
            <td>班级</td>
            <td style="width:200px;">操作</td>
        </tr>
	<?php
    $rowCount = 0;//表数据总行数
    $pageSize = 8;//每页显示8行数据
   //获取当前页 来自身超链接 用户的点击
   if (empty($_GET['pageNow'])) {
       $pageNow = 1;
   }else{
       $pageNow = $_GET['pageNow'];//当前页
   }

   $pageCount = 0;//一共多少页数据

   $sql = "select count(xuehao) from studentinfo";
   $res1 =mysqli_query($db,$sql);
   //取出总行数
   if($row1 = mysqli_fetch_row($res1)){
       $rowCount = $row1[0];
   }
   //计算 数据总页数
   $pageCount = ceil($rowCount/$pageSize);
   //显示某页 员工数据信息条
        $sql = "select * from studentinfo order by xuehao asc limit ".($pageNow-1)*$pageSize.",$pageSize";
        $res =mysqli_query($db,$sql);
        // $result = $db->query($sql);
        $total = 0;
        while ($row =$res->fetch_array()) {
            $total++;
        ?>

            <tr bgColor="#ffffff">
                <td><?php echo $row['xuehao']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['xueyuan']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['classname']; ?></td>
                <td>
                    <button class="layui-btn layui-btn-danger" onclick="updateinfo(<?php echo $row['xuehao']; ?>)">修改
                    <i class="layui-icon layui-icon-fonts-clear" style="font-size: 10px; color: #fff;"></i></button>
                
                    <button class="layui-btn layui-btn-danger" onclick="deleteinfo(<?php echo $row['xuehao']; ?>)">删除
                    <i class="layui-icon layui-icon-delete" style="font-size: 15px; color: #fff;"></i></button>
                   

                </td>
            </tr>
            <?php
        }
        if ($total == 0) {
            echo "没有记录";
        }
        ?>
    </table>
    <div align="center">
              共 <b><?php echo $rowCount?></b> 个数据,共<?php echo $pageCount;?>页
              <a href="<?php echo $_SERVER['PHP_SELF']."?pageNow=1"?>">首页</a>
    
              <a href="<?php echo $_SERVER['PHP_SELF']?>?pageNow=<?php if($pageNow>1) echo $pageNow-1;else echo $pageNow=1;?>">上一页</a>
              <?php
              for($i=1;$i<=$pageCount;$i++){    //$i<=$pagecount(必须是<=)
                echo "<a href=".$_SERVER['PHP_SELF']."?pageNow=$i".">[".$i."]</a>";
              }
              
              ?>
              <a href="<?php echo $_SERVER['PHP_SELF']?>?pageNow=<?PHP if($pageNow<$pageCount-1) echo $pageNow+1; else echo $pageCount;?>">下一页</a>
              <a href="<?php echo $_SERVER['PHP_SELF']."?pageNow={$pageCount}"?>">尾页</a>
</div>
    <script>
        function updateinfo(id) {
            if (confirm("确定要修改学生信息吗？")) {
                window.location.href = "studentUpdate.php?id=" + id;
            }
        }

        function deleteinfo(id) {
            if (confirm("确定要删除学生信息吗？")) {
                window.location.href = "studentDelete.php?id=" + id;
            }
        }
    </script>
</div>
</body>
</html>