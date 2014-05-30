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
        <?php include('out-teacher-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!--    road -->
            <div>
                <ul class = "breadcrumb">
                    <li><a href = "out-teacher-check.php">校外专家</a> <span class = "divider">/</span></li>
                    <li><a href = "out-teacher-check.php">查看论文</a></li>
                </ul>
            </div>
            <?php
            $self = $_SESSION['is_login'];
            $teaInfo = getOutTeaInfo($self);
            $allEva = getAllUserEva($self, "teacherID");
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看论文</h2>
                        <div class = "box-icon">
                            <h3>评审截止时间：<?php echo $teaInfo['TdeadLine']; ?></h3>
                        </div>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>论文名称</th>
                                <th>论文编号</th>
                                <th>学生专业</th>
                                <th>学生校内方向</th>
                                <th>学生类别</th>
                                <th>是否已评</th>
                                <th>操作</th>
                                </thead>
                                <?php
                                foreach ($allEva as $evaID) {
                                    $evaInfo = getEvaInfo($evaID);
                                    $stuInfo = getStuInfo($evaInfo['studentID']);
                                    $statusID = getEvaStatusID($evaID);
                                    $statusName = getEvaStatus($evaID);
                                    echo "<tr>";
                                    echo "<td>{$stuInfo['paperName']}</td>";
                                    echo "<td>{$stuInfo['paperNum']}</td>";
                                    echo "<td>{$stuInfo['major']}</td>";
                                    echo "<td>{$stuInfo['subject']}</td>";
                                    echo "<td>{$stuInfo['type']}</td>";
                                    if ($statusID == 1) echo "<td><span class = \"label label-success\">{$statusName}</span></td>";
                                    else if ($statusID == 2) echo "<td><span class = \"label label-info\">{$statusName}</span></td>";
                                    else if ($statusID == 3) echo "<td><span class = \"label label-important\">{$statusName}</span></td>";
                                    if ($stuInfo['paperAdd'] == null) echo "<td><a href=\"#\" class=\"btn btn-danger disabled\" >学生还未上传论文</a></td>";
                                    else if ($statusID != 3) echo "<td><a href=\"#\" class=\"btn btn-success disabled\" >已经审评完毕</a></td>";
                                    else echo "<td><a href=\"on-teacher-check-info.php?id={$evaID}\" class=\"btn btn-primary\" >审评</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
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
