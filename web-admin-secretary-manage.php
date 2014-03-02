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
                        <a href = "web-admin-student-manage.php">管理教学秘书账号</a>
                    </li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理教学秘书</h2>
                        <div class = "box-icon">
                            <a href = "web-admin-secretary-add.php" class = "btn btn-success">添加账号</a>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>账号</th>
                                <th>密码</th>
                                <th>专业</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                function getSecInfo($user) {
                                    $res = array();
                                    $result = mysql_query("SELECT * FROM secretary WHERE userID = '{$user}'");
                                    if ($row = mysql_fetch_array($result)) {
                                        $res = $row;
                                    }
                                    return $res;
                                }
                                $allSecUser = getAllUserPasswd("sec");
                                foreach ($allSecUser as $user) {
                                    $info = getSecInfo($user['user']);
                                    echo "<tr id = \"{$info['userID']}\">";
                                    echo "<td>" . $info['userID'] . "</td>";
                                    echo "<td>" . $user['passwd'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo '
                                    <td>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delStuUser(\'' . $user['user'] . '\')">删除</a>
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
<script>
    function delStuUser(user) {
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
</script>
</html>