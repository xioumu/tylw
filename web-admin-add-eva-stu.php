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
                        <a href = "web-admin-setEvalutingInfo.php">管理学生账号</a>
                    </li>
                </ul>
            </div>
            <?php
                $allUser = getAllFreeUser("stu");
                $sum = intval($_POST['needNum']);
                if ($sum <= 0 || $sum > count($allUser)) {
                    goBack("输入的数字超过最大人数，或者是负数，请重新输入", "web-admin-add-eva.php");
                }
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>指定学生必须参与评测</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "addEva.php?type=mul&needNum=<?php echo $_POST['needNum'] ?>" method="post">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>请勾选指定学生</th>
                                <th>年级</th>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>类别</th>
                                <th>校内方向</th>
                                <th>导师</th>
                                </thead>
                                <?php

                                foreach ($allUser as $user) {
                                    $info = getStuInfo($user);
                                    echo "<tr id = \"{$info['studentID']}\">";
                                    echo "<td><input class=\"stuCheckbox\" type=\"checkbox\" name=\"choiceStu[]\" value=\"{$user}\" /> </td>";
                                    echo "<td>" . $info['grade'] . "</td>";
                                    echo "<td>" . $info['sName'] . "</td>";;
                                    echo "<td>" . $info['studentID'] . "</td>";
                                    echo "<td>" . $info['type'] . "</td>";
                                    echo "<td>" . $info['subject'] . "</td>";
                                    echo "<td>" . $info['tutor'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <h4>一共将添加<?php echo $_POST['needNum'] ?>位学生参与评测，您已指定<span id = "assignSum">0</span>位，剩下的将随机抽选。</h4>
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
    var choiceNum = 0;
    $('.stuCheckbox').click(function(){
        if(this.checked){
            choiceNum++;
        }else{
            choiceNum--;
        }
        $('#assignSum').text(choiceNum);
    });
</script>
</html>

