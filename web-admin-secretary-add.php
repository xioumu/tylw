<!DOCTYPE html>
<?php
include("config.php");
?>
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
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <div id = "content" class = "span10">
            <!-- content starts -->
            <!-- road -->
            <div>
                <ul class = "breadcrumb">
                    <li><a href = "web-admin-student-manage.php">网站管理员</a> <span class = "divider">/</span></li>
                    <li><a href = "web-admin-secretary-manage.php">管理教学秘书账号</a> <span class = "divider">/</span></li>
                    <li><a href = "web-admin-secretary-add.php">添加教学秘书</a></li>
                </ul>
            </div>
            <?php
            //显示左上角信息框
            function topLeftInfo($info, $type) {
                echo "<script> $('.index').noty({\"text\": {$info}, \"layout\": \"topLeft\", \"type\": {$type});</script>";
            }

            //添加秘书账号
            function addSecInfo($user, $major) {
                if (mysql_query("INSERT INTO secretary (userID, major) VALUES ('{$user}', '{$major}')")) {
                    return true;
                }
                return false;
            }

            if (!empty($_POST['major']) && !empty($_POST['id'])) {
                $passwd = getRand();
                if (!addUser($_POST['id'], $passwd, 'sec')) {
                    echo "add sec user error!";
                }
                else if (!addSecInfo($_POST['id'], $_POST['major'])) {
                    echo "add secInfo error!";
                }
                else {
                    goBack("添加成功", "web-admin-secretary-manage.php");
                }
                die(mysql_error());
            }
            ?>

            <div class = "row-fluid sortable">
                <?php
                $otherInfo = getOtherInfo();
                $user = $otherInfo['lastSecUser'];
                $user++;
                if (!mysql_query("UPDATE other SET lastSecUser = '{$user}'")) {
                    //die(mysql_error());
                }
                $user = 's' . $user;
                ?>
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>添加教学秘书</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-secretary-add.php" method = "post">
                            <input class = "input-xlarge" type = "text" id = "user" name = "id" style = "display:none"
                                   value = "<?php echo $user ?>">
                            <div class = "control-group">
                                <label class = "control-label" for = "major">专业</label>
                                <div class = "controls">
                                    <input class = "input-xlarge" type = "text" id = "major" name = "major" value = "" >
                                </div>
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
</html>
