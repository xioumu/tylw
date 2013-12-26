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
				<?php include('out-teacher-left.php');?>	
			<!-- left menu ends -->

            <div id="content" class="span10">
            <!-- content starts -->

            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>查看论文</h2>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
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
                                            <a href="#myBox1" class="btn btn-info btn-setting" data-toggle="modal" >评审/修改</a>
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
                                             <a href="#myBox2" class="btn btn-info btn-setting" data-toggle="modal" >评审/修改</a>
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
	<div class="mybox modal hide fade" id="myBox1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>评审</h3>
		</div>
		<form>
		<div class="modal-body table-striped">
			<table class="table table-bordered">
                       <tr>
                            <th class="boxContent title">学号</th>
							<td class="boxContent">105222010bs010</td>	
							<th class="boxContent">姓名</th>	
							<td class="boxContent">张四三二</td>	
							<th class="boxContent">专业</th>	
                            <td class="boxContent">体育教育训练学</td>  
                        </tr>
						<tr>
                            <th class="boxContent">论文下载</th>
							<td colspan="5"><a class="btn btn-success">下载</a></td>
						</tr>
						<tr>
							<th class="boxContent">评价指标
							<p>（权重）</p>
							</th class="boxContent">
							<th colspan="3" class="boxContent">评价内容</th>
							<th colspan="2" class="boxContent">评分</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文选题与综述</p>
							<p>（15%）</p>
							</th class="boxContent">
							<th colspan="3">接触学科前沿，理论或实际意义；<br>阅读量、综合分析能力，了解本专业学术动态程度</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box11" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box11" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box11" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box11" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>研究思路与方法</p>
							<p>（30%）</p>
							</th class="boxContent">
							<th colspan="3">研究思路清晰，调查研究与分析方法（如测量工具、统计分析方法）先进、科学，结论正确</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box12" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box12" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box12" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box12" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>研究结果与结论</p>
							<p>（25%）</p>
							</th class="boxContent">
							<th colspan="3">结果准确、真实；结论恰当，有一定的社会效益或学术贡献</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box13" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box13" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box13" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box13" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文格式与写作</p>
							<p>（10%）</p>
							</th class="boxContent">
							<th colspan="3">条理清楚，层次分明，文笔流畅；书写格式、图表规范；外文摘要语句无错</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box14" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box14" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box14" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box14" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文工作量</p>
							<p>（5%）</p>
							</th class="boxContent">
							<th colspan="3">字数不得少于5万字</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box15" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box15" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box15" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box15" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文报告与答辩</p>
							<p>（10%）</p>
							</th class="boxContent">
							<th colspan="3">能流利、清晰地报告论文的主要内容；能准确回答各种问题</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box16" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box16" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box16" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box16" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>参考文献</p>
							<p>（5%）</p>
							</th class="boxContent">
							<th colspan="3">参考文献的总量；外文文献的数量；参考文献的质量等</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box17" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box17" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box17" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box17" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent">总体评价</th>
							<td colspan="5">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box18" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box18" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box18" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box18" id="D" value="D">不合格
								  </label>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<th class="boxContent">表决意见</th>
							<td colspan="5">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box19" id="A" value="A">建议立即授予学位
								  </label>
								  <label class="radio">
									<input type="radio" name="box19" id="B" value="B">建议论文修改后授予学位
								  </label>
								  <label class="radio">
									<input type="radio" name="box19" id="C" value="C">建议不授予学位
								  </label>
								</div>
								</div>
							</td>
						</tr>
			</table>	
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">关闭</a>
			<button type="submit" class="btn btn-primary">保存</button>
		</div>
		</form>
	</div>
	
	<div class="mybox modal hide fade" id="myBox2">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>评审</h3>
		</div>
		<form>
		<div class="modal-body table-striped">
			<table class="table table-bordered">
                       <tr>
                            <th class="boxContent title">学号</th>
							<td class="boxContent">1234678765432</td>	
							<th class="boxContent">姓名</th>	
							<td class="boxContent">王七五</td>	
							<th class="boxContent">专业</th>	
                            <td class="boxContent">体育教育训练学</td>  
                        </tr>
						<tr>
                            <th class="boxContent">论文下载</th>
							<td colspan="5"><a class="btn btn-success">下载</a></td>
						</tr>
						<tr>
							<th class="boxContent">评价指标
							<p>（权重）</p>
							</th class="boxContent">
							<th colspan="3" class="boxContent">评价内容</th>
							<th colspan="2" class="boxContent">评分</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文选题与综述</p>
							<p>（15%）</p>
							</th class="boxContent">
							<th colspan="3">接触学科前沿，理论或实际意义；<br>阅读量、综合分析能力，了解本专业学术动态程度</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box21" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box21" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box21" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box21" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>研究思路与方法</p>
							<p>（30%）</p>
							</th class="boxContent">
							<th colspan="3">研究思路清晰，调查研究与分析方法（如测量工具、统计分析方法）先进、科学，结论正确</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box22" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box22" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box22" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box22" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>研究结果与结论</p>
							<p>（25%）</p>
							</th class="boxContent">
							<th colspan="3">结果准确、真实；结论恰当，有一定的社会效益或学术贡献</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box23" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box23" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box23" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box23" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文格式与写作</p>
							<p>（10%）</p>
							</th class="boxContent">
							<th colspan="3">条理清楚，层次分明，文笔流畅；书写格式、图表规范；外文摘要语句无错</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box24" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box24" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box24" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box24" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文工作量</p>
							<p>（5%）</p>
							</th class="boxContent">
							<th colspan="3">字数不得少于5万字</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box25" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box25" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box25" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box25" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>论文报告与答辩</p>
							<p>（10%）</p>
							</th class="boxContent">
							<th colspan="3">能流利、清晰地报告论文的主要内容；能准确回答各种问题</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box26" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box26" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box26" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box26" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent"><p>参考文献</p>
							<p>（5%）</p>
							</th class="boxContent">
							<th colspan="3">参考文献的总量；外文文献的数量；参考文献的质量等</th>
							<th colspan="2">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box27" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box27" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box27" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box27" id="D" value="D">不合格
								  </label>
								</div>
							  </div>
							</th>
						</tr>
						<tr>
							<th class="boxContent">总体评价</th>
							<td colspan="5">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box28" id="A" value="A">优秀
								  </label>
								  <label class="radio">
									<input type="radio" name="box28" id="B" value="B">良好
								  </label>
								  <label class="radio">
									<input type="radio" name="box28" id="C" value="C">合格
								  </label>
								  <label class="radio">
									<input type="radio" name="box28" id="D" value="D">不合格
								  </label>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<th class="boxContent">表决意见</th>
							<td colspan="5">
								<div class="control-group">
								<div class="controls">
								  <label class="radio">
									<input type="radio" name="box29" id="A" value="A">建议立即授予学位
								  </label>
								  <label class="radio">
									<input type="radio" name="box29" id="B" value="B">建议论文修改后授予学位
								  </label>
								  <label class="radio">
									<input type="radio" name="box29" id="C" value="C">建议不授予学位
								  </label>
								</div>
								</div>
							</td>
						</tr>
			</table>	
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">关闭</a>
			<button type="submit" class="btn btn-primary">保存</button>
		</div>
		</form>
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
