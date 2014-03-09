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
    <?php judgeUser(array("stu")); ?>
</head>

<body class="index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class = "container-fluid">
    <div class = "row-fluid">
        <!-- left menu starts -->
        <?php include('student-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "student-info.php">学生</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-finish-info-select.php">查看个人信息</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>个人信息</h2>
                    </div>
                    <?php
                    $self = $_SESSION['is_login'];
                    $info = getStuInfo($self);
                    ?>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">姓名</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "sName" type = "text"
                                               value = "<?php echo $info['sName'] ?>" disabled>
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label">学号</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "stdentID" type = "text"
                                               value = "<?php echo $info['studentID'] ?>" disabled>
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "grade">年级</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "grade" disabled
                                               value = "<?php echo $info['grade'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label  " for = "sex">性别</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "sex" disabled
                                               value = "<?php echo $info['sex'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "subject">专业</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "subject" disabled
                                               value = "<?php echo $info['major'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "subject">校内方向</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "subject" disabled
                                               value = "<?php echo $info['subject'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "type">类别</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "type" disabled
                                               value = "<?php echo $info['type'] ?>">
                                    </div>
                                </div>

                                <div class = "control-group">
                                    <label class = "control-label" for = "tutor">导师</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "tutor" disabled
                                               value = "<?php echo $info['tutor'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "IDcard">身份证号</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "IDcard" disabled
                                               value = "<?php echo $info['IDcard'] ?>">
                                    </div>
                                </div>
                            </fieldset>
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
</html>
