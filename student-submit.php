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
        <?php include('student-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "student-info.php">学生</a> <span class = "divider">/</span>
                    </li>
                    <li>
                        <a href = "student-submit.php">提交论文/开题报告</a>
                    </li>
                </ul>
            </div>
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'ture') {
                    echo ' <script>
                            $(\'.index\').noty({"text": "上传成功", "layout": "topLeft", "type": "success"});
                            </script> ';
                }
                else if ($_GET['status'] == 'error4') {
                    echo '<script>
                           $(\'.index\').noty({"text": "未选择文件", "layout": "topLeft", "type": "error"}); </script>';
                }
            }
            $self = $_SESSION['is_login'];
            $info = getStuInfo($self);
            ?>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>提交开题报告</h2>
                    </div>
                    <div class = "box-content form-horizontal">
                        <form action = "upLoadPaper.php?type=report" method = "post" enctype = "multipart/form-data">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">提交截止时间:</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" type = "text"
                                               value = "<?php echo $info['repDeadline'] ?>" disabled = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "report">提交开题报告:</label>
                                    <div class = "controls">
                                        <input class = "uniform_off" id = "report" type = "file" name = "paperFile">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-success">上传开题报告</button>
                                    <?php
                                    if ($info['reportAdd'] != null) echo "<a type = \"submit\" class = \"btn btn-primary\" href=\"{$info['reportAdd']}\">下载最后提交的开题报告</a> ";
                                    ?>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!--/span-->
            </div>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>提交论文</h2>
                    </div>
                    <div class = "box-content form-horizontal">
                        <form action = "upLoadPaper.php?type=paper" method = "post" enctype = "multipart/form-data">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">提交截止时间:</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" type = "text" value = "<?php echo $info['papDeadline'] ?>" disabled = "">
                                    </div>
                                </div>
                                <div class = "control-group">
                                    <label class = "control-label" for = "paper">提交论文:</label>
                                    <div class = "controls">
                                        <input class = "uniform_off" id = "paper" type = "file" name = "paperFile">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <lable class = "control-label" for = "paperName">论文题目</lable>
                                    <div class = "controls">
                                        <input class = "input-xlarge" id = "paperName" type = "text" name = "paperName" value="<?php echo $info['paperName']?>">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <?php
                                    if ($info['reportAdd'] != null) {
                                        echo '<button type = "submit" class = "btn btn-success" >上传论文</button > ';
                                    }
                                    else {
                                        echo '<a href="#" class="btn btn-danger" data-rel="popover" data-content="需要先上传开题报告" disabled >上传论文</a> ';
                                    }
                                    if ($info['paperAdd'] != null) echo "<a type = \"submit\" class = \"btn btn-primary\" href=\"{$info['paperAdd']}\">下载最后提交的论文</a>";
                                    ?>
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

</div><!--/.fluid-container-->
</body>
</html>
