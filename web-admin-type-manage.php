<!DOCTYPE html>
<?php
include("config.php");
?>
<html lang = "zh">
<head>
    <meta charset = "utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
</head>

<body class = "index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class = "container-fluid">
    <div class = "row-fluid">
        <!-- left menu starts -->
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <ul class = "breadcrumb">
                <li>
                    <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                </li>
                <li>
                    <a href = "web-admin-type-manage.php">管理类别</a>
                </li>
            </ul>
            <?php
                $allType = getAllStuType();
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理类别</h2>
                        <div class = "box-icon">
                            <a href = "#addType-modal" type = "submit" class = "btn btn-primary left" data-toggle = "modal">添加类别</a>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>类别名称</th>
                                <th>类型</th>
                                </thead>
                                <?php
                                    foreach ($allType as $stuType) {
                                        $typeDeg = "博士";
                                        if ($stuType['degree'] == 'mas') $typeDeg = "硕士";
                                        echo "<tr>";
                                        echo "<td>{$stuType['typeName']}</td><td>{$typeDeg}</td>";
                                        //echo "<td><a href = \"#\" type = \"submit\" class = \"btn btn-success left\" onclick=\s"changeInfo(\'{$stuType['sid']}\')\">添加类别</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <!-- content ends -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
</div>
<!--/.fluid-container-->

<!-- box -->
<div class = "modal hide" id = "addType-modal">
    <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal">×</button>
        <h3>添加类别</h3>
    </div>
    <div class = "modal-body table-striped form-horizontal">
        <div class = "">
            <fieldset>
                <div class = "control-group">
                    <label class = "control-label">类别名称</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "addType-name" type = "text" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label  " for = "addType-degree">类别学位</label>
                    <div class = "controls">
                        <select id = "addType-degree" class = "input-medium">
                            <option value = "mas" selected>硕士</option>
                            <option value = "doc">博士</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class = "modal-footer">
            <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
            <button type = "submit" class = "btn btn-primary" onclick="subAddInfo()">保存</button>
        </div>
    </div>
</div>

<div class = "modal hide" id = "changeInfo-modal">
    <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal">×</button>
        <h3>修改类别</h3>
    </div>
    <div class = "modal-body table-striped form-horizontal">
        <div class = "">
            <fieldset>
                <div class = "control-group">
                    <label class = "control-label">类别名称</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "addType-name" type = "text" value = "">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class = "modal-footer">
            <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
            <button type = "submit" class = "btn btn-primary" onclick="subAddInfo()">保存</button>
        </div>
    </div>
</div>
</body>
<script>
    function subAddInfo() {
        var page = $('#addType-modal');
        if (page.find('#addType-name').val() == "") {
            $('.index').noty({"text": "姓名不能为空", "layout": "topLeft", "type": "error"});
        }
        else {
            $.post("stuTypeOperation.php",
                {
                    type: "add",
                    name: page.find('#addType-name').val(),
                    degree: page.find('#addType-degree').val()
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "成功修改信息", "layout": "topLeft", "type": "success"});
                            page.modal('hide');
                            location.reload();
                        }
                        else {
                            $('.index').noty({"text": "error:" + data, "layout": "topLeft", "type": "error"});
                        }
                    }
                    else {
                        $('.index').noty({"text": "js post error0!", "layout": "topLeft", "type": "error"});
                    }
                });
        }
    }
    function changeInfo($sid) {
        var page = $('#addType-modal');
    }
</script>
</html>
