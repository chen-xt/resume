<?php
    include("mysql.php");
    $name=isset($_POST["user_name"])?$_POST["user_name"]:"";//如果不设置三元运算符的话，空值会报错
    $pwd=isset($_POST["pwd"])?$_POST["pwd"]:"";
    $pwd1=isset($_POST["pwd1"])?$_POST["pwd1"]:"";
    $sql1="select * from user where name='$name'";
    $if_name=mysql_query($sql1);
    if(mysql_fetch_assoc($if_name)){
        echo "<script>alert('此用户已经存在');location.href='reg.php';</script>";
    }else{
        if($pwd== $pwd1){
            $sql2="insert into user(name,password) values('$name','$pwd')";
            $data=mysql_query($sql2);
            if($data){
                echo "<script>alert('注册成功');location.href='index.php';</script>";
            }else{
                echo "<script>alert('注册失败');location.href='reg.php';</script>";
            }
        }else{
            echo "<script>alert('密码不一致');location.href='reg.php';</script>";
        }
    }
?>