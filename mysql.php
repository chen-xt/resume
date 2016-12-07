<?php
    //设置页面字符集
    header("content-type:text/html;charset=UTF-8");
    //连接数据库
    $link=mysql_connect("127.0.0.1","root","root") or die("数据库连接失败");
    //选择数据库
    mysql_select_db("group1",$link) or die("数据库连接失败");
    //设置数据的字符集
    mysql_query("set names utf8");
?>