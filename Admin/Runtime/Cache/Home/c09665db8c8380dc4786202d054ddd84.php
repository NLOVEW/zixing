<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/Public/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" />
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/Public/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>管理员中心</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:;">管理菜单</a>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>欢迎您，</li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A"><?php echo ($username); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="/admin.php/Home/Login/login">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 我的账户<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="/admin.php/Home/Personal/personal" data-title="个人信息" href="javascript:;">个人信息</a></li>
                    <li><a data-href="/admin.php/Home/Personal/changePassword" data-title="修改密码" href="javascript:;">修改密码</a></li>
                    <li><a data-href="/admin.php/Home/Personal/loginTotal" data-title="登录统计" href="javascript:;">登录统计</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 资源管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="/admin.php/Home/Resource/upload" data-title="上传资源" href="javascript:void(0)">上传资源</a></li>
                    <li><a data-href="#" data-title="浏览资源" href="javascript:void(0)">浏览资源</a></li>
                    <li><a data-href="#" data-title="资源使用统计" href="javascript:void(0)">资源使用统计</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-course">
            <dt><i class="Hui-iconfont">&#xe61a;</i> 课程管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="#" data-title="查看课程" href="javascript:void(0)">查看课程</a></li>
                    <li><a data-href="#" data-title="添加课程" href="javascript:void(0)">添加课程</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="#" data-title="添加用户" href="javascript:void(0)">添加用户</a></li>
                    <li><a data-href="#" data-title="学生列表" href="javascript:void(0)">学生列表</a></li>
                    <li><a data-href="#" data-title="助教列表" href="javascript:void(0)">助教列表</a></li>
                    <li><a data-href="#" data-title="讲师列表" href="javascript:void(0)">讲师列表</a></li>
                    <li><a data-href="#" data-title="课程负责人列表" href="javascript:void(0)">课程负责人列表</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="欢迎界面" data-href="/admin.php/Home/Admin/welcome">欢迎界面</span>
                    <em></em>
                </li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group">
            <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d4;</i>
            </a>
            <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d7;</i>
            </a>
        </div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="/admin.php/Home/Admin/welcome"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<!--<script type="text/javascript">-->
    <!--$(function(){-->

    <!--});-->

    <!--/*资讯-添加*/-->
    <!--function article_add(title,url){-->
        <!--var index = layer.open({-->
            <!--type: 2,-->
            <!--title: title,-->
            <!--content: url-->
        <!--});-->
        <!--layer.full(index);-->
    <!--}-->
    <!--/*图片-添加*/-->
    <!--function picture_add(title,url){-->
        <!--var index = layer.open({-->
            <!--type: 2,-->
            <!--title: title,-->
            <!--content: url-->
        <!--});-->
        <!--layer.full(index);-->
    <!--}-->
    <!--/*产品-添加*/-->
    <!--function product_add(title,url){-->
        <!--var index = layer.open({-->
            <!--type: 2,-->
            <!--title: title,-->
            <!--content: url-->
        <!--});-->
        <!--layer.full(index);-->
    <!--}-->
    <!--/*用户-添加*/-->
    <!--function member_add(title,url,w,h){-->
        <!--layer_show(title,url,w,h);-->
    <!--}-->


<!--//</script>-->
</body>
</html>