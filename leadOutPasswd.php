<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));
function leadOutExl($allData, $type, $ex = '2003') { //把数据输出至EXLX文件
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Europe/London');
    if (PHP_SAPI == 'cli') die('This example should only be run from a Web Browser');
    /** Include PHPExcel */
    require_once 'PHPExcel/PHPExcel.php';
    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                 ->setLastModifiedBy("Maarten Balliauw")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

    if ($type == 'stu') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', '学号')
                    ->setCellValue('B1', '密码')
                    ->setCellValue('C1', '姓名')
                    ->setCellValue('D1', '性别')
                    ->setCellValue('E1', '年级')
                    ->setCellValue('F1', '专业')
                    ->setCellValue('G1', '校内方向')
                    ->setCellValue('H1', '类别')
                    ->setCellValue('I1', '导师')
                    ->setCellValue('J1', '身份证')
                    ->setCellValue('K1', '论文题目')
                    ->setCellValue('L1', '论文重复率')
                    ->setCellValue('M1', '审评1')
                    ->setCellValue('N1', '审评2')
                    ->setCellValue('O1', '审评3')
                    ->setCellValue('P1', '评审结果');
        $i = 2;
        foreach ($allData as $person) {
            $allEvaRes = getAllEvaRes($person['studentID']);
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $i, $person['studentID'])
                        ->setCellValue('B' . $i, $person['passwd'])
                        ->setCellValue('C' . $i, $person['sName'])
                        ->setCellValue('D' . $i, $person['sex'])
                        ->setCellValue('E' . $i, $person['grade'])
                        ->setCellValue('F' . $i, $person['major'])
                        ->setCellValue('G' . $i, $person['subject'])
                        ->setCellValue('H' . $i, $person['type'])
                        ->setCellValue('I' . $i, $person['tutor'])
                        ->setCellValue('K' . $i, $person['paperName'])
                        ->setCellValue('L' . $i, $person['repeatRate'])
                        ->setCellValue('P' . $i, $person['status']);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('J'.$i, $person['IDcard'], PHPExcel_Cell_DataType::TYPE_STRING); //设置单元格式
            $j = ord('M');
            foreach ($allEvaRes as $res) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($j) . $i, getEvaInfoC($res['c11']));
                $j++;
            }
            $i++;
        }
    }
    else if($type == 'onTea') {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '工号')
            ->setCellValue('B1', '密码')
            ->setCellValue('C1', '姓名')
            ->setCellValue('D1', '校内方向')
            ->setCellValue('E1', '研究方向')
            ->setCellValue('F1', '性别')
            ->setCellValue('G1', '状态');
        $i = 2;
        foreach ($allData as $person) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $person['teacherID'])
                ->setCellValue('B' . $i, $person['passwd'])
                ->setCellValue('C' . $i, $person['tName'])
                ->setCellValue('D' . $i, $person['subject'])
                ->setCellValue('E' . $i, $person['research'])
                ->setCellValue('F' . $i, $person['sex'])
                ->setCellValue('G' . $i, $person['status']);
            $i++;
        }
    }
    else if($type == 'outTea') {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '账号')
            ->setCellValue('B1', '密码')
            ->setCellValue('C1', '专业')
            ->setCellValue('D1', '校内方向')
            ->setCellValue('E1', '类别')
            ->setCellValue('F1', '论文名')
            ->setCellValue('G1', '状态');
        $i = 2;
        foreach ($allData as $person) {
            $status = getTeaStatus($person['user']);
            $evaID = getAllUserEva($person['user'], "teacherID");
            $type = "";
            $subject = "";
            $major = "";
            $paperName = "";
            if (isset($evaID[0])) {
                $evaInfo = getEvaInfo($evaID[0]);
                $stuInfo = getStuInfo($evaInfo['studentID']);
                $major = $stuInfo['major'];
                $paperName = $stuInfo['paperName'];
                $type = $stuInfo['type'];
                $subject = $stuInfo['subject'];
            }
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $person['user'])
                ->setCellValue('B' . $i, $person['passwd'])
                ->setCellValue('C' . $i, $major)
                ->setCellValue('E' . $i, $subject)
                ->setCellValue('E' . $i, $type)
                ->setCellValue('D' . $i, $paperName)
                ->setCellValue('G' . $i, $status);
            $i++;
        }
    }
    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('passwd');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    if($ex == '2007') { //导出excel2007文档
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="information.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {  //导出excel2003文档
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="information.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'stu') {
        $allData = array();
        $allUser = getAllUserPasswd('stu');
        foreach ($allUser as $user) {
            $res = getStuInfo($user['user']);
            $res['user'] = $user['user'];
            $res['passwd'] = $user['passwd'];
            array_push($allData, $res);
        }
        leadOutExl($allData, 'stu');
    }
    else if($_GET['type'] == 'onTea') {
        $allData = array();
        $allUser = getAllUserPasswd('onTea');
        foreach ($allUser as $user) {
            $res = getOnTeaInfo($user['user']);
            $res['user'] = $user['user'];
            $res['passwd'] = $user['passwd'];
            array_push($allData, $res);
        }
        leadOutExl($allData, 'onTea');
    }
    else if($_GET['type'] == 'outTea') {
        $allData = array();
        $allUser = getAllUserPasswd('outTea');
        foreach ($allUser as $user) {
            $res['user'] = $user['user'];
            $res['passwd'] = $user['passwd'];
            array_push($allData, $res);
        }
        leadOutExl($allData, 'outTea');
    }
}
?>
