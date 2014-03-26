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
            <!-- content starts -->
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-student-manage.php">管理学生账号</a>
                    </li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>管理学生账号</h2>
                        <div class = "box-icon">
                            <a href = "web-admin-add-student.php" class = "btn btn-primary">导入学生账户</a>
                            <a href = "leadOutPasswd.php?type=stu" class = "btn btn-primary left" target = "view_window">导出学生信息</a>
                            <a href = "leadOutPaper.php" class = "btn btn-primary left" target = "view_window">下载学生全部论文</a>
                            <button type = "submit" class = "btn btn-danger left" onclick="delAllStuUser()">删除全部学生账户</button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>年级</th>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>专业</th>
                                <th>校内方向</th>
                                <th>类别</th>
                                <th>开题报告截止日期</th>
                                <th>论文截止日期</th>
                                <th>状态</th>
                                <th>重复率</th>
                                <th>审评结果</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $allStuUser = getAllUser("stu");
                                foreach ($allStuUser as $user) {
                                    $info = getStuInfo($user);
                                    $allEvaRes = getAllEvaRes($user);
                                    echo "<tr id = \"{$info['studentID']}\">";
                                    echo "<td>" . $info['grade'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['repDeadline'] . "</td>";
                                    echo "<td>" . $info['papDeadline'] . "</td>";
                                    $labelType = "success";
                                    if ($info['status'] == "未上传论文") $labelType = "important";
                                    echo getLabel($info['status'], $labelType);
                                    echo "<td>" . $info['repeatRate'] . "</td>";
                                    echo '<td>';
                                    foreach($allEvaRes as $evaInfo) {
                                        echo  "[" . getEvaInfoC($evaInfo['c11']) . "]";
                                    }
                                    echo '</td>';
                                    echo '
                                    <td>
                                        <a href = "#changeInfo-modal" class = "btn btn-primary " data-toggle = "modal" onclick="changeInfo(\'' . $user . '\')">查看/修改信息</a>
                                        <a href = "#" class = "btn btn-info btn-danger" onclick="delStuUser(\'' . $user . '\')">删除</a>
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
        <h3>修改/查看学生信息</h3>
        <h5>(修改信息后需刷新页面才能看见更新信息)</h5>
    </div>
    <div class = "modal-body table-striped form-horizontal">
        <div class = "">
            <fieldset>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-name">姓名</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "changeInfo-name" type = "text" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-studentID">学号</label>
                    <div class = "controls">
                        <input class = "input-medium disabled" id = "changeInfo-studentID" type = "text" value = ""
                               disabled = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-grade">年级</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-grade" value = "">
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
                    <label class = "control-label" for = "changeInfo-major">专业</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-major" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-subject">校内方向</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-subject" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-type">类别</label>
                    <div class = "controls">
                        <select id = "changeInfo-type" class = "input-medium">
                            <?php
                            $result = mysql_query("SELECT * FROM studenttype");
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value = \"{$row['sid']}\" id = \"{$row['typeName']}\">{$row['typeName']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-tutor">导师</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-tutor" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-IDcard">身份证号</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-IDcard" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label  " for = "changeInfo-status">状态</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-status" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-deadLine">开题报告提交截止日期</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-repDeadline" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-deadLine">论文提交截止日期</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-papDeadline" value = "">
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-paper">论文</label>
                    <div class = "controls">
                        <a href = "" target = "_blank" id = "changeInfo-paper"
                           class = "btn btn-success btn-small">还未上传</a>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-report">开题报告</label>
                    <div class = "controls">
                        <a href = "" target = "_blank" id = "changeInfo-report"
                           class = "btn btn-success btn-small">还未上传</a>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-repeatRate">重复率(百分比)</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium " id = "changeInfo-repeatRate" value = "">
                    </div>
                </div>
                <div class = "well" id = "changeInfo-com1">
                    <h3>评语1</h3>
                    <hr />
                    <p id = "changeInfo-comP1">11</p>
                </div>
                <div class = "well" id = "changeInfo-com2">
                    <h3>评语2</h3>
                    <hr />
                    <p id = "changeInfo-comP2"></p>
                </div>
                <div class = "well" id = "changeInfo-com3">
                    <h3>评语3</h3>
                    <hr />
                    <p id = "changeInfo-comP3"></p>
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
    //切换下载按钮
    function setUploadBtn(btn, info) {
        if (info != null) {
            btn.attr("href", info);
            btn.text("点击下载");
        }
        else {
            btn.attr("href", "");
            btn.text("还未上传");
        }
    }
    //清空modal页面
    function clearPage(page) {
        page.find('#changeInfo-name').val("");
        page.find('#changeInfo-studentID').val("");
        page.find('#changeInfo-grade').val("");
        page.find('#changeInfo-major').val("");
        page.find('#changeInfo-subject').val("");
        page.find('#changeInfo-tutor').val("");
        page.find('#changeInfo-IDcard').val("");
        page.find('#changeInfo-status').val("");
        page.find('#changeInfo-repDeadline').val("");
        page.find('#changeInfo-papDeadline').val("");
        page.find('#changeInfo-repeatRate').val("");
        setUploadBtn(page.find('#changeInfo-paper'), null);
        setUploadBtn(page.find('#changeInfo-report'), null);
        for (var i = 1; i <= 3; i++) {
            page.find('#changeInfo-com' + i).addClass('myInvisible');
        }
    }
    function changeInfo(user) {
        clearPage($('#changeInfo-modal'));
        $.post("getInfo.PHP",
            {
                type: "stu",
                user: user
            },
            function (data, status) {
                if (status == 'success') {
                    var stuInfo = eval("(" + data + ")");
                    var page = $('#changeInfo-modal');
                    page.find('#changeInfo-name').val(stuInfo.sName);
                    page.find('#changeInfo-studentID').val(stuInfo.studentID);
                    page.find('#changeInfo-grade').val(stuInfo.grade);
                    if (stuInfo.sex == '') stuInfo.sex = null;
                    if (stuInfo.type == '') stuInfo.type = null;
                    page.find('#changeInfo-sex').find('#' + stuInfo.sex).attr("selected", "selected");
                    page.find('#changeInfo-type').find('#' + stuInfo.type).attr("selected", "selected");
                    page.find('#changeInfo-major').val(stuInfo.major);
                    page.find('#changeInfo-subject').val(stuInfo.subject);
                    page.find('#changeInfo-tutor').val(stuInfo.tutor);
                    page.find('#changeInfo-IDcard').val(stuInfo.IDcard);
                    page.find('#changeInfo-repDeadline').val(stuInfo.repDeadline);
                    page.find('#changeInfo-papDeadline').val(stuInfo.papDeadline);
                    page.find('#changeInfo-status').val(stuInfo.status);
                    page.find('#changeInfo-repeatRate').val(stuInfo.repeatRate);
                    setUploadBtn(page.find('#changeInfo-paper'), stuInfo.paperAdd);
                    setUploadBtn(page.find('#changeInfo-report'), stuInfo.reportAdd);
                    for (var i in stuInfo.com) {
                        var j = parseInt(i) + 1;
                        page.find('#changeInfo-comP' + j).text(stuInfo.com[i]);
                        if (stuInfo.com[i] != null)page.find('#changeInfo-com' + j).removeClass("myInvisible");
                    }
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
                    type: "stu",
                    sName: page.find('#changeInfo-name').val(),
                    studentID: page.find('#changeInfo-studentID').val(),
                    grade: page.find('#changeInfo-grade').val(),
                    sex: page.find('#changeInfo-sex').val(),
                    sType: page.find('#changeInfo-type').val(),
                    major: page.find('#changeInfo-major').val(),
                    subject: page.find('#changeInfo-subject').val(),
                    tutor: page.find('#changeInfo-tutor').val(),
                    IDcard: page.find('#changeInfo-IDcard').val(),
                    repDeadline: page.find('#changeInfo-repDeadline').val(),
                    papDeadline: page.find('#changeInfo-papDeadline').val(),
                    repeatRate: page.find('#changeInfo-repeatRate').val()
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
    function delAllStuUser() {
        var r = confirm('确认删除全部账号?');
        if (r == true) {
            $.post("delUser.php",
                {
                    type: "web-admin",
                    object: "allStu"
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
</html>
