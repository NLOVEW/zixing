<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录记录</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/zixing/Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zixing/Public/Css/rightmain.css" />
</head>
<body>
<div class="iframecontent">

    <div class="operate">
        <!-- operate标题结束 -->
        <div class="list">
            <div class="tablewrap">
                <table class="table" width="100%" id="datalist">
                    <thead>
                    <tr>
                        <th></th>
                        <th>时间</th>
                        <th></th>
                        <th>IP地址</th>
                        <th></th>
                        <th>所在地址</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><?php echo ($time); ?></td>
                            <td></td>
                            <td><?php echo ($ip_address); ?></td>
                            <td></td>
                            <td><?php echo ($location_address); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="page"></div>
        </div>

    </div>
</div>
</body>
</html>