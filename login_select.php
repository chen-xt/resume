<?php
    include("mysql.php");
    $name=$_POST["user_name"];
    $pwd=$_POST["pwd"];
    //sql语句
    $sql="select * from user where name='$name'";
    //$sql="select * from user where name='$name'and status='0'";
    //执行sql
    $data=mysql_query($sql);
    //数组形式
    $data=mysql_fetch_assoc($data);
    if($data){
        if($data["password"]==$pwd){
            echo "<script>alert('登录成功');location.href='list.php?name=$name';</script>";
        }else{
            echo "<script>alert('密码错误');location.href='index.php';</script>";
        }
    }else{
        echo "<script>alert('查询无此用户');location.href='index.php';</script>";
    }
?>