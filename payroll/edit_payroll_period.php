<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
  $rowid = $_SESSION['edit_period'];
  if(isset($_POST['submit'])){
        $paytype = $_POST['paytype']; $employeetype = $_POST['employeetype']; $periodfrom = $_POST['periodfrom']; 
        $periodto = $_POST['periodto']; $paymonth = $_POST['paymonth1']; $payyear = $_POST['payyear1']; $datemaintained = date("Y-m-d");
        $payrollperiod =  date_format(date_create($periodfrom),"m/d/Y") . "-" . date_format(date_create($periodto),"m/d/Y");
    $sql = "DELETE FROM TBL_PAYROLL_PERIOD WHERE ROWID = $rowid";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_PAYROLL_PERIOD (paytype, employeetype, periodfrom, periodto, paymonth, payyear, datemaintained, user, company, PAYROLLPERIOD, status_) 
                VALUES ('$paytype', '$employeetype', '$periodfrom', '$periodto', $paymonth, $payyear, '$datemaintained', '$user_name', '$company', '$payrollperiod', 'ACTIVE')";
        $result = $conn->query($sql);
    header("Location: payroll_period.php");
  }
 
  $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE ROWID = $rowid";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $paytype = $row['paytype']; $employeetype = $row['employeetype']; $periodfrom = $row['periodfrom']; 
            $periodto = $row['periodto']; $paymonth = $row['paymonth']; $payyear = $row['payyear']; 
        }
    }
?>

<?php include "includes/header.php";?>
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style5.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<title>PAYROLL PERIOD</title>
<?php include "includes/body.php";?>
<div class="container">
    <header>EDIT PAYROLL PERIOD</header>
    <form action="edit_payroll_period.php" method="post">
        <div class="form third active">
            <div class="details address">
                <span class="title">-----------------------------------------------------------------------------------------</span>

                <div class="fields">
                    <div class="input-field">
                        <label>Pay Type</label>
                        <select  name="paytype" id="paytype">
                        <?php
                                if($paytype == "SEMI-MONTHLY"){
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
                        <label>Employee Type</label>
                        <select  name="employeetype" id="employeetype">
                        <?php
                                if($employeetype == "MAINTENANCE"){
                                    echo '
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE" selected>MAINTENANCE</option>
                                <option value="DRIVER">DRIVER</option>
                                <option value="HELPER">HELPER</option>';}
                                elseif ($employeetype == 'DRIVER'){
                                    echo '
                                <option value="OFFICE STAFF">OFFICE STAFF</option>
                                <option value="MAINTENANCE">MAINTENANCE</option>
                                <option value="DRIVER" selected>DRIVER</option>
                                <option value="HELPER">HELPER</option>';}
                                elseif ($employeetype == 'HELPER'){
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
                        <label>Period From</label>
                        <?php echo '<input type="date" id = "periodfrom" name = "periodfrom" value="'.$periodfrom.'">';?>
                    </div>

                    <div class="input-field">
                        <label>Period To</label>
                        <?php echo '<input type="date" id = "periodto" name = "periodto" value="'.$periodto.'">';?>
                    </div>

                    <div class="input-field">
                        <label>Pay Month</label>
                        <select  name="paymonth1" id="paymonth1">
                        
                        </select>
                    </div>

                    <div class="input-field">
                        <label>Pay Year</label>
                        <select  name="payyear1" id="payyear1">
                            
                        </select>
                    </div>
                </div>
                <div class="buttons">
                    <button class="submit" type="submit" name = "submit">
                        <span class="btnText">Save</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
<?php echo '<script type = "text/javascript" src="static/js/script2.js" defer data-payyear = "'.$payyear.'" data-paymonth = "'.$paymonth.'"></script>';?>
</body>
</html>
