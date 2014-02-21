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
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-OnTeacher-manage.php">管理校内专家账户</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理校内专家账号</h2>
                        <div class = "box-icon">
                            <a href = "web-admin-add-OnTeachear.php" class = "btn btn-success">导入校内专家账户</a>
                            <a href = "leadOutPasswd.php?type=onTea" class = "btn btn-primary left"
                               target = "view_window">导出校内专家账户密码</a>
                            <button type = "submit" class = "btn btn-danger left" onclick = "delAllUser()">
                                删除全部校内专家账户
                            </button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>工号</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>校内专业</th>
                                <th>研究方向</th>
                                <th>评审截止日期</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $allStuUser = getAllUser("onTea");
                                foreach ($allStuUser as $user) {
                                    $info = getOnTeaInfo($user);
                                    echo "<tr id = \"{$info['teacherID']}\">";
                                    echo "<td>" . $info['teacherID'] . "</td>";
                                    echo "<td>" . $info['tName'] . "</td>";;
                                    echo "<td>" . $info['sex'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['research'] . "</td>";
                                    echo "<td>" . $info['TdeadLine'] . "</td>";
                                    echo '<td><span class = "label label-important">' . $info['status'] . '</span></td>';
                                    echo '
                                    <td>
                                        <a href = "#changeInfo-modal" class = "btn btn-info btn-setting" data-toggle = "modal" onclick="changeInfo(\'' . $user . '\')">查看/修改信息</a>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delUser(\'' . $user . '\')">删除</a>
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

<!-- modal -->
<div class = "modal hide" id = "changeInfo-modal">
    <div class = "modal-header">
        <button type = "button" class = "close" data-dismiss = "modal">×</button>
        <h3>修改/查看校内专家信息</h3>
        <h5>(修改信息后需刷新页面才能看见更新信息)</h5>
    </div>
    <div class = "modal-body table-striped form-horizontal">
        <div class = "">
            <fieldset>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-teacherID">工号</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "changeInfo-teacherID" type = "text" value = ""
                               disabled = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-name">姓名</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "changeInfo-name" type = "text" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label  " for = "changeInfo-sex">性别</label>
                    <div class = "controls">
                        <select id = "changeInfo-sex" class = "input-medium">
                            <option value = "男" id = "男">男</option>
                            <option value = "女" id = "女">女</option>
                        </select>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-subject">校内方向</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-subject" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-research">研究方向</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-research" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-status">状态</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-status" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-deadLine">提交截止日期</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-deadLine" value = "">
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
</body>
<script>
    //清空modal页面
    function clearPage(page) {
        page.find('#changeInfo-name').val("");
        page.find('#changeInfo-teachearID').val("");
        page.find('#changeInfo-subject').val("");
        page.find('#changeInfo-research').val("");
        page.find('#changeInfo-status').val("");
        page.find('#changeInfo-deadLine').val("");
    }
    //变换MODAL页面
    function changeInfo(user) {
        clearPage($('#changeInfo-modal'));
        $.post("getInfo.PHP",
            {
                type: "onTea",
                user: user
            },
            function (data, status) {
                if (status == 'success') {
                    var teaInfo = eval("(" + data + ")");
                    var page = $('#changeInfo-modal');
                    page.find('#changeInfo-name').val(teaInfo.tName);
                    page.find('#changeInfo-teacherID').val(teaInfo.teacherID);
                    page.find('#changeInfo-sex').find('#' + teaInfo.sex).attr("selected", "selected");
                    page.find('#changeInfo-subject').val(teaInfo.subject);
                    page.find('#changeInfo-research').val(teaInfo.research);
                    page.find('#changeInfo-deadLine').val(teaInfo.TdeadLine);
                    page.find('#changeInfo-status').val(teaInfo.status);
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
                    type: "onTea",
                    tName: page.find('#changeInfo-name').val(),
                    teacherID: page.find('#changeInfo-teacherID').val(),
                    sex: page.find('#changeInfo-sex').val(),
                    subject: page.find('#changeInfo-subject').val(),
                    research: page.find('#changeInfo-research').val(),
                    deadLine: page.find('#changeInfo-deadLine').val()
                },
                function (data, status) {
                    if (status == 'success') {
                        if (data == 'ok') {
                            $('#addUser-modal').modal('hide');
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
                    object: "allOnTea"
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
