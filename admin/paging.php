<?php
header("content-type:text/html;charset=utf-8;");
require ('../conn.php');
$limit = $_POST['limit'];
$page = $_POST['page'];
$new_page = ($page - 1)*$limit;
$sql = "select * from studentinfo order by id desc limit " .$new_page.",".$limit;
$result = $mysqli->query($sql);
$sql2 = 'select * from studentinfo';
$count = mysqli_num_rows($mysqli->query($sql2));
$arr = array();
while ($row = mysqli_fetch_array($result)) {  
    $arr[] = $row;
}
$donation_data = array(  // 拼装成为前端需要的JSON
    'code'=>0,
    'msg'=>'',
    'count'=>$count,
    'data'=>$arr
);
echo json_encode($donation_data);
//echo $sql;
?>

