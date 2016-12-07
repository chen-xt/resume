<?php
include("mysql.php");
$name=isset($_GET["name"])?$_GET["name"]:""; //获取路径的name参数值
$sql="select * from user where name='$name'";
$data=mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>用户信息</title>
    <br/>
    <style type="text/css">
        html{
            overflow-y:scroll; vertical-align:baseline;
        }
        body{
            font-family:Microsoft YaHei,Segoe UI,Tahoma,Arial,Verdana,sans-serif;
            font-size:12px;color:#fff;height:100%;line-height:1;background:#999}
        *{
            margin:0;padding:0;
        }
        ul,li{
            list-style:none
        }
        h1{
            font-size:30px;font-weight:700;text-shadow:0 1px 4px rgba(0,0,0,.2)
        }
        .login-box{
            width:410px;margin:120px auto 0 auto;text-align:center;padding:30px;
            background:url(images/mask.png);border-radius:10px;height: 480px;
        }
        table tr td{
            font-size:16px;text-shadow:0 1px 2px rgba(0,0,0,.1);
        }
        .login-box label{
            display:inline-block;height:42px;width:90px;line-height:34px;text-align:left;
        }
        .login-box img{
            width:50px;height:50px;border:none;
        }
        .screenbg{
            position:fixed;bottom:0;left:0;z-index:-999;overflow:hidden;width:100%;height:100%;min-height:100%;
        }
        .screenbg ul li{
            display:block;list-style:none;position:fixed;overflow:hidden;top:0;left:0;width:100%;height:100%;
            z-index:-1000;float:right;
        }
        .screenbg ul a{
            left:0;top:0;width:100%;height:100%;display:inline-block;margin:0;padding:0;cursor:default;
        }
        .screenbg a img{
            vertical-align:middle;display:inline;border:none;display:block;list-style:none;position:fixed;
            overflow:hidden;top:0;left:0;width:100%;height:100%;z-index:-1000;float:right;
        }
        .left{
            float: left;width: 100px;height: 400px;
        }
        .right{
            float: right;width: 300px;height: 400px;
        }
        .t1{
            width: 100px;height: 40px;
        }
        .t2{
            width: 300px;height: 40px;
        }
        .button{
            cursor:pointer;width:100px;height:30px;padding:0;background:chocolate;border:1px solid #ff730e;
            border-radius:6px;font-weight:700;color:#fff;font-size:12px;letter-spacing:10px;
            text-shadow:0 1px 2px rgba(0,0,0,.1);float: right;
        }
        a{
            text-decoration: none;color:saddlebrown;
        }
        a:hover{
            font-size: 28px;
        }
    </style>

    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".screenbg ul li").each(function(){
                $(this).css("opacity","0");
            });
            $(".screenbg ul li:first").css("opacity","1");
            var index = 0;
            var t;
            var li = $(".screenbg ul li");
            var number = li.size();
            function change(index){
                li.css("visibility","visible");
                li.eq(index).siblings().animate({opacity:0},3000);
                li.eq(index).animate({opacity:1},3000);
            }
            function show(){
                index = index + 1;
                if(index<=number-1){
                    change(index);
                }else{
                    index = 0;
                    change(index);
                }
            }
            t = setInterval(show,8000);
            //根据窗口宽度生成图片宽度
            var width = $(window).width();
            $(".screenbg ul img").css("width",width+"px");
        });
    </script>
</head>

<body>
<div class="login-box">
    <h1>欢迎<?php echo $name; ?>登录</h1><br/><br/>
    <table class="left">
        <tr class="t1">
            <td><label> ID ：</label></td>
        </tr>
        <tr class="t1">
            <td><label>用户名：</label></td>
        </tr>
        <tr class="t1">
            <td><label>密码：</label></td>
        </tr>
        <tr class="t1">
            <td><label>操作：</label></td>
        </tr>
        <tr class="t1">
            <td><label>操作：</label></td>
        </tr>
        <tr class="t1">
            <td><label>操作：</label></td>
        </tr>
        <tr class="t1">
            <td><label>操作：</label></td>
        </tr>
    </table>
    <table class="right">
        <?php
        while($arr = mysql_fetch_assoc($data) ){
            ?>
            <tr  class="t2">
                <td><?php echo $arr["id"];?></td>
            </tr>
            <tr   class="t2">
                <td><?php echo $arr["name"];?></td>
            </tr>
            <tr   class="t2">
                <td><?php echo $arr["password"];?></td>
            </tr>
            <tr class="t2">
                <td><a href="update.php?id=<?php echo $arr["id"]; ?>&name=<?php echo $arr["name"]; ?>">修改</a></td>
            </tr>
            <tr class="t2">
                <td><a href="post.php?id=<?php echo $arr["id"]; ?>&name=<?php echo $arr["name"]; ?>">投递</a></td>
            </tr>
            <tr class="t2">
                <td><a href="delete.php?id=<?php echo $arr["id"]; ?>&name=<?php echo $arr["name"]; ?>">删除</a></td>
            </tr>
            <tr class="t2">
                <td><a href="search.php?id=<?php echo $arr["id"]; ?>&name=<?php echo $arr["name"]; ?>">搜索</a></td>
            </tr>
        <?php } ?>
    </table>
     <div>
        <a href="index.php" class="button"><input type="button" value="返回首页"  class="button"/></a>
    </div>
</div>
<div class="screenbg">
    <ul>
        <li><a href="javascript:;"><img src="images/0.jpg"></a></li>
        <li><a href="javascript:;"><img src="images/1.jpg"></a></li>
        <li><a href="javascript:;"><img src="images/2.jpg"></a></li>
    </ul>
</div>
</body>
</html>