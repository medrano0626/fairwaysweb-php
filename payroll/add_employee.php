<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $company = $_SESSION['company'];
  $user_name = $_SESSION['username'];
  if(isset($_POST['submit'])){
    $lname = strtoupper($_POST['lname']); $fname = strtoupper($_POST['fname']); $mname = strtoupper($_POST['mname']);
    $status = "ACTIVE"; $position = $_POST['position']; $birthdate = $_POST['birthdate']; $address1 = strtoupper($_POST['address1']);
    $address2 = strtoupper($_POST['address2']); $contact = strtoupper($_POST['contact']); $gender = $_POST['gender']; $civil = $_POST['civil'];
    $spouse = strtoupper($_POST['spouse']); $child1 = strtoupper($_POST['child1']); $child2 = strtoupper($_POST['child2']); $sss = strtoupper($_POST['sss']);
    $phic = strtoupper($_POST['phic']); $hdmf = strtoupper($_POST['hdmf']); $tax = strtoupper($_POST['tin']); $sssd = $_POST['sssd'];
    $phicd = $_POST['phicd']; $hdmfd = $_POST['hdmfd']; $taxd = $_POST['taxd']; $hdmfpay = $_POST['hdmfpay'];
    $department = $_POST['department']; $location = $_POST['location']; $triprate = $_POST['triprate']; $salary = $_POST['salary'];
    $allowance = $_POST['allowance']; $datehired = $_POST['datehired']; $datepermanent = $_POST['datepermanent']; $password = strtoupper($_POST['password']);
    $showpayslip = $_POST['showpayslip']; $payrolltype = $_POST['payrolltype']; $atm = $_POST['atm']; $mother = strtoupper($_POST['mother']);
    $emergency = strtoupper($_POST['emergency']); $userlastupdate = $user_name; $datelastupdate = date("Y-m-d"); 
    $sql = "SELECT * FROM TBL_MASTERFILE WHERE COMPANY = '$company' ORDER BY EMPNO DESC LIMIT 1";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $empno = $row['empno'] + 1;
        }
        $sql = "INSERT INTO TBL_MASTERFILE (EMPNO, LNAME, FNAME, MNAME, COMPANY, STATUS_, POSITION, BIRTHDATE, ADDRESS1, ADDRESS2, CONTACT, GENDER, 
                CIVIL, SPOUSE, CHILD1, CHILD2, SSS, PHIC, HDMF, TAX, SSSD, PHICD, HDMFD, TAXD, HDMFPAY, DEPARTMENT, LOCATION_, TRIPRATE, SALARY, ALLOWANCE, 
                DATEHIRED, DATEPERMANENT, PASSWORD_, SHOWPAYSLIP, PAYROLLTYPE, ATM, MOTHER, EMERGENCY_, USERLASTUPDATE, DATELASTUPDATE, USERNAME) 
                VALUES ($empno, '$lname', '$fname', '$mname', '$company', '$status', '$position', '$birthdate', '$address1', '$address2', '$contact', '$gender', 
                '$civil', '$spouse', '$child1', '$child2', '$sss', '$phic', '$hdmf', '$tax', '$sssd', '$phicd', '$hdmfd', '$taxd', '$hdmfpay', '$department', '$location', $triprate, $salary, $allowance, 
                '$datehired', '$datepermanent', '$password', '$showpayslip', '$payrolltype', $atm, '$mother', '$emergency', '$userlastupdate', '$datelastupdate', '$empno')";
        $result = $conn->query($sql);
        header("Location: masterfile.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style.css">
    <link rel="icon" type = "images/x-icon" href="static/images/logo.png">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>ADD EMPLOYEE</title>
</head>
<body onload="getdate()">
    <div class="container">
        <header>Registration</header>

        <form action="add_employee.php" method="post" id="form_submit">
            <div class="form first active">
                <div class="details personal">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" id = "lname" name = "lname" placeholder="Enter Last Name" required autofocus>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id = "fname" name = "fname" placeholder="Enter First Name" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" id = "mname" name = "mname" placeholder="Enter Middle Name" >
                        </div>

                        <div class="input-field">
                            <label>Birth Date</label>
                            <input type="date" id = "birthdate" name = "birthdate" >
                        </div>
                        
                        <div class="input-field">
                            <label>Current Address</label>
                            <input type="text" id = "address1" name = "address1" placeholder="Enter Current Address" >
                        </div>
                        
                        <div class="input-field">
                            <label>Permanent Address</label>
                            <input type="text" id = "address2" name = "address2" placeholder="Enter Permanent Address" >
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Contact No.</label>
                            <input type="text" id = "contact" name = "contact" placeholder="Enter Contact No." >
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select  name="gender" id="gender">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Civil Status</label>
                            <select  name="civil" id="civil">
                                <option value="SINGLE">SINGLE</option>
                                <option value="MARRIED">MARRIED</option>    
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" id = "spouse" name = "spouse" placeholder="Enter Spouse Name" >
                        </div>

                        <div class="input-field">
                            <label>Child Name 1</label>
                            <input type="text" id = "child1" name = "child1" placeholder="Enter name of child" >
                        </div>

                        <div class="input-field">
                            <label>Child Name 2</label>
                            <input type="text" id = "child2" name = "child2" placeholder="Enter name of child" >
                        </div>
                    </div>

                    <button class="nextBtn1" type="button">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>SSS</label>
                            <input type="text" id = "sss" name = "sss" placeholder="Enter SSS No." >
                        </div>

                        <div class="input-field">
                            <label>PHIC</label>
                            <input type="text" id = "phic" name = "phic" placeholder="Enter Phillealth No." >
                        </div>

                        <div class="input-field">
                            <label>HDMF</label>
                            <input type="text" id = "hdmf" name = "hdmf" placeholder="Enter Pagibig No." >
                        </div>

                        <div class="input-field">
                            <label>TIN</label>
                            <input type="text" id = "tin" name = "tin" placeholder="Enter TIN" >
                        </div>

                        <div class="input-field">
                            <label>Deduct SSS?</label>
                            <select  name="sssd" id="sssd">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Deduct PHIC?</label>
                            <select  name="phicd" id="phicd">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="details family">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Deduct HDMF?</label>
                            <select  name="hdmfd" id="hdmfd">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Deduct Tax?</label>
                            <select  name="taxd" id="taxd">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>HDMF Contri (For Semi-Monthly Only)</label>
                            <input type="number" step="any" min="0" max="100000" id = "hdmfpay" name = "hdmfpay" value = "0" placeholder="Enter Pagibig Contri" >
                        </div>

                        <div class="input-field">
                            <label>Department</label>
                            <select  name="department" id="department">
                                <option value="ADMIN">ADMIN</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DELIVERY">DELIVERY</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Position</label>
                            <select  name="position" id="position">
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DRIVER">DRIVER</option>
                                <option value="HELPER">HELPER</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Location</label>
                            <select  name="location" id="location">
                            <?php
                                $sql = "SELECT * FROM TBL_LOCATION WHERE company = '$company'";
                                $result = $conn->query($sql);

                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value=".$row['location_'].">".$row['location_']."</option>";
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn1" type="button">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="nextBtn2" type="button">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
            <div class="form third">
                <div class="details address">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Trip Rate</label>
                            <input type="number" step="any" min="0" max="200000" id = "triprate" name = "triprate" value = "0" placeholder="Enter Trip Rate" >
                        </div>

                        <div class="input-field">
                            <label>Monthly Salary</label>
                            <input type="number" step="any" min="0" max="200000" id = "salary" name = "salary" value = "0" placeholder="Enter Monthly Salary" >
                        </div>

                        <div class="input-field">
                            <label>Daily Allowance</label>
                            <input type="number" step="any" min="0" max="200000" id = "allowance" name = "allowance" value = "0" placeholder="Enter Daily Allowance" >
                        </div>

                        <div class="input-field">
                            <label>Date Hired</label>
                            <input type="date" id = "datehired" name = "datehired" >
                        </div>

                        <div class="input-field">
                            <label>Date Permanent</label>
                            <input type="date" id = "datepermanent" name = "datepermanent" >
                        </div>

                        <div class="input-field">
                            <label>Status</label>
                            <select  name="status" id="status">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="RESIGNED">RESIGNED</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Payslip Password</label>
                            <input type="text" id = "password" name = "password" placeholder="Enter Payslip Password" >
                        </div>

                        <div class="input-field">
                            <label>Show Payslip to Employee?</label>
                            <select  name="showpayslip" id="showpayslip">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Payroll Type</label>
                            <select  name="payrolltype" id="payrolltype">
                                <option value="WEEKLY">WEEKLY</option>
                                <option value="SEMI-MONTHLY">SEMI-MONTHLY</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>ATM No.</label>
                            <input type="number" id = "atm" name = "atm" value = "0" placeholder="Enter ATM No." >
                        </div>

                        <div class="input-field">
                            <label>Mother's Maiden Name</label>
                            <input type="text" id = "mother" name = "mother" placeholder="Enter Mother's Maiden Name" >
                        </div>

                        <div class="input-field">
                            <label>Emergency Contact Person/Number</label>
                            <input type="text" id = "emergency" name = "emergency" placeholder="Enter Emergency Contact Person/Number" >
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn2" type="button">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="submit" type = "button" onclick="check_duplicate_employee(1)">

                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="submit" type = "submit" id = "submit" name = "submit" hidden></button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <script type = "text/javascript" src="static/js/script1.js" data-empno = "111"></script>
</body>

</html>
