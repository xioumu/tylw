<!DOCTYPE html>
<?php header("Content-Type: text/html;charset=utf-8");
include("config.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
</head>
<body>
	<!-- topbar starts -->
	<?php include('header.php');?>	
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
			<!-- left menu starts -->
				<?php include('student-left.php');?>	
			<!-- left menu ends -->

            <div id="content" class="span10">
            <!-- content starts -->
			
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2>查看结果</h2>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label">评审结果</label>
                                    <div class="controls">
                                        <input class="input-xlarge disabled" id="name" type="text" value="通过" disabled="">
                                    </div>
                                </div>
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

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
