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
            <?php
            $allUser = getAllFreeUser("stu");
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>添加参与评测的学生(还剩未参加评测的学生一共<?php echo count($allUser); ?>人)</h2>
                        <div class = "box-icon">
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-add-eva-stu.php" method="post">
                            <div class = "control-group">
                                <label class = "control-label" for = "needNum">需要参与评测的学生数</label>
                                <div class = "controls">
                                    <input type = "text" class = "input-medium" id = "needNum" value = "0"
                                           name = "needNum">
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

