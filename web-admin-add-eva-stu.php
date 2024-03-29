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
                    <li><a href = "web-admin-eva-manage.php">管理审评信息</a> <span class = "divider">/</span></li>
                    <li><a href = "web-admin-add-eva-stu.php">选择指定学生参与审评</a></li>
                </ul>
            </div>
            <?php
            $allUser = getAllFreeUser("stu");
            $sum = intval($_POST['needPercent']);
            if ($sum < 0 || $sum > 100) {
                goBack("输入的数字必须是0~100之间，请重新输入", "web-admin-add-eva.php");
            }
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>指定学生必须参与审评<h3>(请勾选指定学生)</h3></h2>
                        <div class = "box-icon">
                            <button id = "checkBoxAllTure" class = "btn btn-primary left">全选</button>
                            <button id = "checkBoxAllFalse" class = "btn btn-primary left">全不选</button>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal"
                              action = "addEva.php?type=mul&needPercent=<?php echo $_POST['needPercent'] ?>"
                              method = "post">
                            <table id = "stuChoiceTable"
                                   class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th></th>
                                <th>年级</th>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>专业</th>
                                <th>类别</th>
                                <th>校内方向</th>
                                <th>导师</th>
                                </thead>
                                <?php
                                foreach ($allUser as $user) {
                                    $info = getStuInfo($user);
                                    echo "<tr id = \"{$info['studentID']}\">";
                                    echo "<td><input class=\"stuCheckbox\" type=\"checkbox\" name=\"visibleChoiceStu[]\" value=\"{$user}\" /> </td>";
                                    echo "<td>" . $info['grade'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['major'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['tutor'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <!--<h4>一共将添加<?php  //echo $_POST['needNum']; ?>位学生参与评测，您已指定<span id = "assignSum">0</span>位，剩下的将随机抽选。</h4>
                            -->
                            <div class = "myInvisible">
                                <?php
                                foreach ($allUser as $user) {
                                    echo "<input id = \"inVisibleCheckbox_{$user}\" type=\"checkbox\" name=\"choiceStu[]\" value=\"{$user}\" />";
                                }
                                ?>
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

