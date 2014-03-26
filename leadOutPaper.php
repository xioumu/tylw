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
                        <a href = "web-admin-student-manage.php">管理学生账号</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-student-manage.php">下载全部论文</a>
                    </li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>下载全部论文</h2>
                    </div>
                    <div class = "box-content">
                        <?php
                        $falg = false;
                        $allUser = getAlluser('stu');
                        foreach ($allUser as $user) {
                            $stuInfo = getStuInfo($user);
                            if ($stuInfo['paperAdd'] != "") {
                                $PHP_SELF = $_SERVER['PHP_SELF'];
                                $url = 'http://' . $_SERVER['HTTP_HOST'] . substr($PHP_SELF, 0, strrpos($PHP_SELF, '/') + 1); //获取网站地址
                                $url .= '/' . $stuInfo['paperAdd'];
                                echo $url . "<br/>";
                                $flag = true;
                            }
                        }
                        if (!$flag) {
                            echo "还没有学生上传论文!<br/>";
                        }
                        ?>
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
                        <input type = "text" class = "input-medium datepicker" id = "changeInfo-status" value = ""
                               disabled>
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
                    <hr/>
                    <p id = "changeInfo-comP1">11</p>
                </div>
                <div class = "well" id = "changeInfo-com2">
                    <h3>评语2</h3>
                    <hr/>
                    <p id = "changeInfo-comP2"></p>
                </div>
                <div class = "well" id = "changeInfo-com3">
                    <h3>评语3</h3>
                    <hr/>
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
</html>
