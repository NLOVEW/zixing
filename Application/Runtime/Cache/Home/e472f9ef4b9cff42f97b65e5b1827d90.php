<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Bootstrap/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/templatemo_style.css" />
</head>
<body class="bg-image" style="background-image:url('/Public/Images/admin.jpg')">

<h1 class="green">资源浏览</h1>
<div class="container center-block templatemo-form-list-container templatemo-container lead">
    <div class="col-md-12 table-responsive">
        <form class="form-inline" style="margin-bottom: 5px" method="post" action="/index.php/Home/Resource/search">
            <div class="form-group">
                <label class="sr-only" for="search">请输入关键字</label>
                <input type="text" class="form-control" name="key" id="search" placeholder="请输入关键字" style="width: 350px;height: 40px">
            </div>
            <button type="submit" class="btn btn-info" style="width: 80px;height: 40px;font-size: 20px">检索</button>
        </form>
        <table class="table table-bordered table-hover"  style="border-color: #00a0e9;text-align: center">
            <thead>
            <tr class="info">
                <th style="text-align: center;" title="点击排序">文件编号</th>
                <th style="text-align: center" title="点击排序">文件名称</th>
                <th style="text-align: center" title="点击排序">所属课程</th>
                <th style="text-align: center" title="点击排序">文件类型</th>
                <th style="text-align: center" title="点击排序">文件大小</th>
                <th style="text-align: center">在线浏览</th>
                <th style="text-align: center">下载</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($allData)): $i = 0; $__LIST__ = $allData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr class="warning">
                    <td><?php echo ($data["r_id"]); ?></td>
                    <td><?php echo ($data["r_name"]); ?></td>
                    <td><?php echo ($data["r_course"]); ?></td>
                    <td><?php echo ($data["r_type"]); ?></td>
                    <td><?php echo ($data["r_size"]); ?></td>
                    <td>
                        <?php switch($data["r_type"]): case "Doc": ?><form action="/index.php/Home/ResourceManager/lookWord" method="post">
                                    <input type="hidden" name="path" value="<?php echo ($data["r_name"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                                    <button type="submit" style="background: transparent;border: none">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </form><?php break;?>
                            <?php case "Pdf": ?><form action="/index.php/Home/ResourceManager/lookPdf" method="post">
                                    <input type="hidden" name="path" value="/Public/<?php echo ($data["r_address"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                                    <button type="submit" style="background: transparent;border: none">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </form><?php break;?>
                            <?php case "PPT": ?><form action="/index.php/Home/ResourceManager/lookPpt" method="post">
                                    <input type="hidden" name="path" value="<?php echo ($data["r_name"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                                    <button type="submit" style="background: transparent;border: none">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </form><?php break;?>
                            <?php case "Execl": ?><form action="/index.php/Home/ResourceManager/lookExecl" method="post">
                                    <input type="hidden" name="path" value="<?php echo ($data["r_name"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                                    <button type="submit" style="background: transparent;border: none">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </form><?php break;?>
                            <?php case "Video": ?><form action="/index.php/Home/ResourceManager/lookVideo" method="post">
                                    <input type="hidden" name="path" value="<?php echo ($data["r_address"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                                    <button type="submit" style="background: transparent;border: none">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </form><?php break;?>
                            <?php default: ?>无法在线浏览<?php endswitch;?>

                    </td>
                    <td>
                        <form action="/index.php/Home/ResourceManager/download" method="post">
                            <input type="hidden" name="path" value="<?php echo ($data["r_address"]); ?>-><?php echo ($data["r_id"]); ?>-><?php echo ($data["r_name"]); ?>">
                            <button type="submit" style="background: transparent;border: none">
                                <span class="glyphicon glyphicon-download"></span>
                            </button>
                        </form>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <p style="text-align: center;color: #9724ff;"><?php echo ($page); ?></p>
    </div>
</div>
</body>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {
        $('.table').dataTable({
            "bPaginate": false, //翻页功能
            "bLengthChange": false, //改变每页显示数据数量
            "bFilter": false, //过滤功能
            "bSort": true, //排序功能
            "bInfo": false,//页脚信息
            "bAutoWidth": false,//自动宽度
        });
    });

</script>
</html>