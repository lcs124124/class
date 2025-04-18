<?php
require ('../conn.php');

$sql = 'select count(*) from studentinfo';
$result = $mysqli->query($sql);
$sum = mysqli_fetch_row($result);
echo ceil($sum[0]/1);
?>
