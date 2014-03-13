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
        <?php include('secretary-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!-- content starts -->
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li><a href = "secretary-view-student.php">教学秘书</a> <span class = "divider">/</span></li>
                    <li><a href = "secretary-view-student.php">查看本专业学生信息</a></li>
                </ul>
            </div>
            <?php
                $self = $_SESSION['is_login'];
                $secInfo = getSecInfo($self);
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看本专业学生信息</h2>
                        <div class = "box-icon">
                            <h2>本账户专业为：<?php echo $secInfo['major']; ?></h2>
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
                                <th>论文重复率</th>
                                <th>状态</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                $allStuUser = getAllUser("stu");
                                foreach ($allStuUser as $user) {
                                    $info = getStuInfo($user);
                                    if ($info['major'] != $secInfo['major']) continue;
                                    echo "<tr id = \"{$info['studentID']}\">";
                                    echo "<td>" . $info['grade'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['repDeadline'] . "</td>";
                                    echo "<td>" . $info['papDeadline'] . "</td>";
                                    echo "<td>" . $info['repeatRate'] . "</td>";
                                    $labelType = "success";
                                    if ($info['status'] == "未上传论文") $labelType = "important";
                                    echo getLabel($info['status'], $labelType);
                                    echo '
                                    <td>
                                        <a href = "#changeInfo-modal" class = "btn btn-primary" data-toggle = "modal" onclick="changeInfo(\'' . $user . '\')">查看信息</a>
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
        <h3>查看学生信息</h3>
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
                        <input class = "input-medium" type = "text" id = "changeInfo-grade" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label  " for = "changeInfo-sex">性别</label>
                    <div class = "controls">
                        <select id = "changeInfo-sex" class = "input-medium" disabled>
                            <option value = "男" id = "男">男</option>
                            <option value = "女" id = "女">女</option>
                        </select>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-major">专业</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-major" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-subject">校内方向</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-subject" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-type">类别</label>
                    <div class = "controls">
                        <select id = "changeInfo-type" class = "input-medium" disabled>
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
                        <input class = "input-medium" type = "text" id = "changeInfo-tutor" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-IDcard">身份证号</label>
                    <div class = "controls">
                        <input class = "input-medium" type = "text" id = "changeInfo-IDcard" value = "" disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label  " for = "changeInfo-status">状态</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-status" value = ""
                               disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-deadLine">开题报告提交截止日期</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-repDeadline" value = ""
                               disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-deadLine">论文提交截止日期</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-papDeadline" value = ""
                               disabled>
                    </div>
                </div>
                <div class = "control-group">
                    <label class = "control-label" for = "changeInfo-repeatRate">论文重复率(百分比)</label>
                    <div class = "controls">
                        <input type = "text" class = "input-medium " id = "changeInfo-repeatRate" value = "" disabled>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class = "modal-footer">
        <a href = "#" class = "btn" data-dismiss = "modal">关闭</a>
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
                    page.find('#changeInfo-major').val(stuInfo.major);
                    page.find('#changeInfo-subject').val(stuInfo.subject);
                    page.find('#changeInfo-tutor').val(stuInfo.tutor);
                    page.find('#changeInfo-IDcard').val(stuInfo.IDcard);
                    page.find('#changeInfo-repDeadline').val(stuInfo.repDeadline);
                    page.find('#changeInfo-papDeadline').val(stuInfo.papDeadline);
                    page.find('#changeInfo-status').val(stuInfo.status);
                    page.find('#changeInfo-repeatRate').val(stuInfo.repeatRate);
                }
                else {
                    $('.index').noty({"text": "js post error0!", "layout": "topLeft", "type": "error"});
                }
            });
    }
</script>
</html>