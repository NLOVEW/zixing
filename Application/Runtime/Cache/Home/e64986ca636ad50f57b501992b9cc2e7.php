<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>网站设置</title>
    <link rel="stylesheet" type="text/css" href="/zixing/Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zixing/Public/Css/rightmain.css" />
</head>
<body>
<div class="iframecontent">
    <div class="list">
        <div class="itabcontent" id="itabcontent">
            <form  method="post" id="submit_form">
                <!--站点配置开始-->
                <div class="itabcontentlist zdpz">
                    <dl class="clearfix">
                        <dt>旧密码：</dt>
                        <dd>
                            <input id="old_password" name="old_password" type="text" placeholder="请输入旧密码" />
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>新密码：</dt>
                        <dd>
                            <input id="new_password" name="new_password" type="text" placeholder="请输入新密码"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>确认密码：</dt>
                        <dd>
                            <input id="again_password" type="text" placeholder="请再次输入密码"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt class="surebtn">保存按钮：</dt>
                        <dd>
                            <input type="submit" onclick="check()" value="提交" class="btn btn-blue"/>
                        </dd>
                    </dl>
                </div>
                <!--站点配置结束-->
            </form>
        </div>
    </div>

</div>

<script type="text/javascript" src="/zixing/Public/Js/jquery-3.1.1.js"></script>

<script type="text/javascript" src="/zixing/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#itab ul li").click(function(){
            var _id = $(this).index();

            $(this).addClass('current-item').siblings().removeClass('current-item');
            $('#itabcontent').children('.itabcontentlist').eq(_id).fadeIn('fast').siblings('.itabcontentlist').css('display','none');
        });

    })
</script>
<script type="text/javascript">
    function check() {
        var new_password=document.getElementById("new_password");
        var again_password=document.getElementById("again_password");
        var old_password=document.getElementById("old_password");
        if(new_password.value!=again_password.value){
            alert("新密码核实错误！！!");
        }else{
            if(new_password.value==''){
                alert("新密码不能为空!!!");
            }else if(old_password.value==''){
                alert("请输入旧密码");
            }else{
                document.getElementById("submit_form").action="/zixing/index.php/Home/Personal/complete_passwordChange";
            }
        }
    }
</script>
</body>
</html>