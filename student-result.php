<!DOCTYPE html>
<?php header("Content-Type: text/html;charset=utf-8");
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
        <?php include('student-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "student-info.php">学生</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "student-result.php">查看结果</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <?php
            $self = $_SESSION['is_login'];
            $info = getStuInfo($self);
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看结果</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">评审结果</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "name" type = "text"
                                               value = "<?php echo $info['status']; ?>"
                                               disabled = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label">论文重复率(百分比)</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "name" type = "text"
                                               value = "<?php echo $info['repeatRate']; ?>"
                                               disabled = "">
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
                <div class = "row-fluid sortable">
                    <div class = "box span12">
                        <div class = "box-header well" data-original-title>
                            <h2>审评细节</h2>
                        </div>
                        <div class = "box-content">
                            <form class = "form-horizontal">
                                <table class = "table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                    <th>状态</th>
                                    <th>细节</th>
                                    </thead>
                                    <?php
                                    $allEva = getAllUserEva($self, "studentID");
                                    foreach ($allEva as $eid) {
                                        $status = getEvaStatus($eid);
                                        echo "<tr>";
                                        $labelType = "success";
                                        if ($status == "还未审评") $labelType = "important";
                                        echo getLabel($status, $labelType);
                                        if ($status != "还未审评") echo " <td>
                                            <a href = \"student-view-eva.php?id={$eid}\" class = \"btn btn-primary\">查看细节</a>
                                        </td> ";
                                        else echo " <td>
                                            <a href = \"#\" class = \"btn btn-primary \" disabled>还未审评</a>
                                        </td> ";
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
