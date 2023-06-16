<?php
    session_start();
    include "../../config.php";
    $company = $_SESSION['company'];
    $id = $_POST['id'];
    if($id == '1'){
        $rowid = $_POST['rowid'];
        $sql = "DELETE FROM TBL_SSS WHERE rowid = $rowid";
    }
    elseif($id == '2'){
        $rowid = $_POST['rowid'];
        $sql = "DELETE FROM TBL_ATTENDANCE WHERE rowid = $rowid";
    }
    // elseif($check == 2){
    //     $lname = $_POST['lname']; $fname = $_POST['fname']; $mname = $_POST['mname']; $empno = $_POST['empno'];
    //     $sql = "SELECT * FROM TBL_MASTERFILE WHERE LNAME = '$lname' AND FNAME = '$fname' AND MNAME = '$mname' AND status_ = 'ACTIVE' AND empno <> $empno";
    // }
    // elseif($check == 3){
    //     $dedname = $_POST['dedname']; $dedtype = $_POST['dedtype'];
    //     $sql = "SELECT * FROM TBL_DEDUCTION_TYPE WHERE COMPANY = '$company' AND DEDUCTION_NAME = '$dedname' AND DEDUCTION_TYPE = '$dedtype'";
    // }
    // elseif($check == 4){
    //     $dedname = $_POST['dedname']; $dedtype = $_POST['dedtype']; $rowid = $_POST['rowid'];
    //     $sql = "SELECT * FROM TBL_DEDUCTION_TYPE WHERE COMPANY = '$company' AND DEDUCTION_NAME = '$dedname' AND DEDUCTION_TYPE = '$dedtype' AND ROWID <> $rowid";
    // }
    // elseif($check == 5){
    //     $sssfrom = $_POST['sssfrom']; $sssto = $_POST['sssto']; 
    //     $sql = "SELECT * FROM TBL_SSS WHERE SSSFROM = $sssfrom AND SSSTO = $sssto";
    // }
    $result = $conn->query($sql);
    echo json_encode(array("result"=>'YES'));
  ?>