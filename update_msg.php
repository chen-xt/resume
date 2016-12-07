<?php
    include("mysql.php");
    $name=isset($_POST["user_name"])?$_POST["user_name"]:"";//如果不设置三元运算符的话，空值会报错
    $pwd=isset($_POST["pwd"])?$_POST["pwd"]:"";
    $pwd1=isset($_POST["pwd1"])?$_POST["pwd1"]:"";
    $sex=isset($_POST["sex"])?$_POST["sex"]:"";
    $age=isset($_POST["age"])?$_POST["age"]:"";
    $tel=isset($_POST["tel"])?$_POST["tel"]:"";
    $job=isset($_POST["job"])?$_POST["job"]:"";
    $id=isset($_POST["id"])?$_POST["id"]:"";

    $arr=explode(".",$_FILES["myfile"]["name"]);
    $path="./images/".date("YmdHis").".".$arr[1];
    move_uploaded_file($_FILES["myfile"]["tmp_name"],$path);

    if($pwd == $pwd1){
        $sql="update user set name='$name',password='$pwd',sex='$sex',age='$age',url='$path',tel='$tel',job='$job' where id='$id'";
        $data=mysql_query($sql);
        if($data){
            echo "<script>alert('修改成功');location.href='show.php?name=".$name."';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='update.php?id=".$id."';</script>";
        }
    }else{
        echo "<script>alert('密码不一致');location.href='update.php?id=".$id."';</script>";
    }
?>