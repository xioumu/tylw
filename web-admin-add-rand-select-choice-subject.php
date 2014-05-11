<!DOCTYPE html>
<?php
include("config.php");
?>
<html lang = "zh" xmlns = "http://www.w3.org/1999/html">
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
                    <li><a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span></li>
                    <li><a href = "web-admin-OnTeacher-manage.php">管理校内专家账户</a><span class = "divider">/</span></li>
                    <li><a href = "web-admin-add-rand-select-choice-subject.php">随机抽取校内专家审评</a></li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>选择抽选的专业</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-add-rand-select-choice.php" method = "get">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label" for = "subject">校内专家专业</label>
                                    <div class = "controls">
                                        <select data-placeholder = "校内专家专业" id = "subject" data-rel = "chosen"
                                                name = "subject">
                                            <?php
                                            echo '<option value="all">全部</option>';
                                            $allSubject = getAllSubject("onTea");
                                            foreach ($allSubject as $subject) {
                                                echo "<option value=\"{$subject}\">{$subject}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
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
    //    var choiceNum = 0;
    $('.stuCheckbox').click(function () {
        if (this.checked) {
            var id = this.value;
            $("#inVisibleCheckbox_" + id).attr("checked", true);
        } else {
            var id = this.value;
            $("#inVisibleCheckbox_" + id).attr("checked", false);
        }
        //   $('#assignSum').text(choiceNum);
    });
    $('#checkBoxAllTure').click(function () {
        $("input[name='visibleChoiceStu[]']").each(function () {
            $(this).parent().addClass("checked");
            var id = this.value;
            $("#inVisibleCheckbox_" + id).attr("checked", true);
        });
    })
    $('#checkBoxAllFalse').click(function () {
        $("input[name='visibleChoiceStu[]']").each(function () {
            $(this).parent().removeClass("checked");
            var id = this.value;
            $("#inVisibleCheckbox_" + id).attr("checked", false);
        });
    })
</script>
</html>
