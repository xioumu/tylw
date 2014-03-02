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
        <div id = "content" class = "span10">
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "web-admin-student-manage.php">网络管理员</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "web-admin-finish-info-select.php">查看归档数据</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>选择要查看的归档信息</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-finish-info.php" method = "get">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="select">要查看的归档信息</label>
                                    <div class="controls">
                                        <select id = "select" name="judgeInfo">
                                            <option value = 'all' selected>全部</option>
                                            <?php
                                                $que = mysql_query("SELECT DISTINCT judgeYear FROM record_student") or die("Error in query:  ".mysql_error());
                                                $allJudYear = array();
                                                while ($row = mysql_fetch_array($que)) {
                                                    array_push($allJudYear, $row['judgeYear']);
                                                }
                                                foreach($allJudYear as $judYear) {
                                                    echo "<option value ='{$judYear}'>{$judYear}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-primary ">提交</button>
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
