<?php
header("Content-Type: text/html;charset=utf-8");
include("../config.php");
if (! isset($_SESSION['is_admin'])){
	echo "<script>window.location.href='index.html';</script>";
}
$pid = filter($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../favicon.png">
    <title>后台管理</title>
    <link href="http://lib.sinaapp.com/js/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<p class="tac" ><a href="main.php">返回</a></p>
    <div class="container">
	<table class="table table-hover">
		<tr><th>id</th><th>候选人id</th><th>候选人姓名</th><th>投票人学号</th><th>投票人姓名</th><th>投票人ip</th><th>时间</th></tr>
			<?php
				$result = mysql_query("SELECT * FROM frxz_vote WHERE pid = '$pid' ORDER BY time DESC");
				while($row = mysql_fetch_array($result)){
					echo "<tr><td>{$row['id']}</td><td>{$row['pid']}</td><td>{$row['pname']}</td><td>{$row['studentnumber']}</td><td>{$row['uname']}</td><td>{$row['ip']}</td><td>{$row['time']}</td></tr>";
				}
			?>
	</table>
    </div>
  </body>
</html>