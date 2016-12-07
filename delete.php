<?php
include("mysql.php");
$id=isset($_GET["id"])?$_GET["id"]:""; //获取路径的name参数值
$name=isset($_GET["name"])?$_GET["name"]:"";
$sql="delete from user where id='$id'";
$data=mysql_query($sql);

if($data){
    echo "<script>alert('删除成功，请重新注册');location.href='reg.php';</script>";
}else{
    echo "<script>alert('删除失败');location.href='list.php?name=".$name."';</script>";
}
?>