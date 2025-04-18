<?php
session_start();
error_reporting(0);
include '../conn.php';
header('Content-type:text/html;charset=utf-8');

$info=array('id'=>1,'name'=>'张三');

echo '<pre>';

// print_r($_FILES);

echo '</pre>';

//接收并处理上传图像

if(!empty($_FILES['pic'])){

    $pic_info=$_FILES['pic'];

    if($pic_info['error']>0){

        $error_msg='上传错误:';

        switch ($pic_info['error']){

            case 1:$error_msg.="文件大小超过了php.ini中upload_max_filesize选项限制的值";

            break;

            case 2:$error_msg.="文件大小超过了表单中max_file_size选项指定的值!";

            break;

            case 3:$error_msg.="文件只有部分被上传!";

            break;

            case 4:$error_msg.="没有文件被上传!";

            break;

            case 6:$error_msg.="找不到临时文件夹!";

            break;

            case 7:$error_msg.="文件写入失败";

            break;

            default:$error_msg.='未知错误!';break;

        }

        echo $error_msg;

        return false;

    }

    //获取文件上传的类型

//    $type=substr(strrchr($pic_info['name'],'.'),1);

//    if($type!=='jpg'){

//        echo '图像类型不符合要求,允许的类型为:jpg';

//        return false;

//    }

    $type=$pic_info['type'];

    $allow_type=array('image/jpeg','image/png','image/gif');

    if(!in_array($type,$allow_type)){

        echo '图像类型不符合要求,允许的类型为:'.implode(',',$allow_type);

        return false;

    }

    //使用用户ID为上传文件命名

    $new_file=$info['id'].'.jpg';

    //设置上传文件保存路径

    $filename='./touxiang/'.$new_file;

    //头像上传的临时目录成功,将其保存到脚本所在目录下的img文件夹中

    if(!move_uploaded_file($pic_info['tmp_name'],$filename)){

        echo '头像上传失败';

        return false;

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生通讯录管理系统</title>
    <link rel="stylesheet" href="../common/css/layui.css">
    <script src="../common/layui.js"></script>
    <style>
        .tupian{
    width:50px;
    height:50px;
  }
  .tx{
    width:250px;
    height:250px;
  }
    </style>
</head>
<body>
<?php
include 'nav.php';
include 'header.php';
?>
<center>
<form action="" method="post" enctype="multipart/form-data">

    <h2>编辑用户头像</h2>
    <br>
    <h3>现有头像:</h3><img class="tx" src="<?php echo './touxiang/'.$info['id'].'.jpg?rand='.rand() ;?>"/><br>
<br>
    上传头像:<input name="pic" type="file"><br>
<!--文件上传表单-->
<br>
    <button type="submit" class="layui-btn">保存头像</button>
</form>
</center>
</body>