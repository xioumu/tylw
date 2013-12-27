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
                        <h2>管理当前评审信息</h2>
                        <div class="box-icon">
                            <button href="#myBox1" class="btn btn-info btn-success" data-toggle="modal" >添加评审</button>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <th>学生学号</th>
									    <th>学生姓名</th>
                                        <th>专业</th>
									    <th>评审专家账号</th>
                                        <th>评审专家姓名</th>
									    <th>评审专家类别</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </thead>
	                                <tr>
                                        <td>2011302580362</td>
										<td>张三</td>
                                        <td>竞技体育教学</td>
										<td>87872123</td>
                                        <td>郭德纲</td>
                                        <td>校内专家</td>
                                        <td><span class="label label-important">还未评审</span></td>
                                        <td>
                                            <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal" >修改</a>
											<a href="" class="btn btn-info btn-danger">删除</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>2011302580362</td>
                                        <td>王五</td>
                                        <td>竞技体育教学</td>
                                        <td>87872123</td>
                                        <td></td>
                                        <td>校外专家</td>
                                        <td><span class="label label-success">已经评审-建议立即授予学位</span></td>
                                        <td>
                                            <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal" >修改</a>
                                            <a href="" class="btn btn-info btn-danger">删除</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2011302580362</td>
                                        <td>张三</td>
                                        <td>竞技体育教学</td>
                                        <td>87872123</td>
                                        <td>大玩家</td>
                                        <td>校内专家</td>
                                        <td><span class="label label-warning">已经评审-建议论文修改后授予学位</span></td>
                                        <td>
                                            <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal" >修改</a>
                                            <a href="" class="btn btn-info btn-danger">删除</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2011302580362</td>
                                        <td>张三</td>
                                        <td>竞技体育教学</td>
                                        <td>87872123</td>
                                        <td>郭富城</td>
                                        <td>校内专家</td>
                                        <td><span class="label label-inverse">已经评审-建议不授予学位</span></td>
                                        <td>
                                            <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal" >修改</a>
                                            <a href="" class="btn btn-info btn-danger">删除</a>
                                        </td>
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
	<div class="modal hide fade" id="myBox1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>修改评审信息</h3>
		</div>
		<div class="modal-body table-striped form-horizontal">
            <div class="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="student">学生学号</label>
                        <div class="controls">
                            <select data-placeholder="学生学号"" id="student" data-rel="chosen">
                                <option value=""></option>
                                <optgroup label="学生">
                                    <option>123456789(张三)</option>
                                    <option>88787822787(王五)</option>
                                    <option>12341231(赵楼)</option>
                                    <option>123232112(郭德纲)</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="teacher">专家账号</label>
                        <div class="controls">
                            <select data-placeholder="专家账号"" id="teacher" data-rel="chosen">
                            <option value=""></option>
                                <optgroup label="校内专家">
                                    <option>123456789(张三)</option>
                                    <option>88787822787(王五)</option>
                                    <option>12341231(赵楼)</option>
                                    <option>123232112(郭德纲)</option>
                                </optgroup>
                                <optgroup label="校外专家">
                                    <option>teachear1</option>
                                    <option>teachear2</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label  " for="state">状态</label>
                        <div class="controls">
                            <select id="state" class="input-medium" disabled>
                                <option>还未评审</option>
                                <option>已经评审-建议立即授予学位</option>
                                <option>已经评审-建议论文修改后授予学位</option>
                                <option>已经评审-建议不授予学位</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
		    </div>
            <div class="modal-footer">
			    <a href="#" class="btn" data-dismiss="modal">关闭</a>
			    <button type="submit" class="btn btn-primary">保存</button>
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
