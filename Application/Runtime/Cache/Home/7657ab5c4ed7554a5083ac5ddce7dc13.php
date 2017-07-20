<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="/Public/Js/pdf.js"></script>
    <script type="text/javascript" src="/Public/Js/pdf.worker.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap-theme.css" />
    <title>在线浏览</title>
</head>
<body class="bg-image" style="background-image:url('/Public/Images/look_bg.jpg')">
<div >
    <div class="text-center">
        <canvas id="the-canvas" style="border: 2px solid #ff9b32" class="canvas-responsive"></canvas>
    </div>
    <p class="text-center">
        <button  onclick="goPrevious()" class="btn btn-success btn-lg">上一页</button>
        <span class="lead" style="color:#0d0107;">页数: <span id="page_num"></span> / <span id="page_count"></span></span>
        <button  onclick="goNext()" class="btn btn-success btn-lg">下一页</button>
    </p>
</div>
</body>
<script type="text/javascript">
    //路径后台
    var url = '/Public/Resource/Pdf/test.pdf';
    PDFJS.disableWorker = true;
    var pdfDoc = null,
        pageNum = 1,
        scale = 1.0,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');
    /**
     * 获取pdf文件总页数
     * @param num
     */
    function renderPage(num) {
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // 将内容显示到canvas
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            page.render(renderContext);
        });

        // 更新页数
        document.getElementById('page_num').textContent = pageNum;
        document.getElementById('page_count').textContent = pdfDoc.numPages;
    }

    //
    // 点击显示上一页
    //
    function goPrevious() {
        if (pageNum <= 1)
            return;
        pageNum--;
        renderPage(pageNum);
    }

    //
    // 点击显示下一页
    //
    function goNext() {
        if (pageNum >= pdfDoc.numPages)
            return;
        pageNum++;
        renderPage(pageNum);
    }

    //
    // 异步加载文件
    //
    PDFJS.getDocument(url).then(function getPdfHelloWorld(_pdfDoc) {
        pdfDoc = _pdfDoc;
        renderPage(pageNum);
    });
</script>
</html>