<?php
include("config.php");
include("myFunction.php");
if (isset($_POST['username']) or isset($_POST['passwd']) or isset($_POST['yzm'])) {
    $_SESSION['is_login'] = $_POST['username']; 
    if (isset($_SESSION['is_login'])) {
        $type = getUserType($_SESSION['is_login']);
        if ($type === "stu") echo "<script>window.location.href='student-info.php';</script>";
        else if ($type === "sys") echo "<script>window.location.href='sys-admin-manage.php'</script>";
        else if ($type === "web") echo "<script>window.location.href='web-admin-student-manage.php';</script>";
        else if ($type === "onTea") echo "<script>window.location.href='on-teacher-info.php';</script>";
        else if ($type === "outTea") echo "<script>window.location.href='out-teacher-check.php';</script>";
        else if ($type === "sec") echo "<script>window.location.href='secretary-view-student.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>
</head>

<body background="img/bg_index_new.png">
<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-fluid">
            <div class="span12 center login-header">
                <h2 class="head">武汉体育学院学位管理系统</h2>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row-fluid">
            <div class="well span5 center login-box">
                <div class="alert alert-info color">
                    请输入用户名和密码
                </div>
                <form class="form-horizontal" action="testLogin.php" method="post">
                    <fieldset>
                        <div class="input-prepend" title="Username" data-rel="tooltip">
                            <span class="add-on"><i class="icon-user"></i></span><input autofocus
                                                                                        class="input-large span10"
                                                                                        name="username" id="username"
                                                                                        type="text" placeholder="用户名"/>
                        </div>
                        <div class="clearfix"></div>

                        <p class="center span5">
                            <button type="submit" class="btn btn-primary">登陆</button>
                        </p>
                        <?php
                        if (isset($rep_note)) {
                            echo '<div class="alert alert-error">' . $rep_note . '</div>';
                        }
                        ?>
                        <div class="clearfix"></div>
                    </fieldset>
                </form>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
    </div>
    <!--/fluid-row-->
</div>
<!--/.fluid-container-->
<?php include('script.php'); ?>
</body>
</html>
