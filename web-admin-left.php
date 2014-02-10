<?php 
    //header("Content-Type: text/html;charset=utf-8");
?>
<html>
    <body>
        	<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">菜单</li>
                        <li><a class="ajax-link" href="web-admin-student-manage.php"><span class="hidden-tablet">管理学生账号</span></a></li>
                        <li><a class="ajax-link" href="web-admin-OnTeacher-manage.php"><span class="hidden-tablet">管理校内专家账号</span></a></li>
                        <li><a class="ajax-link" href="web-admin-OutTeacher-manage.php"><span class="hidden-tablet">管理校外专家账号 </span></a></li>
                        <li><a class="ajax-link" href="web-admin-judge-manage.php"><span class="hidden-tablet">管理当前评审信息</span></a></li>
                        <li><a class="ajax-link" href="web-admin-deadline.php"><span class="hidden-tablet">设置截止日期</span></a></li>
                        <li><a class="ajax-link" href="web-admin-finish.php"><span class="hidden-tablet">结束评测并归档</span></a></li>
                        <li><a class="ajax-link" href="web-admin-finish-info.php"><span class="hidden-tablet">查看归档的信息</span></a></li>
                        <li><a class="ajax-link" href="web-admin-type-manage.php"><span class="hidden-tablet">管理类别</span></a></li>
                        <li><a class="ajax-link" href="web-admin-passwd.php"><span class="hidden-tablet">修改密码</span></a></li>
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
