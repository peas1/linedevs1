<?php
    require('../libs/PHPExcel/Classes/PHPExcel.php');
    include('../libs/PHPExcel/Classes/PHPExcel/IOFactory.php');
    date_default_timezone_set('Asia/Bangkok');
    function getDataFromXLSXPath($xlsxPath){
        // load xlsx file with its path
        $inputFileType = PHPExcel_IOFactory::identify($xlsxPath);  
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
        $objReader->setReadDataOnly(true);  
        $objPHPExcel = $objReader->load($xlsxPath);  
        // set config -> activesheet, highestRow, highestColumn and get heading data
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1', null, true, true, true);
        $headingsArray = $headingsArray[1];
        // collect data within $namedDataArray
        $r = -1;
        $namedDataArray = array();
        for ($row = 2; $row <= $highestRow; ++$row) {
            ++$r;
            $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row, null, true, true, true);
            foreach($headingsArray as $columnKey => $columnHeading) {
                $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
            }
        }
        return $namedDataArray;
    }
    function uploadXLSXFile($conn, $file){
        $filename = $file['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $target_path = "./xls/".basename(date('d-m-').(date("Y")+543)).".".$ext;
        $uploaded_result = @move_uploaded_file($file['tmp_name'], $target_path);
        if(!$uploaded_result) {
            die(error_get_last());
        }
        return $target_path;
    }
    function clearComplaintData($conn){
        $sql = "DELETE FROM tbl_complaint";
        mysqli_query($conn, $sql);
    }
    function insertComplaintData($conn, $namedDataArray){
        $count_complaint = 0;
        session_start();
        $office = $_SESSION["OFFICE"];
        foreach($namedDataArray as $row){
           // if($row['กลุ่ม'] <> "ร้องเรียน" || $row['ผลการดำเนินการ'] == "ยกเลิก"){
           //     continue;
           // }
            $count_complaint++;
            $office = $row['office'];
            $jobname = $row['jobname'];
            $docno = $row['docno'];
            $d_date = $row['d-date'];
            $wbs = $row['wbs'];
            $sql = "INSERT INTO tbl_loan(office,job_name, doc_no, doc_date, wbs) VALUES('$office','$jobname','$docno','$d_date','$wbs')";
            //$stmt = $conn->prepare($sql);
           // $stmt->bind_param("isssssssssssssi",$ca,$cs_name,$bill,$price,$tax);
           // $stmt->execute();
           mysqli_query($conn,$sql);
        }
    }
    function countComplaintData($conn){
        $sql = "SELECT COUNT(*) AS count_complaint FROM tbl_loan";
        $results = mysqli_query($conn, $sql) or trigger_error($conn->error."[$sql]");    
        $row = $results->fetch_assoc();
        return $row['count_complaint'];
    }