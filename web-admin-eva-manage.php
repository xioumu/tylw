<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
?>
<html lang = "en">
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
            <!-- content starts -->
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-admin-eva-manage.php">管理审评信息</a>
                    </li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理学生账号</h2>
                        <div class = "box-icon">
                            <button type = "submit" class = "btn btn-danger left" onclick = "delAllEva()">删除全部评审信息
                            </button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>校内方向</th>
                                <th>类别</th>
                                <th>专家账号</th>
                                <th>专家姓名</th>
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
                                    echo "<td>" . $info['Ssubject'] . "</td>";
                                    echo "<td>" . $info['Stype'] . "</td>";
                                    echo "<td>" . $info['teacherID'] . "</td>";
                                    echo "<td>" . $info['tName'] . "</td>";
                                    echo '<td><span class = "label label-important">' . $info['status'] . '</span></td>';
                                    echo '
                                    <td>
                                        <a href = "web-admin-eva-changeInfo.php?id='. $eid .'" class = "btn btn-info">修改</a>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delEva(\'' . $eid . '\')">删除</a>
                                    </td> ';
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

