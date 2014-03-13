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
            <?php
            if (!empty($_POST['reportDate'])) {
                $deadLine = changeData($_POST['reportDate']);
                if (!mysql_query("UPDATE student SET repDeadline = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置开题报告截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置开题报告截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
            }
            if (!empty($_POST['paperDate'])) {
                $deadLine = changeData($_POST['paperDate']);
                if (!mysql_query("UPDATE student SET papDeadline= '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置论文截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置论文报告截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
            }
            if (!empty($_POST['teacherDate'])){
                $deadLine = changeData($_POST['teacherDate']);
                if (!mysql_query("UPDATE teacheronside SET TdeadLine = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置校内专家截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置校内专家截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
                if (!mysql_query("UPDATE teacheroutside SET TdeadLine = '{$deadLine}'")) {
                    echo ' <script>$(\'.index\').noty({"text": "设置校外专家截止日期错误", "layout": "topLeft", "type": "error"});</script>';
                }
                else {
                    echo '<script>$(\'.index\').noty({"text": "设置校外专家截止日期成功", "layout": "topLeft", "type": "success"});</script>';
                }
            }
            ?>
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-eva-manage.php">设置截止日期</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>设置截止日期</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-deadline.php" method = "post">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date03">提交开题报告截止日期</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium datepicker" id = "date03"
                                               name = "reportDate" value = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date01">提交论文截止日期</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium datepicker" id = "date01"
                                               name = "paperDate" value = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date02">专家评审截止日期</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium datepicker" id = "date02"
                                               name = "teacherDate" value = "">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-primary ">保存</button>
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
