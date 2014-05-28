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
                <ul class="breadcrumb">
                    <li>
                        <a href="web-admin-student-manage.php">网站管理员</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="web-admin-downloadBackup.php">备份文件下载</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>备份下载</h2>
                    </div>
                    <div class = "box-content">
                        <a href="leadOutPaper.php?type=backup" class ="btn btn-primary"">备份下载</a>
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
