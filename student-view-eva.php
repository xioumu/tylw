<!DOCTYPE html>
<?php include("config.php"); ?>
<html lang = zh">
<head>
    <meta charset = "utf-8">
    <title>武汉体育学院学位管理系统</title>
    <?php include('css.php'); ?>
    <?php include('script.php'); ?>
    <?php include('myFunction.php'); ?>
</head>
<body class = "index">
<!-- topbar starts -->
<?php include('header.php'); ?>
<!-- topbar ends -->
<div class = "container-fluid">
    <div class = "row-fluid">
        <!-- left menu starts -->
        <?php include('student-left.php'); ?>
        <!-- left menu ends -->

        <div id = "content" class = "span10">
            <div>
                <ul class = "breadcrumb">
                    <li><a href = "student-info.php">学生</a> <span class = "divider">/</span></li>
                    <li><a href = "student-result.php">查看审评结果</a> <span class = "divider">/</span></li>
                    <li><a href = "student-view-eva.php">查看细节</a></li>
                </ul>
            </div>
            <!-- content starts -->
            <?php
            if (!isset($_SESSION['is_login']) && !isset($_GET['id'])) {
                errorUser();
            }


            $self = $_SESSION['is_login'];
            $eid = $_GET['id'];
            $evaInfo = getEvaInfo($eid);
            $stuInfo = getStuInfo($self);
            if ($evaInfo['studentID'] != $self) {
                errorUser();
            }
            ?>
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>查看结果</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal">
                            <table class = "table table-bordered">
                                <tr>
                                    <th class = "boxContent title" colspan = "1">论文编号</th>
                                    <td class = "boxContent " colspan = "2"><?php echo $stuInfo['paperNum']; ?></td>
                                    <th class = "boxContent title" colspan = "1">论文题目</th>
                                    <td class = "boxContent" colspan = "2"><?php echo $stuInfo['paperName']; ?></td>
                                </tr>
                                <tr>
                                    <th class = "boxContent">评价要素
                                    </th class="boxContent">
                                    <th colspan = "4" class = "boxContent">参考内容</th>
                                    <th colspan = "1" class = "boxContent">评分</th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>论文选题</p></th>
                                    <th colspan = "4">接触学科前沿，理论或实际意义</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c1']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>文献综述</p></th>
                                    <th colspan = "4">阅读量、综合分析能力，了解本学科专业学术动态程度义</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c2']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>成果与创新</p></th>
                                    <th colspan = "4">论文成果与新见解</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c3']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>论基础理论与专门知识 </p></th>
                                    <th colspan = "4">基础理论的坚实度、专门知识的系统性</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c4']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>研究手段或设计能力</p></th>
                                    <th colspan = "4">研究方法是否恰当并加以严格论证，独立进行分析问题，解决问题的能力如何</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c5']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>写作能力与学风</p></th>
                                    <th colspan = "4">条理性、逻辑性、文笔等各方面，书写格式、图表是否规范</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c6']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>工作量</p></th>
                                    <th colspan = "4">工作量及难度</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c7']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>参考文献</p></th>
                                    <th colspan = "4">参考文献的总量；外文文献的数量；参考文献的质量等。</th>
                                    <th colspan = "1">
                                        <?php echo getEvaInfoC($evaInfo['c8']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>是否抄袭</p></th>
                                    <th colspan = "5">
                                        <?php echo getEvaInfoC9($evaInfo['c9']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class = "boxContent"><p>论文能否答辩</p></th>
                                    <th colspan = "5">
                                        <?php echo getEvaInfoC10($evaInfo['c10']); ?>
                                    </th>
                                <tr>
                                    <th class = "boxContent"><p>对论文水平的总体评价</p></th>
                                    <th colspan = "5">
                                        <?php echo getEvaInfoC($evaInfo['c11']); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan = "6">
                                        <div class = "control-group">
                                            <label> 论文的不足之处及对论文工作的意见或建议: </label>
                                            <textarea rows = "10" cols = "10" name = "summary" class = "myWitch970" disabled> <?php echo $evaInfo['summary']; ?></textarea>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
</div>
<!--/.fluid-container-->
</body>
</html>