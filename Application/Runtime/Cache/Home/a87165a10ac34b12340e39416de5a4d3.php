<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <title>网站设置</title>
    <link rel="stylesheet" type="text/css" href="/zixing/Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zixing/Public/Css/rightmain.css" />
</head>
<body>
<div class="iframecontent">
    <div class="list">
        <div class="itabcontent" id="itabcontent">
            <form action="/zixing/index.php/Home/Personal/complete_messageChange" method="post">
                <!--站点配置开始-->
                <div class="itabcontentlist zdpz">
                    <dl class="clearfix">
                        <dt>用户名：</dt>
                        <dd>
                            <input name="username" type="text" value="<?php echo ($username); ?>" />
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>手机号码：</dt>
                        <dd>
                            <input name="tel_phone" type="text" value="<?php echo ($tel_phone); ?>" />
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>性别：</dt>
                        <dd>
                            <input type="text" value="<?php echo ($sex); ?>" />
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>职位：</dt>
                        <dd>
                            <input type="text" value="<?php echo ($position); ?>" />
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt class="surebtn">保存按钮：</dt>
                        <dd>
                            <!--<a href="javascript:;" class="btn btn-blue" />提交</a>-->
                            <input type="submit" value="提交" class="btn btn-blue"/>
                        </dd>
                    </dl>
                </div>
            <!--站点配置结束-->
            </form>
        </div>
    </div>

</div>

<script type="text/javascript" src="/zixing/Public/Js/jquery-3.1.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="/zixing/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    //alert($)

    $(function(){
        $("#itab ul li").click(function(){
            var _id = $(this).index();

            $(this).addClass('current-item').siblings().removeClass('current-item');
            $('#itabcontent').children('.itabcontentlist').eq(_id).fadeIn('fast').siblings('.itabcontentlist').css('display','none');
        });

    })
</script>
</body>
</html>