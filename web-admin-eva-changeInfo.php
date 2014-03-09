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
                        <a href = "student-info.php">学生</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-eva-manage.php">管理审评信息</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-eva-changeInfo.php">修改评审信息</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>修改评审信息</h2>
                    </div>
                    <?php
                    if (!isset($_GET['id'])) {
                        echo "no post!";
                        exit;
                    }
                    $evaInfo = getEvaInfo($_GET['id']);
                    $allStu = getAllUser('stu');
                    $allOnTea = getAllUser('onTea');
                    $allOutTea = getAllUser('outTea');
                    ?>
                    <div class = "box-content form-horizontal">
                        <fieldset>
                            <form action = "changeInfo.php" method = "post">
                                <div class = "">
                                    <fieldset>
                                        <div class = "control-group">
                                            <label class = "control-label" for = "student">学生学号</label>
                                            <div class = "controls">
                                                <select data-placeholder = "学生学号" id="student" data-rel="chosen" name =
                                                                                 "studentID">
                                                <optgroup label = "学生">
                                                    <?php
                                                    foreach ($allStu as $stuUser) {
                                                        $stuInfo = getStuInfo($stuUser);
                                                        if ($stuUser != $evaInfo['studentID']) echo "<option value=\"{$stuUser}\">{$stuUser}({$stuInfo['sName']})</option>";
                                                        else  echo "<option value=\"{$stuUser}\" selected>{$stuUser}({$stuInfo['sName']})</option>";
                                                    }
                                                    ?>
                                                </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "control-group">
                                            <label class = "control-label" for = "teacher">专家账号</label>
                                            <div class = "controls">
                                                <select data-placeholder = "专家账号" id="teacher" data-rel="chosen" name =
                                                                                 "teacherID">
                                                <optgroup label = "校内专家">
                                                    <?php
                                                    foreach ($allOnTea as $teaUser) {
                                                        $teaInfo = getOnTeaInfo($teaUser);
                                                        if ($teaUser != $evaInfo['teacherID']) echo "<option value=\"{$teaUser}\">{$teaUser}({$teaInfo['tName']})</option>";
                                                        else  echo "<option value=\"{$teaUser} selected \">{$teaUser}({$teaInfo['tName']})</option>";
                                                    }
                                                    ?>
                                                </optgroup>
                                                <optgroup label = "校外专家">
                                                    <?php
                                                    foreach ($allOutTea as $teaUser) {
                                                        if ($teaUser != $evaInfo['teacherID']) echo "<option value=\"{$teaUser}\">{$teaUser}</option>";
                                                        else  echo "<option value=\"{$teaUser}\" selected >{$teaUser}</option>";
                                                    }
                                                    ?>
                                                </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <input type = "text" name = "eid" value = "<?php echo $_GET['id'] ?>"
                                               style = "display: none;">
                                        <input type = "text" name = "type" value = "eva" style = "display: none;">
                                        <input type = "text" name = "role" value = "web-admin" style = "display: none;">
                                    </fieldset>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-primary">保存</button>
                                </div>
                            </form>
                        </fieldset>
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

</div><!--/.fluid-container-->
</body>
</html>
