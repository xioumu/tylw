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
                            <a href = "web-admin-secretary-add.php" class = "btn btn-primary">添加账号</a>
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

                                $allSecUser = getAllUserPasswd("sec");
                                foreach ($allSecUser as $user) {
                                    $info = getSecInfo($user['user']);
                                    echo "<tr id = \"{$info['userID']}\">";
                                    echo "<td>" . $info['userID'] . "</td>";
                                    echo "<td>" . $user['passwd'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo '
                                    <td>
                                        <a href = "#changeInfo-modal" class = "btn btn-primary btn-setting" data-toggle = "modal" onclick="changeInfo(\'' . $user['user'] . '\')">查看/修改信息</a>
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
<!-- modal-->
<div class = " modal hide" id = "changeInfo-modal">
    <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal">×</button>
        <h3>修改/查看教学秘书信息</h3>
    </div>
    <div class = "modal-body table-striped form-horizontal">
        <div class = "">
            <fieldset>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-user">账号</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "changeInfo-user" type = "text" value = ""
                               disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-major">专业</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-major" value = "">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class = "modal-footer">
        <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
        <a class = "btn btn-primary" onclick = "subChangeInfo()">保存</a>
    </div>
</div>
<script>
    //清空modal页面
    function clearPage(page) {
        page.find('#changeInfo-user').val("");
        page.find('#changeInfo-major').val("");
    }
    function changeInfo(user) {
        clearPage($('#changeInfo-modal'));
        $.post("getInfo.PHP",
            {
                type: "sec",
                user: user
            },
            function (data, status) {
                if (status == 'success') {
                    var stuInfo = eval("(" + data + ")");
                    var page = $('#changeInfo-modal');
                    page.find('#changeInfo-user').val(user);
                    page.find('#changeInfo-major').val(stuInfo.major);
                }
                else {
                    $('.index').noty({"text": "js post error0!", "layout": "topLeft", "type": "error"});
                }
            });
    }
    function subChangeInfo() {
        var page = $('#changeInfo-modal');
        if (page.find('#changeInfo-name').val() == "") {
            $('.index').noty({"text": "姓名不能为空", "layout": "topLeft", "type": "error"});
        }
        else {
            $.post("changeInfo.php",
                {
                    role: "web-admin",
                    type: "sec",
                    user: page.find('#changeInfo-user').val(),
                    major: page.find('#changeInfo-major').val()
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('.index').noty({"text": "成功修改信息,需刷新页面才能看见更新信息", "layout": "topLeft", "type": "success"});
                            page.modal('hide');
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