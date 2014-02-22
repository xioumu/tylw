<!DOCTYPE html>
<?php header("Content-Type: text/html;charset=utf-8"); ?>
<?php include("config.php"); ?>
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
        <?php include('on-teacher-left.php'); ?>
        <!-- left menu ends -->

        <div id = "content" class = "span10">
            <!--    road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "on-teacher-info.php">校内专家</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "on-teacher-info.php">查看个人信息</a>
                    </li>
                </ul>
            </div>
            <?php
            $self = $_SESSION['is_login'];
            $info = getOnTeaInfo($self);
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>个人信息</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">姓名</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "name" type = "text"
                                               value = "<?php echo $info['tName']; ?>" disabled>
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label">工号</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" type = "text"
                                               value = "<?php echo $info['teacherID'] ?>" disabled = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label">性别</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" type = "text"
                                               value = "<?php echo $info['sex'] ?>" disabled = "">
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
                                    <label class = "control-label" for = "research">研究方向</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge" type = "text" id = "research" disabled
                                               value = "<?php echo $info['research'] ?>">
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
        <!--/fluid-row-->
    </div>
</div>
<!--/.fluid-container-->
</body>
</html>
