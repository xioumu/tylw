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
                    <li><a href = "web-admin-add-rand-select-choice.php">随机抽取校内专家审评</a></li>
                </ul>
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>指定校内专家不参与审评<h3>(请勾选指定校内专家)</h3></h2>
                        <div class = "box-icon">
                            <button id = "checkBoxAllTure" class = "btn btn-primary left">全选</button>
                            <button id = "checkBoxAllFalse" class = "btn btn-primary left">全不选</button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-add-rand-select.php" method = "post">
                            <table id = "stuChoiceTable" class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th></th>
                                <th>工号</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>校内专业</th>
                                <th>校内方向</th>
                                </thead>
                                <?php
                                $allUser = getAllUser("onTea");
                                foreach ($allUser as $user) {
                                    $info = getOnTeaInfo($user);
                                    echo "<tr id = \"{$info['teacherID']}\">";
                                    echo "<td><input class=\"stuCheckbox\" type=\"checkbox\" name=\"visibleChoiceStu[]\" value=\"{$user}\" /> </td>";
                                    echo "<td>" . $info['teacherID'] . "</td>";
                                    echo "<td>" . $info['tName'] . "</td>";;
                                    echo "<td>" . $info['sex'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['research'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <div class = "myInvisible">
                                <?php
                                foreach ($allUser as $user) {
                                    echo "<input id = \"inVisibleCheckbox_{$user}\" type=\"checkbox\" name=\"choiceStu[]\" value=\"{$user}\" />";
                                }
                                ?>
                            </div>
                            <div class = "form-actions">
                                <button type = "submit" class = "btn btn-primary ">提交</button>
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
