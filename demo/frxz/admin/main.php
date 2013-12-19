<?php
header("Content-Type: text/html;charset=utf-8");
include("../config.php");
if (isset($_POST['email']) or isset($_SESSION['is_admin'])){
	if (isset($_POST['email'])){
		if ((filter($_POST['email']) == 'admin') and (filter($_POST['password'] == '312986151')))
			$_SESSION['is_admin'] = true;
		else
			echo" <script>window.location.href='index.html';</script>";
	}
}
else
	echo" <script>window.location.href='index.html';</script>";
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
	<p class="tac" ><a href="logout.php">注销</a></p>
    <div class="container">
	<table class="table table-hover">
		<tr><th>候选人id</th><th>候选人姓名</th><th>类别</th><th>得票数</th><th>查看详细投票</th></tr>
			<?php
				for ($i = 1; $i < 8; $i++)
					$type[$i] = 0;
				$result = mysql_query("SELECT * FROM frxz_player ORDER BY votesum DESC");
				while($row = mysql_fetch_array($result)){
					$typename = '';
					$success = '';
					if ($type[$row['type']] < 2)
						$success = "success";
					$type[$row['type']]++;
					$result2 = mysql_query("SELECT * FROM frxz_type WHERE id = '{$row['type']}'");
					if ($row2 = mysql_fetch_array($result2))
						$typename = $row2['name'];
					echo "<tr class='$success'><td>{$row['id']}</td><td>{$row['name']}</td><td>$typename</td><td>{$row['votesum']}</td><td><a href='voteinfo.php?id={$row['id']}'>查看</a></td></tr>";
				}
			?>
	</table>
    </div>
  </body>
</html>