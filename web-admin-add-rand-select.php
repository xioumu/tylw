<?php
include("config.php");
include("myFunction.php");
judgeUser(array('web'));
function leadOutExl($allData, $type) { //把数据输出至EXLX文件
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
    $objPHPExcel->getProperties()-> setCreator("Maarten Balliauw")
                                 ->setLastModifiedBy("Maarten Balliauw")
                                 ->setTitle("Office 2007 XLSX Test Document")
                                 ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

    if ($type == 'onTea') {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '工号')
                                            ->setCellValue('B1', '姓名')
                                            ->setCellValue('C1', '校内方向')
                                            ->setCellValue('D1', '研究方向')
                                            ->setCellValue('E1', '性别');
        $i = 2;
        foreach ($allData as $person) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $person['teacherID'])
                                                ->setCellValue('B' . $i, $person['tName'])
                                                ->setCellValue('C' . $i, $person['subject'])
                                                ->setCellValue('D' . $i, $person['research'])
                                                ->setCellValue('E' . $i, $person['sex']);
            $i++;
        }
    }
    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('info');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="information.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}

$allMajor = getAllMajor('onTea');
$allData = array();
foreach ($allMajor as $major) {
    $allUser = getAllMajorUser('onTea', $major);
    $i = 5;
    foreach ($allUser as $user) {
        $res = getOnTeaInfo($user);
        $res['user'] = $user;
        array_push($allData, $res);
        $i--;
        if ($i <= 0) break;
    }
}
leadOutExl($allData, 'onTea');
?>
