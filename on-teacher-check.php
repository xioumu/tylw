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

<body>
	<!-- topbar starts -->
	<?php
		include('header.php');
	?>	
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
			<!-- left menu starts -->
				<?php include('on-teacher-left.php');?>	
			<!-- left menu ends -->

            <div id="content" class="span10">
            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">校内专家</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="#">个人信息</a>
                    </li>
                </ul>
            </div>
            <!-- path -->

            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>查看论文</h2>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            <fieldset>
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <th>评审年份</th>
									    <th>姓名</th>	
									    <th>学号</th>	
									    <th>类别</th>	
									    <th>专业</th>	
                                        <th>是否已评</th>
                                        <th>操作</th>    
                                    </thead>
                                    <thead>
                                        <th><input type="text" class="input-mini" value=""></th>
										<th><input type="text" class="input-mini" value=""></th>
										<th><input type="text" class="input-mini" value=""></th>
                                        <th><select type="text" class="input-small">
                                            <option>硕士研究生</option>
                                            <option>博士研究生</option>
                                            <option>体育研究生</option> 
                                            <option selected="selected">全部</option>         
										</select></th>
										<th><input type="text" class="input-mini" value=""></th>
                                        <th><select type="text" class="input-small">
                                            <option>还未评审</option>
                                            <option>已经评审</option>
                                            <option>全部</option>
                                        </select></th>
                                        <th>
											<button type="submit" class="btn btn-primary btn-small">搜索</button>
											<button type="submit" class="btn btn-success btn-small">导出信息</button>
                                         </th>
                                    </thead>
	                                <tr>
                                        <td>2011</td>
										<td>张三</td>
										<td>123455678</td>
                                        <td>硕士研究生</td>
										<td>竞技体育</td>
                                        <td><span class="label label-success">已经评审</span></td>
                                        <td>
                                            <button type="submit" class="btn btn-info">评审/修改</button>
                                         </td>
                                    </tr>
                                    <tr>
										<td>2011</td>
										<td>王五</td>
										<td>12455678</td>
                                        <td>博士研究生</td>
										<td>运动学</td>
                                        <td><span class="label label-important">还未评审</span></td>
                                        <td>
                                            <button type="submit" class="btn btn-info">评审/修改</button>
                                         </td>
									</tr>
								</table>
                            </fieldset>
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
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
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
