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
<?php
include('header.php');
?>
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
                    <li> <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span> </li>
                    <li> <a href = "web-admin-student-manage.php">管理校外专家账户</a> </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理校外专家账号</h2>
                        <div class = "box-icon">
                            <a href = "leadOutPasswd.php?type=outTea" class = "btn btn-primary left" target = "view_window">导出校外专家信息</a>
                            <button type = "submit" class = "btn btn-danger left" onclick = "delAllUser()">
                                删除全部校外专家账户
                            </button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>账号</th>
                                <th>密码</th>
                                <th>专业</th>
                                <th>论文名</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $allUser = getAllUserPasswd("outTea");
                                foreach ($allUser as $user) {
                                    $status = getTeaStatus($user['user']);
                                    $evaID = getAllUserEva($user['user'], "teacherID");
                                    $type = "";
                                    $subject = "";
                                    $major = "";
                                    $paperName = "";
                                    if (isset($evaID[0])) {
                                        $evaInfo = getEvaInfo($evaID[0]);
                                        $stuInfo = getStuInfo($evaInfo['studentID']);
                                        $major = $stuInfo['major'];
                                        $paperName = $stuInfo['paperName'];
                                        $type = $stuInfo['type'];
                                        $subject = $stuInfo['subject'];
                                    }
                                    echo "<tr id = \"{$user['user']}\">";
                                    echo "<td>" . $user['user'] . "</td>";
                                    echo "<td>" . $user['passwd'] . "</td>";
                                    echo "<td>" . $major . "</td>";
                                    echo "<td>" . $paperName. "</td>";
                                    $labelType = "success";
                                    if ($status == "还未评审完毕") $labelType = "important";
                                    echo getLabel($status, $labelType);
                                    echo '
                                    <td>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delUser(\'' . $user['user'] . '\')">删除</a>
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
<!--/.fluid-container-->
</body>
<script>
    function delUser(user) {
        var r = confirm('确认删除账号"' + user + '"?');
        if (r == true) {
            $.post("delUser.php",
                {
                    type: "web-admin",
                    user: user
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "删除成功", "layout": "topLeft", "type": "success"});
                            $('#' + user).remove();
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
    function delAllUser() {
        var r = confirm('确认删除全部账号?');
        if (r == true) {
            $.post("delUser.php",
                {
                    type: "web-admin",
                    object: "allOutTea"
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
                        $('.index').noty({"text": "js post error0!'", "layout": "topLeft", "type": "error"});
                    }
                }
            )
        }
    }
</script>
</body >
</html>

