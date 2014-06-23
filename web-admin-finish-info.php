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
                        <a href = "web-admin-finish-info-select.php">查看归档数据</a>
                    </li>
                </ul>
            </div>
            <?php
            if (empty($_GET['judgeInfo'])) {
                exit;
            }
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看归档学生信息</h2>
                        <div class = "box-icon">
                            <a type = "submit" class = "btn btn-danger" onclick = "delAllRecStuUser()">删除此次档案全部信息</a>
                            <a href = "#" class = "btn btn-minimize btn-round"><i class = "icon-chevron-up"></i></a>
                            <a href = "#" class = "btn btn-close btn-round"><i class = "icon-remove"></i></a>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>归档信息</th>
                                <th>年级</th>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>性别</th>
                                <th>专业</th>
                                <th>类别</th>
                                <th>校内方向</th>
                                <th>身份证</th>
                                <th>导师</th>
                                <th>论文名</th>
                                <th>论文编号</th>
                                <th>重复率</th>
                                <th>最终状态</th>
                                <th>文件</th>
                                </thead>
                                <?php
                                $allStuInfo = getAllRecStuInfo($_GET['judgeInfo']);
                                foreach ($allStuInfo as $info) {
                                    if ($info['reportAdd'] == '') {
                                        $info['reportAdd'] = "#";
                                    }
                                    if ($info['paperAdd'] == '') {
                                        $info['paperAdd'] = "#";
                                    }
                                    echo "<tr id = \"{$info['judgeYear']}{$info['studentID']}\">";
                                    echo "<td>" . $info['judgeYear'] . "</td>";
                                    echo "<td>" . $info['grade'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['sex'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['IDcard'] . "</td>";
                                    echo "<td>" . $info['tutor'] . "</td>";
                                    echo "<td>" . $info['paperNum'] . "</td>";
                                    echo "<td>" . $info['paperName'] . "</td>";
                                    echo "<td>" . $info['repeatRate'] . "</td>";
                                    $labelType = "success";
                                    if ($info['status'] == "未上传论文") $labelType = "important";
                                    echo getLabel($info['status'], $labelType);
                                    $pepSta = $repSta = "";
                                    if ($info['reportAdd'] == "#") $repSta = 'disabled';
                                    if ($info['paperAdd'] == "#") $pepSta = 'disabled';
                                    echo '
                                    <td>
                                        <a href = "' . $info['reportAdd'] . '" target = "_blank" class = "btn btn-primary btn-small"' . $repSta . '>开题报告</a>
                                        <a href = "' . $info['paperAdd'] . '" target = "_blank"  class = "btn btn-primary btn-small"' . $pepSta . '>论文</a>
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
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看归档审评信息</h2>
                        <div class = "box-icon">
                            <a href = "#" class = "btn btn-minimize btn-round"><i class = "icon-chevron-up"></i></a>
                            <a href = "#" class = "btn btn-close btn-round"><i class = "icon-remove"></i></a>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>归档信息</th>
                                <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>专业</th>
                                <th>校内方向</th>
                                <th>类别</th>
                                <th>导师</th>
                                <th>专家账号</th>
                                <th>专家姓名</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <?php

                                $allStuInfo = getAllRecEvaInfo($_GET['judgeInfo']);
                                foreach ($allStuInfo as $info) {
                                    echo "<tr id = \"{$info['judgeYear']}{$info['eid']}\">";
                                    echo "<td>" . $info['judgeYear'] . "</td>";
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['tutor'] . "</td>";
                                    echo "<td>" . $info['teacherID'] . "</td>";
                                    echo "<td>" . $info['tName'] . "</td>";
                                    $btnType = "";
                                    $labelType = "success";
                                    $eidUrl = "web-admin-view-rec-eva?id=" . $info['eid'];
                                    if ($info['status'] == "还未审评") {
                                        $labelType = "important";
                                        $btnType = "disabled";
                                        $eidUrl = '#';
                                    }
                                    echo getLabel($info['status'], $labelType);
                                    echo "<td>";
                                    if ($info['status'] != "还未审评") echo "
                                            <a href = \"web-admin-view-rec-eva.php?id={$info['eid']}&judgeInfo={$info['judgeYear']}\" class = \"btn btn-primary\">查看细节</a>
                                            <a href = \"print-eva.php?id={$info['eid']}&judgeInfo={$info['judgeYear']}\" class = \"btn btn-primary\" target='_blank'>打印</a>
                                    ";
                                    else echo "
                                            <a href = \"#\" class = \"btn btn-primary \" disabled>还未审评</a>
                                    ";
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
<!-- modal-->
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
        page.find('#changeInfo-subject').val("");
        page.find('#changeInfo-tutor').val("");
        page.find('#changeInfo-IDcard').val("");
        page.find('#changeInfo-status').val("");
        page.find('#changeInfo-judgeDate').val("");
        page.find('#changeInfo-repeatRate').val("");
        setUploadBtn(page.find('#changeInfo-paper'), null);
        setUploadBtn(page.find('#changeInfo-report'), null);
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
                    page.find('#changeInfo-sex').find('#' + stuInfo.sex).attr("selected", "selected");
                    page.find('#changeInfo-type').find('#' + stuInfo.type).attr("selected", "selected");
                    page.find('#changeInfo-subject').val(stuInfo.subject);
                    page.find('#changeInfo-tutor').val(stuInfo.tutor);
                    page.find('#changeInfo-IDcard').val(stuInfo.IDcard);
                    page.find('#changeInfo-deadLine').val(stuInfo.SdeadLine);
                    page.find('#changeInfo-status').val(stuInfo.status);
                    page.find('#changeInfo-repeatRate').val(stuInfo.repeatRate);
                    setUploadBtn(page.find('#changeInfo-paper'), stuInfo.paperAdd);
                    setUploadBtn(page.find('#changeInfo-report'), stuInfo.reportAdd);
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
                    subject: page.find('#changeInfo-subject').val(),
                    tutor: page.find('#changeInfo-tutor').val(),
                    IDcard: page.find('#changeInfo-IDcard').val(),
                    deadLine: page.find('#changeInfo-deadLine').val(),
                    repeatRate: page.find('#changeInfo-repeatRate').val()
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
    function delStuUser(user) {
        var r = confirm('确认删除账号"' + user + '"?');
        if (r == true) {
            $.post("delRecUser.php",
                {
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
    function delAllRecStuUser() {
        var r = confirm('确认删除此次审评信息?');
        if (r == true) {
            $.post("delRecUser.php",
                {
                    type: "web-admin",
                    object: "<?php echo $_GET['judgeInfo'];?>"
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