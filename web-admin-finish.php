<!DOCTYPE html>
<?php include("config.php"); ?>
<html lang = "zh">
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
        <?php include('web-admin-left.php'); ?>
        <!-- left menu ends -->
        <?php
        //将现有的审评归档
        function moveEvaFinish($judgeInfo) {
            $allEva = getAllEva();
            $judgeYear = $judgeInfo;
            foreach ($allEva as $eid) {
                $info = getEvaInfo($eid);
                if (!mysql_query("INSERT INTO record_evaluating (eid,teacherID,studentID,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,t1,t2,t3,t4,t5,time,summary,judgeYear,tName,status)
                                      VALUE ('{$info['eid']}','{$info['teacherID']}','{$info['studentID']}','{$info['c1']}','{$info['c2']}','{$info['c3']}','{$info['c4']}'
                                      ,'{$info['c5']}','{$info['c6']}','{$info['c7']}','{$info['c8']}','{$info['c9']}','{$info['c10']}','{$info['c11']}',
                                      '{$info['t1']}','{$info['t2']}','{$info['t3']}','{$info['t4']}','{$info['t5']}','{$info['time']}','{$info['summary']}','{$judgeYear}'
                                      ,'{$info['tName']}','{$info['status']}')")
                ) {
                    echo "<br> moveEvaFinish error!";
                    return false;
                }
            }
            return true;
        }
        //移动学生
        function moveStuFinish($judgeInfo) {
            $allStu = getAllUser('stu');
            $judgeYear = $judgeInfo;
            foreach ($allStu as $user) {
                $info = getStuInfo($user);
                if (!mysql_query("INSERT INTO record_student (studentID, sName, sex, subject, grade, status,IDcard,tutor, type, judgeYear, paperAdd, reportAdd, repeatRate, paperName,
                                                                paperNum, major)
                                      VALUE ('{$info['studentID']}','{$info['sName']}','{$info['sex']}','{$info['subject']}','{$info['grade']}','{$info['status']}',
                                      '{$info['IDcard']}','{$info['tutor']}','{$info['type']}','{$judgeYear}','{$info['paperAdd']}','{$info['reportAdd']}',
                                      '{$info['repeatRate']}', '{$info['paperName']}', '{$info['paperNum']}', '{$info['major']}' )")
                ) {
                   /* echo "INSERT INTO record_student (studentID, sName, sex, subject, grade, status,IDcard,tutor, type, judgeYear, paperAdd, reportAdd, repeatRate)
                                      VALUE ('{$info['studentID']}','{$info['sName']}','{$info['sex']}','{$info['subject']}','{$info['grade']}','{$info['status']}',
                                      '{$info['IDcard']}','{$info['tutor']}','{$info['type']}','{$judgeYear}','{$info['paperAdd']}','{$info['reportAdd']}',
                                      '{$info['repeatRate']}' )";
                   */
                    echo "<br> moveStuFinish error!";
                    return false;
                }
            }
            return true;
        }

        function setJudgeYear($val) {
            if (mysql_query("UPDATE other SET NowJudgeYear = '{$val}'")) {
                $paperDir="upFile/paper/".$val;
                $reportDir="upFile/report/".$val;
                //echo $paperDir;
                if (!file_exists($paperDir)) mkdir($paperDir, 0777);
                if (!file_exists($reportDir)) mkdir($reportDir, 0777);
                return true;
            }
            else return false;
        }
        //删除所有学生
        function delAllPassStu() {
            $flag = true;
            $allStuUser = getAllUser('stu');
            foreach ($allStuUser as $user) {
                //$status = getStuStatus($user);
                //if ($status != "通过评审") continue; //只让通过审评的人通过
                if (!delEva($user, 'studentID')) {
                    echo 'delete evaluating error!';
                    $flag = false;
                }
                if (!delStuInfo($user, false)) {
                    echo $user . "delete student info error! <br/>";
                    $flag = false;
                }
                else if (!delUser($user)) {
                    echo $user . "delete user error! <br/>";
                    $flag = false;
                }
            }
            return $flag;
        }
        if (isset($_POST['judgeYear']) && $_POST['judgeYear'] != "") {
            //echo "test";
            $flag = true;
            if (!moveEvaFinish($_POST['judgeYear'])) {
                $flag = false;
            }
            if (!moveStuFinish($_POST['judgeYear'])) {
                $flag = false;
            }
            if ($flag) {
                if (!delAllEva()) $flag = false;
                else if (!delAllPassStu()) $flag = false;
                else if (!delallOutTea()) $flag = false;
                else if (!setJudgeYear(time())) $flag = false;
            }
            if ($flag) {
                echo '<script> $(\'.index\').noty({"text": "归档成功", "layout": "topLeft", "type": "success"});</script>';
            }
            else {
                echo '<script> $(\'.index\').noty({"text": "归档失败", "layout": "topLeft", "type": "error"});</script>';
            }
        }
        $otherInfo = getOtherInfo();
        ?>
        <div id = "content" class = "span10">
            <!-- road -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="web-admin-student-manage.php">网站管理员</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="web-admin-finish.php">结束测评并归档</a>
                    </li>
                </ul>
            </div>
            <!-- content starts -->
            <div class = "row-fluid sortable">
                <div class = "box span12">
                    <div class = "box-header well" data-original-title>
                        <h2>结束测评并归档</h2>
                    </div>
                    <div class = "box-content">
                        <form class = "form-horizontal" action = "web-admin-finish.php" method = "post">
                            <fieldset>
                                <div class = "control-group">
                                    <label class = "control-label">请填本次审评归档信息</label>
                                    <div class = "controls">
                                        <input class = "input-xlarge disabled" id = "stdentID" type = "text" value = ""
                                               name = "judgeYear">
                                    </div>
                                </div>
                                <div class = "form-actions">
                                    <button type = "submit" class = "btn btn-primary ">结束测评并归档</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!--/span-->

            </div>
            <!--/row-->

            <!-- content ends -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
</div>
<!--/.fluid-container-->
</body>
</html>
