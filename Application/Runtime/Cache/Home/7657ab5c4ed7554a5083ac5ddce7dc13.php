<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html dir="ltr" mozdisallowselectionprint moznomarginboxes>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>在线浏览</title>
    <link rel="stylesheet" type="text/css" href="/Public/Pdfconfig/viewer.css" />
    <script type="text/javascript" src="/Public/Pdfconfig/compatibility.js"></script>
    
    <script type="text/javascript" src="/Public/Pdfconfig/l10n.js"></script>
    <script type="text/javascript" src="/Public/Pdfconfig/debugger.js"></script>
    <script type="text/javascript" src="viewer.js"></script>
    <script type="text/javascript" src="/Public/Js/pdf.js"></script>
    <script type="text/javascript" src="/Public/Js/pdf.worker.js"></script>
</head>
<body tabindex="1" class="loadingInProgress">
    <div style="text-align:center;clear:both"></div>
    <iframe frameborder="0" scrolling="no" src="/index.php/Home/Look/viewer" width="100%" height="100%"></iframe>
</body>
</html>