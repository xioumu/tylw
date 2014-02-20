<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>武汉体育学院学位管理系统</title>
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
    <?php include('css.php'); ?>
    <?php include('script.php'); ?>
    <?php include('myfunction.php'); ?>
</head>

<body class="index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class="container-fluid">
    <div class="row-fluid">
        <!-- left menu starts -->
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id="content" class="span10">
            <!-- content starts -->
            <!-- road -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="web-admin-student-manage.php">网站管理员</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="web-admin-student-manage.php">管理学生账号</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="web-admin-add-student.php">导入学生账户</a>
                    </li>
                </ul>
            </div>
            <?php
            function putStuExl($data) {
                echo '
                 <div class="box-content">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>年级</th>
                                <th>学号</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>校内方向</th>
                                <th>类别</th>
                                <th>身份证号</th>
                                <th>导师</th>
                                </thead>';
                foreach ($data as $row) {
                    echo '<tr>';
                    for ($i = 'A'; $i <= 'H'; $i++) {
                        echo '<td>' . $row[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '
                            </table>
                    </div> ';
            }



            if (isset($_FILES["exlFile"])) {
                echo '<div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>添加账号预览</h2>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal" action="loadInfo.php" method="post" >
                    ';

                if ($_FILES["exlFile"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && $_FILES["exlFile"]["size"] < 1024 * 1024 * 1024) {
                    if ($_FILES["exlFile"]["error"] > 0) {
                        echo "Error: " . $_FILES["exlFile"]["error"] . "<br />";
                    }
                    else {
                        $fileInfo = uploadExl($_FILES["exlFile"]["tmp_name"]);
                        $data = getExl($fileInfo['path']);
                        putStuExl($data);
                        echo '
                        <input type="test" name="type" value="stu" style="display: none; ">
                        <input type="test" name="file" style="display: none;" value="' . $fileInfo['name'] . '">';
                        echo '
                        <div class="form-actions">
                                <button type="submit" class="btn btn-success">确认提交</button>
                                <a href="web-admin-student-manage.php" class="btn btn-danger">取消</a>
                        </div> ';
                    }
                }
                else {
                    if ($_FILES["exlFile"]["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") echo "文件格式不对,必须是Excel2007文件<br/>";
                    if ($_FILES["exlFile"]["size"] >= 1024 * 1024 * 1024) echo "文件超过大小限制!";
                }
                echo '
                        </form>
                    </div>
                </div>
                <!--/span-->
            </div>';
            }
            ?>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>导入学生账户</h2>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal" action="web-admin-add-student.php" method="post"
                              enctype="multipart/form-data">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">下载样例EXCEL表格</label>
                                    <div class="controls">
                                        <a href="doc/student.xlsx" target="view_window" class="btn btn-success btn-small">样例表格下载</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">选择表格文件(只支持excel2007文件)</label>
                                    <div class="controls">
                                        <input class="uniform_off" id="fileInput" type="file" name="exlFile">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">提交</button>
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
</html>
