<?php
    session_start();
    include "../../config.php";
    $company = $_SESSION['company'];
    $id = $_POST['id'];
    if($id == '1'){
        $emptype = $_POST['emptype'];
        $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE COMPANY = '$company' AND EMPLOYEETYPE = '$emptype' AND STATUS_ = 'ACTIVE'";
        $result = $conn->query($sql);
        $rows = mysqli_num_rows($result);
        $period = array();
        if($rows > 0){
            
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $period[$i] = $row['rowid'];
                $i = $i + 1;
                $period[$i] = $row['payrollperiod'];
                $i = $i + 1;
            }
            echo json_encode(array("period"=>$period));
        }
    }
    elseif($id == '2'){
        $empno = $_POST['empno']; $rowid = $_POST['rowid'];
        $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE rowid = $rowid";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $periodfrom = $row['periodfrom'];
            $periodto = $row['periodto'];
        }
        $sql = "SELECT * FROM TBL_ATTENDANCE WHERE empno = $empno AND periodfrom = '$periodfrom' AND periodto = '$periodto'";
        $result = $conn->query($sql);
        $rows = mysqli_num_rows($result);
        $attendance = array();
        if($rows > 0){
            while($row = $result->fetch_assoc()) {
                $attendance[0] = $row['rowid'];
                $attendance[1] = $row['regday'];
                $attendance[2] = $row['regot'];
                $attendance[3] = $row['regholiday'];
                $attendance[4] = $row['regholidayot'];
                $attendance[5] = $row['specholiday'];
                $attendance[6] = $row['specholidayot'];
                $attendance[7] = $row['tardy'];
            }
            echo json_encode(array("attendance"=>$attendance));
        }
    }
    
    
    
    
  ?>