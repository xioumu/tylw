<!DOCTYPE html>
<?php include("config.php"); ?>
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
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-eva-manage.php">管理审评信息</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理审评信息</h2>
                        <div class = "box-icon">
                            <a href = "web-admin-add-one-eva.php" class = "btn btn-primary">添加审评</a>
                            <button type = "submit" class = "btn btn-danger left" onclick = "delAllEva()">删除全部审评信息 </button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>专业</th>
                                <th>校内方向</th>
                                <th>类别</th>
                                <th>专家账号</th>
                                <th>专家姓名</th>
                                <th>评审人</th>
                                <th>工作单位</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $allEvaID = getAllEva();
                                foreach ($allEvaID as $eid) {
                                    $info = getEvaInfo($eid);
                                    echo "<tr id = \"{$eid}\">";
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['Smajor'] . "</td>";;
                                    echo "<td>" . $info['Ssubject'] . "</td>";
                                    echo "<td>" . $info['Stype'] . "</td>";
                                    echo "<td>" . $info['teacherID'] . "</td>";
                                    echo "<td>" . $info['tName'] . "</td>";
                                    echo "<td>" . $info['t1'] . "</td>";
                                    echo "<td>" . $info['t4'] . "</td>";
                                    $labelType = "success";
                                    if ($info['status'] == "还未审评") $labelType = "important";
                                    echo getLabel($info['status'], $labelType);
                                    echo "<td>";
                                    if ($info['status'] != "还未审评") echo "
                                            <a href = \"web-admin-view-eva.php?id={$eid}\" class = \"btn btn-primary\">查看细节</a>
                                    ";
                                    else echo "
                                            <a href = \"#\" class = \"btn btn-primary \" disabled>还未审评</a>
                                    ";
                                    echo '
                                        <a href = "web-admin-eva-changeInfo.php?id='. $eid .'" class = "btn btn-primary">修改</a>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delEva(\'' . $eid . '\')">删除</a>';
                                    echo "</td>";
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
</body>
<script>
    function delEva(eid) {
        var r = confirm('确认删除这条评审?');
        if (r == true) {
            $.post("delEva.php",
                {
                    type: "web-admin",
                    user: eid
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "删除成功", "layout": "topLeft", "type": "success"});
                            $('#' + eid).remove();
                        }
                        else {
                            $('.index').noty({"text": "error:" + data, "layout": "topLeft", "type": "error"});
                        }
                    }
                    else {
                        $('.index').noty({"text": "js post error0!'", "layout": "topLeft", "type": "error"});
                    }
                }
            )
        }
    }
    function delAllEva() {
        var r = confirm('确认删除全部账号?');
        if (r == true) {
            $.post("delEva.php",
                {
                    type: "web-admin",
                    object: "allEva"
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "删除成功", "layout": "topLeft", "type": "success"});
                            location.reload();
                        }
                        else {
                            $('.index').noty({"text": "error:" + data, "layout": "topLeft", "type": "error"});
                        }
                    }
                    else {
                        $('.index').noty({"text": "js post error0!", "layout": "topLeft", "type": "error"});
                    }
                }
            )
        }
    }
</script>
</html>

