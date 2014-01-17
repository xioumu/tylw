<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
if (isset($_POST['username']) or isset($_POST['passwd']) or isset($_POST['yzm']) or isset($_SESSION['is_login'])) {
    if (isset($_POST['username']) or isset($_POST['passwd']) or isset($_POST['yzm'])) {
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $yzm = $_POST['yzm'];
        if ($yzm != $_POST['Checknum']) {
            $rep_note = "验证码错误";
        }
        else if(!loginCheck($username, $passwd)){
            $rep_notw = "用户名或密码错误";
        }
        else {
            $_SESSION['is_login'] = true;
        }
        if ($_SESSION['is_login']) {
            $type = getType($username);
            if ($type === "stu") echo "<script>window.location.href='student-info.php';</script>";
            else if ($type === "sys") echo "<script>window.location.href='web-admin-student-manage.php'</script>";
            else if ($type === "sec") echo "<script>window.location.href='sys-admin-manage.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
					<h2 class="head" >武汉体育学院学位管理系统</h2>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info color">
						    请输入用户名和密码
                    </div>
					<form class="form-horizontal" action="login.php" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="用户名" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" placeholder="密码" />
							</div>
							<div class="clearfix"></div>
                            <div class="input-prepend" data-rel="tooltip">
                               <input class="input-large span3" name="yzm" id="yzm" type="test" placeholder="验证码" />
                               <img src="verification/showimg.php">
                                <a> 换一张</a>
                            </div>
                            <div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">登陆</button>
							</p>
                            <div class="input-prepend">
                                <label class="remember" for="remember"><input type="checkbox" id="remember" />记住密码</label>
                            </div>
                            <div class="clearfix"></div>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
	</div><!--/.fluid-container-->
    <?php include('script.php'); ?>	
</body>
</html>
