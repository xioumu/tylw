<?php
header("Content-Type: text/html;charset=utf-8");
include("config.php");
$session_stunum = '';
$session_name = '';
if (isset($_SESSION['is_login'])){
	$session_stunum = $_SESSION['is_login'];
	$session_name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible"content="IE=9"/>
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/ico" href="favicon.ico" />

		<title>芙蓉学子投票网站</title>

		<!-- Bootstrap core CSS -->
		<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
		<link href="http://lib.sinaapp.com/js/bootstrap/3.0.0/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/offcanvas.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<link href="css/ie9.css" rel="stylesheet">
		  <script src="js/html5shiv.js"></script>
		  <script src="js/respond.min.js"></script>
		<![endif]-->
		<!--[if lt IE 8]>
			<link href="css/ie9.css" rel="stylesheet">
		<![endif]-->
	</head>

  <body data-spy="scroll" data-target="#top-nav" data-offset="300">
    <div id="top-nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-collapse collapse bs-js-navbar-scrollspy">
          <ul class="nav navbar-nav">
			<?php
				$result = mysql_query("SELECT * FROM frxz_type ORDER BY ord");
				$i = 1;
				while($row = mysql_fetch_array($result)){
					echo "<li><a href='#type-name-$i'>{$row['name']}</a></li>";
				$i++;
				}
			?>
          </ul>
          <form class="navbar-form navbar-right loginbar" style="display: <?php if($session_stunum != '') echo "none;"?>">
            <div class="form-group fl">
              <input id="studentnumber" type="text" value="您的学号" style="width: 130px;" class="form-control" onclick="check_sn()" onblur="check_sn_b()"/>
            </div>
            <div class="form-group fl">
				<input id="tx" type="text" class="form-control"  style="width: 130px;"  value="身份证号后6位" />
				<input id="password" type="password" class="form-control" style="display:none;width: 130px;" />
            </div>
            <button id="login-button" type="button" class="btn btn-success fl h34" onclick="login()">登录</button>
          </form>
		  <div class="navbar-right logoutbar" style="display: <?php if($session_stunum == '') echo "none;"?>;">
			<p>欢迎您: <span id="user-name"><?=$session_name?></span>　　<button id="logout-button" type="button" class="btn btn-danger h34" onclick="logout()">注销</button></p>
		  </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 ">
			<img src="http://ww3.sinaimg.cn/large/74b1cdb9gw1eaus4xsvdcj20ww07xwhk.jpg" style="width:1000px;margin-left: -15px;"><br /><br />
			<div class="jumbotron">
				<div style="width:880px;margin: 0px auto;"><p style="font-size: 16px;">投票说明：右上角为登陆窗口，学号加上身份证号后6位即可登陆（即为my.whu.edu.cn的密码），登陆后请给您支持的选手进行投票，点击标题栏左上方可直接跳转至对应奖项进行投票，每人可以给一个奖项的一个团体或个人进行投票，点击投票即可生效。杜绝刷票，如有查实，取消该候选人评选资格。本次投票结果将作为评选重要参考，不计入最终评选总分。</p></div>
			</div>
		<div>
			<?php
			$result = mysql_query("SELECT * FROM frxz_type ORDER BY ord");
			while($row = mysql_fetch_array($result)){
				$output = '';
				$type = $row['id'];
				$num = $row['ord'];
				$disabled = "";
				if (isset($_SESSION['is_login'])){
					$result2 = mysql_query("SELECT * FROM frxz_vote WHERE type = '$type' AND studentnumber = '$session_stunum'");
					if ($row2 = mysql_fetch_array($result2))
						$disabled = "disabled";
				}
				$typename = $row['name'];
				$output .= "<br /><h2 id='type-name-{$num}' class='typename'>—— 　<span>$typename</span>　 ——</h2><div class='row type-{$type}'>";
				$result2 = mysql_query("SELECT * FROM frxz_player WHERE type = '$type' ORDER BY ord");
				$count = mysql_num_rows($result2); 
				$addclass = '';
				if ($count == 5 || $count == 10){
					$addclass = "ml25";
				}
				else if ($count == 4 || $count == 8 || $count == 9){
					$addclass = "ml65";
				}
				$i = 1;
				while($row2 = mysql_fetch_array($result2)){
                    $addid = "fs13";
					if ($count == 9){
						if ($i < 5) 
							$addclass = "ml65";
						else
							$addclass = "ml25";
					}
					$limit_height = 'h35';
					$name_area = 'h33';
					if (($row2['id'] == 15) OR ($row2['id'] == 24)){
						$limit_height = 'h15';
						$name_area = 'h53';
					}
					$output .="
					<div class='col-6 col-sm-6 col-lg-4 person well {$addclass}' id='player-{$row2['id']}'>
					<img class='player' src='{$row2['pic']}'  data-toggle='modal' onclick='change({$row2['id']})' href='#more'>
                    <div class='{$name_area}'>
						<h2 id='$addid'class='playername'>{$row2['name']}</h2>
                    </div>
					<p class='intro {$limit_height} tac'>{$row2['line1']}<br />{$row2['line2']}</p>
					<p class='intro2' style='display: none;'>{$row2['intro']}</p>
					<p><div class='player_button'><a class='btn btn-xs btn-info info' data-toggle='modal' onclick='change({$row2['id']})' href='#more' >详细资料</a></div>
					<div class='player_button'><a class='btn btn-xs btn-primary vote $disabled' onclick='vote({$row2['id']})'>投票({$row2['votesum']})</a></div>
					</p>
					</div>";
					$i++;
				}
				$output .= "</div>";
				echo $output;
			}
		  ?>
        </div><!--/span-->
		</div>
	<!-- 选项Modal -->
	<div class="modal fade" id="more" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width:700px;padding-top: 130px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3><span id="player-name"></span>的详细信息</h3>
				</div>
				<div class="modal-body">
					<div class="pic-area">
						<img src="test.jpg" class="more-player">
					</div>
					<div class="text-area">
						<p></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="option-cancel" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" id="option-submit" class="btn btn-primary">投票</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
		</div><!--/row-->
		<hr>
		<footer>
			<p>Powered by <a href="http://www.edward67.com/" target="_blank">Dc-Edward67</a></p>
		</footer>
    </div><!--/.container-->
    <script src="js/jquery.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
	<script src="http://lib.sinaapp.com/js/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="js/offcanvas.js"></script>
	<script src="js/script.js"></script>
		<!-- TOP快捷按钮 -->
	<script type="text/javascript"> 
	$(function(){
		$(window).scroll(function(){
			var top=$(window).scrollTop();
			if(top > 100){
				$("#scrolltop").fadeIn();
			}else{
				$("#scrolltop").fadeOut();
			}
		});
		$("#scrolltop").click(function(){
		$("html,body").animate({scrollTop:0});
		});
	});
	</script>
	<div id="scrolltop"></div><!-- End TOP快捷按钮 -->
	<div id="cnzz" style="display: none;">
		<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5712218'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s9.cnzz.com/stat.php%3Fid%3D5712218%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
	</div>
	</body>
</html>
