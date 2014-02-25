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
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <?php

        if (isset($_POST['masRepeatRate']) && $_POST['masRepeatRate'] != "") {
            if (!mysql_query("UPDATE other SET masRepeatRate = '{$_POST['masRepeatRate']}'")) {
                echo ' <script>$(\'.index\').noty({"text": "设置硕士合格重复率失败", "layout": "topLeft", "type": "error"});</script>';
            }
            else {
                echo '<script>$(\'.index\').noty({"text": "设置硕士合格重复率成功", "layout": "topLeft", "type": "success"});</script>';
            }
        }
        if (isset($_POST['docRepeatRate']) && $_POST['docRepeatRate'] != "") {
            if (!mysql_query("UPDATE other SET docRepeatRate = '{$_POST['docRepeatRate']}'")) {
                echo ' <script>$(\'.index\').noty({"text": "设置博士合格重复率失败", "layout": "topLeft", "type": "error"});</script>';
            }
            else {
                echo '<script>$(\'.index\').noty({"text": "设置博士格重复率成功", "layout": "topLeft", "type": "success"});</script>';
            }
        }
        $otherInfo = getOtherInfo();
        ?>
        <div id = "content" class = "span10">

            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>设置合格重复率</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-set-repeatRate.php" method = "post">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date01">硕士合格重复率(百分比)</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium"
                                               name = "masRepeatRate"
                                               value = "<?php echo $otherInfo['masRepeatRate'] ?>">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "date01">博士合格重复率(百分比)</label>
                                    <div class = "controls">
                                        <input type = "text" class = "input-medium"
                                               name = "docRepeatRate"
                                               value = "<?php echo $otherInfo['docRepeatRate'] ?>">
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