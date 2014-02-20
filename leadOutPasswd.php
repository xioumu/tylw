<?php
include("config.php");
include("myFunction.php");
function leadOutExl($allData) { //把数据输出至EXLX文件
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Europe/London');

    if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

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

    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '学号')
        ->setCellValue('B1', '密码')
        ->setCellValue('C1', '姓名')
        ->setCellValue('D1', '校内方向')
        ->setCellValue('E1', '类别')
        ->setCellValue('F1', '导师');
    $i = 2;
    foreach($allData as $person) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i , $person['studentID'])
            ->setCellValue('B' . $i , $person['passwd'])
            ->setCellValue('C' . $i , $person['sName'])
            ->setCellValue('D' . $i , $person['subject'])
            ->setCellValue('E' . $i , $person['type'])
            ->setCellValue('F' . $i , $person['tutor']);
        $i++;
    }
    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('passwd');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="password.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'stu') {
        $allData = array();
        $allUser = getAllUserPasswd('stu');
        foreach($allUser as $user){
            $res = getStuInfo($user['user']);
            $res['user'] = $user['user'];
            $res['passwd'] = $user['passwd'];
            array_push($allData, $res);
        }
        leadOutExl($allData);
    }
}
?>
