<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
// //   if(isset($_POST['edit_period'])){
// //     // $phicto1 = $_POST['phicto1']; $phicfrom2 = $_POST['phicfrom2']; $phicto2 = $_POST['phicto2']; $phicfrom3 = $_POST['phicfrom3'];
// //     // $amt1 = $_POST['amt1']; $amt2 = $_POST['amt2']; $amt3 = $_POST['amt3']; $hdmf = $_POST['hdmf'];
// //     // $sql = "DELETE FROM TBL_PHICHDMF";
// //     // $result = $conn->query($sql);
// //     //     $sql = "INSERT INTO TBL_PHICHDMF (phicto1, phicfrom2, phicto2, phicfrom3, amt1, amt2, amt3, hdmf) 
// //     //             VALUES ($phicto1, $phicfrom2, $phicto2, $phicfrom3, $amt1, $amt2, $amt3, $hdmf)";
// //     //     $result = $conn->query($sql);
// //     $_SESSION['period_rowid'];
// //     header("Location: edit_payroll_period.php");
// //   }
//   if(isset($_POST['submit'])){
//     $paytype = $_POST['paytype']; $employeetype = $_POST['employeetype']; $periodfrom = $_POST['periodfrom']; 
//         $periodto = $_POST['periodto']; $paymonth = $_POST['paymonth1']; $payyear = $_POST['payyear1']; $datemaintained = date("Y-m-d");
//         $payrollperiod =  date_format(date_create($periodfrom),"m/d/Y") . "-" . date_format(date_create($periodto),"m/d/Y");
//         $sql = "INSERT INTO TBL_PAYROLL_PERIOD (paytype, employeetype, periodfrom, periodto, paymonth, payyear, datemaintained, user, company, PAYROLLPERIOD, status_) 
//                 VALUES ('$paytype', '$employeetype', '$periodfrom', '$periodto', $paymonth, $payyear, '$datemaintained', '$user_name', '$company', '$payrollperiod', 'ACTIVE')";
//         $result = $conn->query($sql);
//   }
?>
<?php include "includes/header.php";?>
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style15.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>PAYROLL PERIOD</title>
<?php include "includes/body.php";?>
    <div class="container">
        <header>PAYROLL PERIOD</header>
        <form action="add_payroll_period.php" method="post" id="form_submit">
                    <div class="content">
                    </div>
                   
                    <div class="content"></div>
                        <div class="helpertable">
                            <table id="tablehelper" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <th>PAY TYPE</th>
                                    <th>EMPLOYEE TYPE</th>
                                    <th>PERIOD FROM</th>
                                    <th>PERIOD TO</th>
                                    <th>PAY MONTH</th>
                                    <th>PAY YEAR</th>
                                    <th></th>
                                    <th></th>
                                 </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE COMPANY = '$company' AND STATUS_ = 'ACTIVE'";
                                    $result = $conn->query($sql);
                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            echo "
                                        <tr>  
                                            <td>".$row['paytype']."</td>  
                                            <td>".$row['employeetype']."</td>  
                                            <td>".$row['periodfrom']."</td>  
                                            <td>".$row['periodto']."</td>
                                            <td>".$row['paymonth']."</td>
                                            <td>".$row['payyear']."</td>
                                            <td><input class = 'removehelper' id='removeexpenses' name = 'removeexpenses' type='button' value='  Edit  ' onclick='edit_period(".$row['rowid'].")'></input></td>
                                            <td><input class = 'removehelper' id='removeexpenses' name = 'removeexpenses' type='button' value='Delete' onclick='delete_period(".$row['rowid'].")'></input></td>
                                        </tr>";
                                    }}   
                                    ;?> 
                                    </tbody>    
                            </table>
                        </div>
                        <div class="buttons">
                            <button class="submit" type="submit">
                                <span class="btnText">Add</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                        <!-- <div class="input-box">
                            <button id = "button1" type="submit">Add</button>
                        </div> -->
                    </div>
        </form>
    </div>
    <script type = "text/javascript" src="static/js/script12.js"></script> 
    </body>
</html>
<!-- <td><input class = 'removehelper' id='removeexpenses' name = 'removeexpenses' type='button' value='  Edit  ' onclick='edit_period(".$row['rowid'].")'></input></td> -->
    