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
                        <a href = "web-admin-add-eva.php">添加参与评测的学生</a>
                    </li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>添加参与评测的学生</h2>
                        <div class = "box-icon">
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-add-eva-stu.php" method="post">
                            <div class = "control-group">
                                <label class = "control-label" for = "needPercent">需要参与评测的学生百分比</label>
                                <div class = "controls">
                                    <input type = "text" class = "input-medium" id = "needPercent" value = "0"
                                           name = "needPercent">
                                </div>
                            </div>
                            <div class = "form-actions">
                                <button type = "submit" class = "btn btn-primary ">下一步</button>
                            </div>
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
</body>
<script>
</script>
</html>

