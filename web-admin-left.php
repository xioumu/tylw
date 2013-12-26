<?php 
    header("Content-Type: text/html;charset=utf-8");
?>
<html>
    <body>
        	<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">菜单</li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">管理学生</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">管理校内专家</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">管理校外专家</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">查看当前评审信息</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">设置截止日期及结束评测并归档</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-manage.php"><span class="hidden-tablet">查看归档的信息</span></a></li>
                        <li><a class="ajax-link" href="sys-admin-passwd.php"><span class="hidden-tablet">修改密码</span></a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>您需要启用JavaScript来获得更好的体验</p>
                </div>
            </noscript>
    </body>
</html>
