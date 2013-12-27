<!DOCTYPE html>
<?php 
    header("Content-Type: text/html;charset=utf-8");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>武汉体育学院学位管理系统</title>
	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

    <link href='css/my.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="js/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body class="">
	<!-- topbar starts -->
	<?php
		include('header.php');
	?>	
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
			<!-- left menu starts -->
				<?php include('web-admin-left.php');?>	
			<!-- left menu ends -->

            <div id="content" class="span10">
            <!-- content starts -->

            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>查看归档学生信息</h2>
						<div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <th>评审年份</th>
                                        <th>年级</th>
									    <th>姓名</th>	
									    <th>学号</th>	
									    <th>类别</th>	
									    <th>专业</th>	
										<th>提交截止日期</th>
                                        <th>状态</th>
                                        <th>操作</th> 					
                                    </thead>
	                                <tr>
                                        <td>2013</td>
                                        <td>2011</td>
										<td>张三</td>
										<td>123455678</td>
                                        <td>硕士研究生</td>
										<td>竞技体育</td>
										<td>2013/12/27</td>
                                        <td><span class="label label-important">还未提交论文</span></td>
                                        <td>
                                            <a href="#student1" class="btn btn-info btn-info" data-toggle="modal" >查看详细信息</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>2012</td>
										<td>2011</td>
										<td>王五</td>
										<td>12455678</td>
                                        <td>博士研究生</td>
										<td>运动学</td>
										<td>2013/12/29</td>
                                        <td><span class="label label-warning">已提交论文-等待评审</span></td>
                                        <td>
                                            <a href="#student1" class="btn btn-info btn-info" data-toggle="modal" >查看详细信息</a>
                                         </td>
									</tr>
									<tr>
                                        <td>2012</td>
										<td>2011</td>
										<td>王五</td>
										<td>12455678</td>
                                        <td>博士研究生</td>
										<td>运动学</td>
										<td>2013/10/27</td>
                                        <td><span class="label label-success">评审完毕-通过</span></td>
                                        <td>
                                            <a href="#student1" class="btn btn-info btn-info" data-toggle="modal" >查看详细信息</a>
                                         </td>
									</tr>
                                    <tr>
                                        <td>2012</td>
                                        <td>2011</td>
                                        <td>王五</td>
                                        <td>12455678</td>
                                        <td>博士研究生</td>
                                        <td>运动学</td>
                                        <td>2013/10/27</td>
                                        <td><span class="label label-inverse">评审完毕-未通过</span></td>
                                        <td>
                                            <a href="#student1" class="btn btn-info btn-info" data-toggle="modal" >查看详细信息</a>
                                        </td>
                                    </tr>
								</table>
                        </form>
                    </div>
                </div><!--/span-->
            </div><!--/row-->
            <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header well" data-original-title>
                            <h2>查看归档校内专家信息</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form class="form-horizontal">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                    <th>评审年份</th>
                                    <th>姓名</th>
                                    <th>工号</th>
                                    <th>校内专业</th>
                                    <th>研究方向</th>
                                    <th>评审截止日期</th>
                                    </thead>
                                    <tr>
                                        <td>2013</td>
                                        <td>张三</td>
                                        <td>123455678</td>
                                        <td>竞技体育</td>
                                        <td>体育教育训练学</td>
                                        <td>2013/12/27</td>
                                    </tr>
                                    <tr>
                                        <td>2013</td>
                                        <td>王五</td>
                                        <td>12455678</td>
                                        <td>运动学</td>
                                        <td>高级运动学</td>
                                        <td>2013/12/29</td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
            <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header well" data-original-title>
                            <h2>查看归档校外专家信息</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form class="form-horizontal">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                    <th>评审年份</th>
                                    <th>账号</th>
                                    <th>评审截止日期</th>
                                    </thead>
                                    <tr>
                                        <td>2013</td>
                                        <td>teacher1</td>
                                        <td>2013/12/27</td>
                                    </tr>
                                    <tr>
                                        <td>2012</td>
                                        <td>teacher2</td>
                                        <td>2013/12/29</td>
                                    </tr>
                                </table>
                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>查看归档评审信息</h2>
                        <div class="box-icon">
                            <button href="#myBox1" class="btn btn-info btn-success" data-toggle="modal" >添加评审</button>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th>评审年份</th>
                                <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>专业</th>
                                <th>评审专家账号</th>
                                <th>评审专家姓名</th>
                                <th>评审专家类别</th>
                                <th>状态</th>
                                </thead>
                                <tr>
                                    <td>2013</td>
                                    <td>2011302580362</td>
                                    <td>张三</td>
                                    <td>竞技体育教学</td>
                                    <td>87872123</td>
                                    <td>郭德纲</td>
                                    <td>校内专家</td>
                                    <td><span class="label label-important">还未评审</span></td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>2011302580362</td>
                                    <td>王五</td>
                                    <td>竞技体育教学</td>
                                    <td>87872123</td>
                                    <td></td>
                                    <td>校外专家</td>
                                    <td><span class="label label-success">已经评审-建议立即授予学位</span></td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>2011302580362</td>
                                    <td>张三</td>
                                    <td>竞技体育教学</td>
                                    <td>87872123</td>
                                    <td>大玩家</td>
                                    <td>校内专家</td>
                                    <td><span class="label label-warning">已经评审-建议论文修改后授予学位</span></td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>2011302580362</td>
                                    <td>张三</td>
                                    <td>竞技体育教学</td>
                                    <td>87872123</td>
                                    <td>郭富城</td>
                                    <td>校内专家</td>
                                    <td><span class="label label-inverse">已经评审-建议不授予学位</span></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div><!--/span-->

            </div><!--/row-->
            <!-- content ends -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->
        </div>
        </div>
		
	</div><!--/.fluid-container-->

	<!-- box -->
	<div class="modal hide fade" id="student1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>查看学生信息</h3>
		</div>
		<div class="modal-body table-striped form-horizontal">
            <div class="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">姓名</label>
                        <div class="controls">
                            <input class="input-medium disabled" id="name" type="text" value="张三" disabled="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">学号</label>
                        <div class="controls">
                            <input class="input-medium disabled" id="stdentID" type="text" value="12345678" disabled="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="grade">年级</label>
                        <div class="controls">
                            <input class="input-medium" type="text" id="grade" value="2011级" disabled>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label  " for="sex">性别</label>
                        <div class="controls">
                            <select id="sex" class="input-medium" disabled>
                                <option>男</option>
                                <option>女</option>
                                <option>未知</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="type">类别</label>
                        <div class="controls">
                            <select id="type" class="input-medium" disabled>
                                <option>硕士研究生</option>
                                <option>博士研究生</option>
                                <option>体育研究生</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="subject">专业</label>
                        <div class="controls">
                            <input class="input-medium" type="text" id="subject" value="足球" disabled>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">提交截止日期</label>
                        <div class="controls">
                            <input type="text" class="input-medium datepicker" id="date01" value="12/27/13" disabled>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label  " for="state">状态</label>
                        <div class="controls">
                            <select id="state" class="input-xlarge" disabled>
                                <option>还未提交论文</option>
                                <option>已提交论文-等待评审</option>
                                <option>评审完毕-通过</option>
                                <option>评审完毕-未通过</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group controls">
                        <button type="submit" class="btn btn-primary">下载论文</button>
                    </div>
                </fieldset>
		    </div>
            <div class="modal-footer">
			    <a href="#" class="btn" data-dismiss="modal">关闭</a>
		    </div>
	</div>

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
</body>
</html>
