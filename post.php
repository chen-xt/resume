<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>发布</title>

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
            background:url(images/mask.png);border-radius:10px;
        }
        .login-box .name,.login-box .sex,.login-box .age,.login-box .tel,.login-box .photo,.login-box .job{
            font-size:16px;text-shadow:0 1px 2px rgba(0,0,0,.1);
        }
        .login-box input{
            box-shadow:none;width:15px;height:15px;margin-top:25px;
        }
        .login-box label{
            display:inline-block;height:42px;width:90px;line-height:34px;text-align:left;
        }
        /*.login-box label{display:inline-block;width:100px;text-align:right;vertical-align:middle}*/
        .login-box img{
            width:50px;height:50px;border:none;
        }
        input[type=text],input[type=radio]{
            width:270px;height:42px;margin-top:25px;padding:0px 15px;border:1px solid rgba(255,255,255,.15);
            border-radius:6px;color:#fff;letter-spacing:2px;font-size:16px;background:transparent;
        }
        button{
            cursor:pointer;width:100%;height:44px;padding:0;background:#ef4300;
            border:1px solid #ff730e;border-radius:6px;font-weight:700;color:#fff;font-size:24px;
            letter-spacing:15px;text-shadow:0 1px 2px rgba(0,0,0,.1);
        }
        input:focus{
            outline:none;box-shadow:0 2px 3px 0 rgba(0,0,0,.1) inset,0 2px 7px 0 rgba(0,0,0,.2);
        }
        button:hover{
            box-shadow:0 15px 30px 0 rgba(255,255,255,.15) inset,0 2px 7px 0 rgba(0,0,0,.2);
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
        table{
            width: 410px;height: 70px;
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
<?php
    $name=isset($_GET["name"])?$_GET["name"]:"";
    $id=isset($_GET["id"])?$_GET["id"]:"";
?>
<div class="login-box">
    <h1>简历投递</h1>
    <form action="post_add.php?id=<?php echo $id?>" enctype="multipart/form-data" method="post">
        <div class="name">
            <label>用户名：</label>
            <input type="text" name="user_name" tabindex="1" value="<?php echo $name;?>" autocomplete="off" />
        </div>
        <div class="sex">
            <table>
                <tr>
                <td><label>性 别：</label></td>
                <td><input type="radio" name="sex" value="男" style="height: 30px;width: 100px;margin: 0px auto;" />男</td>
                <td><input type="radio" name="sex" value="女"  style="height: 30px;width: 100px;margin: 0px auto;"/>女</td>
                </tr>
            </table>
        </div>
        <div class="age">
            <label>年  龄：</label>
            <input type="text" name="age"  maxlength="16" id="" tabindex="2"/>
        </div>
        <div class="photo">
            <label>头  像：</label>
            <input type="file" name="myfile"  maxlength="16" style="width: 300px;">
        </div>
        <div class="tel">
            <label>联系方式：</label>
            <input type="text" name="tel"  maxlength="16" >
        </div>
        <div class="job">
            <label>求职意向：</label>
            <input type="text" name="job"  maxlength="16" >
        </div>
        <br/><div class="post">
            <button type="submit" tabindex="5">投递</button>
        </div>
    </form>
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
