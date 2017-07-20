<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文件上传</title>
    <link rel="stylesheet" type="text/css" href="/zixing/Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zixing/Public/Css/rightmain.css" />
</head>
<body>
<div class="iframecontent">
    <form  method="post" id="upload_form" enctype="multipart/form-data">
        <table width="100%">
            <tbody>
            <tr>
                <th>文件：</th>
                <td>
                    <!--需要更改php.ini中的post_max...和fileupload的大小-->
                    <input name="file[]" id="file" type="file" multiple="multiple" style="color: #00a0e9" accept="*/*">
                </td>
            </tr>
            <tr>
                <th>文件介绍：</th>
                <td><textarea name="content" id="content" cols="30" style="width: 50%;" rows="10"></textarea></td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input  value="上传" type="submit" onclick="check()">
                    <input  value="取消" type="submit" onclick="back()">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
<script type="text/javascript">
    function check() {
        if(document.getElementById("file").value!=''){
            document.getElementById("upload_form").action="/zixing/index.php/Home/Personal/handle_uploadFile";
        }else{
            alert("请选择文件");
        }
    }

    function back() {
        document.getElementById("upload_form").action="/zixing/index.php/Home/Personal/welcome";
    }

</script>
</html>