<?php
    include("mysql.php");
    $name=isset($_POST["user_name"])?$_POST["user_name"]:"";//如果不设置三元运算符的话，空值会报错
    $sex=isset($_POST["sex"])?$_POST["sex"]:"";
    $age=isset($_POST["age"])?$_POST["age"]:"";
    $tel=isset($_POST["tel"])?$_POST["tel"]:"";
    $job=isset($_POST["job"])?$_POST["job"]:"";
    $id=isset($_GET["id"])?$_GET["id"]:"";

    $arr=explode(".",$_FILES["myfile"]["name"]);
    $path="./images/".date("YmdHis").".".$arr[1];
    move_uploaded_file($_FILES["myfile"]["tmp_name"],$path);

    $sql="update user set job='$job',sex='$sex',age='$age',url='$path',tel='$tel',job='$job' where id='$id'";
    $data=mysql_query($sql);
       if($data){
            echo "<script>alert('发布成功');location.href='show.php?name=$name';</script>";
       }else{
            echo "<script>alert('发布失败');location.href='post.php';</script>";
       }
?>
