<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $company = $_SESSION['company'];
  $user_name = $_SESSION['username'];
  if(isset($_POST['submit'])){
    $empno = $_SESSION['empnomastefile'];
    $lname = $_POST['lname']; $fname = $_POST['fname']; $mname = $_POST['mname'];
    $status = "ACTIVE"; $position = $_POST['position']; $birthdate = $_POST['birthdate']; $address1 = $_POST['address1'];
    $address2 = $_POST['address2']; $contact = $_POST['contact']; $gender = $_POST['gender']; $civil = $_POST['civil'];
    $spouse = $_POST['spouse']; $child1 = $_POST['child1']; $child2 = $_POST['child2']; $sss = $_POST['sss'];
    $phic = $_POST['phic']; $hdmf = $_POST['hdmf']; $tax = $_POST['tin']; $sssd = $_POST['sssd'];
    $phicd = $_POST['phicd']; $hdmfd = $_POST['hdmfd']; $taxd = $_POST['taxd']; $hdmfpay = $_POST['hdmfpay'];
    $department = $_POST['department']; $location = $_POST['location']; $triprate = $_POST['triprate']; $salary = $_POST['salary'];
    $allowance = $_POST['allowance']; $datehired = $_POST['datehired']; $datepermanent = $_POST['datepermanent']; $password = $_POST['password'];
    $showpayslip = $_POST['showpayslip']; $payrolltype = $_POST['payrolltype']; $atm = $_POST['atm']; $mother = $_POST['mother'];
    $emergency = $_POST['emergency']; $userlastupdate = $user_name; $datelastupdate = date("Y-m-d");
    $sql = "DELETE FROM TBL_MASTERFILE WHERE EMPNO = $empno";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_MASTERFILE (EMPNO, LNAME, FNAME, MNAME, COMPANY, STATUS_, POSITION, BIRTHDATE, ADDRESS1, ADDRESS2, CONTACT, GENDER, 
                CIVIL, SPOUSE, CHILD1, CHILD2, SSS, PHIC, HDMF, TAX, SSSD, PHICD, HDMFD, TAXD, HDMFPAY, DEPARTMENT, LOCATION_, TRIPRATE, SALARY, ALLOWANCE, 
                DATEHIRED, DATEPERMANENT, PASSWORD_, SHOWPAYSLIP, PAYROLLTYPE, ATM, MOTHER, EMERGENCY_, USERLASTUPDATE, DATELASTUPDATE, USERNAME) 
                VALUES ($empno, '$lname', '$fname', '$mname', '$company', '$status', '$position', '$birthdate', '$address1', '$address2', '$contact', '$gender', 
                '$civil', '$spouse', '$child1', '$child2', '$sss', '$phic', '$hdmf', '$tax', '$sssd', '$phicd', '$hdmfd', '$taxd', '$hdmfpay', '$department', '$location', $triprate, $salary, $allowance, 
                '$datehired', '$datepermanent', '$password', '$showpayslip', '$payrolltype', $atm, '$mother', '$emergency', '$userlastupdate', '$datelastupdate', '$empno')";
        $result = $conn->query($sql);
    header("Location: masterfile.php");
  }
  $empno = $_GET['empno'];
  $sql = "SELECT * FROM TBL_MASTERFILE WHERE EMPNO = $empno";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['empnomastefile'] = $empno;
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $lname = $row['lname']; $fname = $row['fname']; $mname = $row['mname'];
            $status = $row['status_']; $position = $row['position']; $birthdate = $row['birthdate']; $address1 = $row['address1'];
            $address2 = $row['address2']; $contact = $row['contact']; $gender = $row['gender']; $civil = $row['civil'];
            $spouse = $row['spouse']; $child1 = $row['child1']; $child2 = $row['child2']; $sss = $row['sss'];
            $phic = $row['phic']; $hdmf = $row['hdmf']; $tax = $row['tax']; $sssd = $row['sssd'];
            $phicd = $row['phicd']; $hdmfd = $row['hdmfd']; $taxd = $row['taxd']; $hdmfpay = $row['hdmfpay'];
            $department = $row['department']; $location = $row['location_']; $triprate = $row['triprate']; $salary = $row['salary'];
            $allowance = $row['allowance']; $datehired = $row['datehired']; $datepermanent = $row['datepermanent']; $password = $row['password_'];
            $showpayslip = $row['showpayslip']; $payrolltype = $row['payrolltype']; $atm = $row['atm']; $mother = $row['mother'];
            $emergency = $row['emergency_'];
        }
    }
 

//         header("Location: masterfile.php");
//     }
//   }
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
    <title>EDIT EMPLOYEE</title>
</head>
<body onload="getdate()">
    <div class="container">
        <header>Registration</header>

        <form action="edit_employee.php" method="post" id="form_submit">
            <div class="form first active">
                <div class="details personal">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Last Name</label>
                            <?php echo '<input type="text" id = "lname" name = "lname" placeholder="Enter Last Name" value='.$lname.' required autofocus>';?>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <?php echo '<input type="text" id = "fname" name = "fname" placeholder="Enter First Name" value ='.$fname.' required>';?>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <?php echo '<input type="text" id = "mname" name = "mname" placeholder="Enter Middle Name" value='.$mname.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Birth Date</label>
                            <?php echo '<input type="date" id = "birthdate" name = "birthdate" value ='.$birthdate.'>';?>
                        </div>
                        
                        <div class="input-field">
                            <label>Current Address</label>
                            <?php echo '<input type="text" id = "address1" name = "address1" placeholder="Enter Current Address" value='.$address1.'>';?>
                        </div>
                        
                        <div class="input-field">
                            <label>Permanent Address</label>
                            <?php echo '<input type="text" id = "address2" name = "address2" placeholder="Enter Permanent Address" value='.$address2.'>';?>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Contact No.</label>
                            <?php echo '<input type="text" id = "contact" name = "contact" placeholder="Enter Contact No." value='.$contact.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select  name="gender" id="gender">
                                <?php
                                    if($gender == "FEMALE"){
                                        echo '
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE" selected>FEMALE</option>';}
                                    else{
                                        echo '
                                    <option value="MALE" selected>Male</option>
                                    <option value="FEMALE">Female</option>';}
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Civil Status</label>
                            <select  name="civil" id="civil">
                            <?php
                                if($civil == "MARRIED"){
                                    echo '  
                                <option value="SINGLE">SINGLE</option>
                                <option value="MARRIED" selected>MARRIED</option>';}
                                else{
                                    echo '
                                <option value="SINGLE" selected>SINGLE</option>
                                <option value="MARRIED">MARRIED</option>';}  
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Spouse Name</label>
                            <?php echo '<input type="text" id = "spouse" name = "spouse" placeholder="Enter Spouse Name" value='.$spouse.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Child Name 1</label>
                            <?php echo '<input type="text" id = "child1" name = "child1" placeholder="Enter name of child" value='.$child1.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Child Name 2</label>
                            <?php echo '<input type="text" id = "child2" name = "child2" placeholder="Enter name of child" value='.$child2.'>';?>
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
                            <?php echo '<input type="text" id = "sss" name = "sss" placeholder="Enter SSS No." value ='.$sss.'>';?>
                        </div>

                        <div class="input-field">
                            <label>PHIC</label>
                            <?php echo '<input type="text" id = "phic" name = "phic" placeholder="Enter Phillealth No." value='.$phic.'>';?>
                        </div>

                        <div class="input-field">
                            <label>HDMF</label>
                            <?php echo '<input type="text" id = "hdmf" name = "hdmf" placeholder="Enter Pagibig No." value='.$hdmf.'>';?>
                        </div>

                        <div class="input-field">
                            <label>TIN</label>
                            <?php echo '<input type="text" id = "tin" name = "tin" placeholder="Enter TIN" value='.$tax.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Deduct SSS?</label>
                            <select  name="sssd" id="sssd">
                            <?php
                                if($sssd == "NO"){
                                    echo '
                                    <option value="YES">YES</option>
                                    <option value="NO" selected>NO</option>';}
                                else{
                                    echo '
                                    <option value="YES" selected>YES</option>
                                    <option value="NO">NO</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Deduct PHIC?</label>
                            <select  name="phicd" id="phicd">
                            <?php
                                if($phicd == "NO"){
                                    echo '
                                    <option value="YES">YES</option>
                                    <option value="NO" selected>NO</option>';}
                                else{
                                    echo '
                                    <option value="YES" selected>YES</option>
                                    <option value="NO">NO</option>';}
                            ?>
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
                            <?php
                                if($hdmfd == "NO"){
                                    echo '
                                    <option value="YES">YES</option>
                                    <option value="NO" selected>NO</option>';}
                                else{
                                    echo '
                                    <option value="YES" selected>YES</option>
                                    <option value="NO">NO</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Deduct Tax?</label>
                            <select  name="taxd" id="taxd">
                            <?php
                                if($taxd == "NO"){
                                    echo '
                                    <option value="YES">YES</option>
                                    <option value="NO" selected>NO</option>';}
                                else{
                                    echo '
                                    <option value="YES" selected>YES</option>
                                    <option value="NO">NO</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>HDMF Contri (For Semi-Monthly Only)</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "hdmfpay" name = "hdmfpay" value = "0" placeholder="Enter Pagibig Contri" value='.$hdmfpay.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Department</label>
                            <select  name="department" id="department">
                            <?php
                                if($department == "MAINTENANCE"){
                                    echo '
                                <option value="ADMIN">ADMIN</option>
                                <option value="MAINTENANCE" selected>MAINTENANCE</option>
                                <option value="DELIVERY">DELIVERY</option>';}
                                elseif ($department == 'DELIVERY'){
                                    echo '
                                <option value="ADMIN">ADMIN</option>
                                <option value="MAINTENANCE" >MAINTENANCE</option>
                                <option value="DELIVERY" selected>DELIVERY</option>';}
                                else{
                                    echo '
                                <option value="ADMIN" selected>ADMIN</option>
                                <option value="MAINTENANCE" >MAINTENANCE</option>
                                <option value="DELIVERY" >DELIVERY</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Position</label>
                            <select  name="position" id="position">
                            <?php
                                if($position == "MAINTENANCE"){
                                    echo '
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE" selected>MAINTENANCE</option>
                                <option value="DRIVER">DRIVER</option>
                                <option value="HELPER">HELPER</option>';}
                                elseif ($position == 'DRIVER'){
                                    echo '
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DRIVER" selected>DRIVER</option>
                                <option value="HELPER">HELPER</option>';}
                                elseif ($position == 'HELPER'){
                                    echo '
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DRIVER">DRIVER</option>
                                <option value="HELPER" selected>HELPER</option>';}
                                else{
                                    echo '
                                <option value="OFFICE STAFF" selected>OFFICE STAFF</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DRIVER">DRIVER</option>
                                <option value="HELPER">HELPER</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Location</label>
                            <select  name="location" id="location">
                            <?php
                                $sql = "SELECT * FROM TBL_LOCATION WHERE company = '$company' ORDER BY location_";
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
                            <?php echo '<input type="number" step="any" min="0" max="200000" id = "triprate" name = "triprate" value = "0" placeholder="Enter Trip Rate" value='.$triprate.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Monthly Salary</label>
                            <?php echo '<input type="number" step="any" min="0" max="200000" id = "salary" name = "salary" value = "0" placeholder="Enter Monthly Salary" value='.$salary.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Daily Allowance</label>
                            <?php echo '<input type="number" step="any" min="0" max="200000" id = "allowance" name = "allowance" value = "0" placeholder="Enter Daily Allowance" value='.$allowance.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Date Hired</label>
                            <?php echo '<input type="date" id = "datehired" name = "datehired" value='.$datehired.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Date Permanent</label>
                            <?php echo '<input type="date" id = "datepermanent" name = "datepermanent" value='.$datepermanent.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Status</label>
                            <select  name="status" id="status">
                            <?php
                                if($status == "RESIGNED"){
                                    echo '
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="RESIGNED" selected>RESIGNED</option>';}
                                else{
                                    echo '
                                    <option value="ACTIVE" selected>ACTIVE</option>
                                    <option value="RESIGNED">RESIGNED</option>';}
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Payslip Password</label>
                            <?php echo '<input type="text" id = "password" name = "password" placeholder="Enter Payslip Password" value='.$password.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Show Payslip to Employee?</label>
                            <select  name="showpayslip" id="showpayslip">
                            <?php
                                if($showpayslip == "NO"){
                                    echo '
                                    <option value="YES">YES</option>
                                    <option value="NO" selected>NO</option>';}
                                else{
                                    echo '
                                    <option value="YES" selected>YES</option>
                                    <option value="NO">NO</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Payroll Type</label>
                            <select  name="payrolltype" id="payrolltype">
                            <?php
                                if($payrolltype == "SEMI-MONTHLY"){
                                    echo '
                                <option value="WEEKLY">WEEKLY</option>
                                <option value="SEMI-MONTHLY" selected>SEMI-MONTHLY</option>';}
                                else{
                                    echo '
                                <option value="WEEKLY" selected>WEEKLY</option>
                                <option value="SEMI-MONTHLY">SEMI-MONTHLY</option>';}
                            ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>ATM No.</label>
                            <?php echo '<input type="number" id = "atm" name = "atm" value = "0" placeholder="Enter ATM No." value='.$atm.'>';?>
                        </div>

                        <div class="input-field">
                            <label>Mother's Maiden Name</label>
                            <?php echo "<input type='text' id = 'mother' name = 'mother' placeholder='Enter Mother's Maiden Name' value=".$mother.">";?>
                        </div>

                        <div class="input-field">
                            <label>Emergency Contact Person/Number</label>
                            <?php echo '<input type="text" id = "emergency" name = "emergency" placeholder="Enter Emergency Contact Person/Number" value='.$emergency.'>';?>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn2" type="button">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="submit" type = "button" onclick="check_duplicate_employee(2)">

                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="submit" type = "submit" id = "submit" name = "submit" hidden></button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <?php echo "<script type = 'text/javascript' src='static/js/script1.js' defer data-location='".$location."' data-empno = '".$empno."'></script>";?>
</body>

</html>
