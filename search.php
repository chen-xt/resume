<?php
    include("mysql.php");
    $name=isset($_GET["name"])?$_GET["name"]:""; //获取路径的name参数值
    $sql1="select count(id) from user ";
    $data=mysql_query($sql1);
    $count=mysql_fetch_assoc($data);
    //总条数
    $count=$count["count(id)"];
    //每页显示条数
    $num=3;
    //总页数
    $page_num=ceil($count/$num);
    //当前页数
    $page=isset($_GET["page"])?$_GET["page"]:1;
    //偏移量
    $limit=($page-1)*$num;
    //当前显示数据
    $sql2="select * from user limit $limit,$num";
    $data1=mysql_query($sql2);

    $str="<a href='search.php?page=1&name=$name'>首页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $up_page=$page-1?$page-1:1;
    $str.="<a href='search.php?page=$up_page&name=$name'>上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $down_page=$page+1>$page_num?$page_num:$page+1;
    $str.="<a href='search.php?page=$down_page&name=$name'>下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $str.="<a href='search.php?page=$page_num&name=$name'>尾页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
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
            width:850px;margin:120px auto 0 auto;text-align:center;padding:30px;
            background:url(images/mask.png);border-radius:10px;height: 320px;
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
        td{
            width: 90px;
            margin-left: 10px;
            text-align: center;
        }
        .button{
            cursor:pointer;width:100px;height:30px;padding:0;background:chocolate;border:1px solid #ff730e;
            border-radius:6px;font-weight:700;color:#fff;font-size:12px;letter-spacing:10px;
            text-shadow:0 1px 2px rgba(0,0,0,.1);float: right;
        }
        .button1{
            cursor:pointer;width:50px;height:28px;padding:0;background:#c0c0c0;border:1px solid #c0c0c0;
            border-radius:6px;font-weight:700;color:#fff;font-size:12px;letter-spacing:10px;
            text-shadow:0 1px 2px rgba(0,0,0,.1);padding-left: 4px;
        }
        a{
            text-decoration: none;color:saddlebrown;
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
    <h1><font color="#8b4513" id="p1">欢迎<?php echo $name; ?>登录</font></h1><br/><br/>
    <form action="search_find.php" method="post">
    <label style="font-size: 16px;width: 90px;">搜索职位：</label><input type="text" name="search">&nbsp;
        <input type="submit" value="搜索" class="button1">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="name" value="<?php echo $name; ?>">
    </form>
    <table>
        <tr>
            <td><label> ID <label></td>
            <td><label>用户名</label></td>
            <td><label>头  像</label></td>
            <td><label>性 别</label></td>
            <td><label>年  龄</label></td>
            <td><label>联系方式</label></td>
            <td><label>求职意向</label></td>
        </tr>
        <?php
         while($arr = mysql_fetch_assoc($data1) ){
        ?>
            <tr>
                <td><?php echo $arr["id"];?></td>
                <td><?php echo $arr["name"];?></td>
                <td><img src="<?php echo $arr["url"]; ?>" alt="图片" width="40px"></td>
                <td><?php echo $arr["sex"]; ?></td>
                <td><?php echo $arr["age"];?></td>
                <td><?php echo $arr["tel"];?></td>
                <td><?php echo $arr["job"];?></td>
            </tr>
        <?php } ?>
     </table><br/>
     <?php echo $str ?>
    <div>
        <a href="list.php?name=<?php echo $name ?>" class="button"><input type="button" value="返回"  class="button"/></a>
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