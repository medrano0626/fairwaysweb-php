<?php
    session_start();
    if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
        header("Location: ../index.php");
    }
    include "../config.php";
    $user_name = $_SESSION['username'];
    $company = $_SESSION['company'];
    $role = $_SESSION['role'];
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE rowid = $id";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    $period = array();
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $emptype = $row['employeetype']; $period = $row['payrollperiod']; $periodfrom = $row['periodfrom'];
            $periodto = $row['periodto']; $paymonth = $row['paymonth']; $payyear = $row['payyear']; $position = $row['employeetype'];
        }
    }
  if(isset($_POST['submit'])){
        $empno = $_POST['empno']; $regday = $_POST['regday']; $regot = $_POST['regot']; $regholiday = $_POST['reghday'];
        $regholidayot = $_POST['reghot']; $specholiday = $_POST['specday']; $specholidayot = $_POST['specot']; $tardy = $_POST['tardy'];    
        $datemaintained = date("Y-m-d");
        $sql = "INSERT INTO TBL_ATTENDANCE(empno, regday, regot, regholiday, regholidayot, specholiday, specholidayot, tardy, periodfrom, periodto, paymonth, payyear, datemaintained, user, company, position) 
                VALUES ($empno, $regday, $regot, $regholiday, $regholidayot, $specholiday, $specholidayot, $tardy, '$periodfrom', '$periodto', $paymonth, $payyear, '$datemaintained', '$user_name', '$company', '$position')";
        $result = $conn->query($sql);
        // header("Location: payroll_period.php");
  }
  if(isset($_POST['close'])){
        header("Location: attendance.php");
  }
?>
<?php include "includes/header.php";?>
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style12.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>ATTENDANCE</title>
    <?php include "includes/body.php";?>
    <div class="container">
        <?php echo '<header>ATTENDANCE - '.$emptype. '</header>';?>
        <?php echo '<h4>'.$period.'</h4>';?>
        <?php echo '<form action="add_attendance.php?id='.$id.'" method="post" id="form_submit" autocomplete="off">';?>
            <div class="form third active">
                <div class="details address">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Search Employee</label>
                            <input list="empdata" name="emp" id="emp" autofocus>
                            <datalist id="empdata">
                            <?php
                                $sql = "SELECT * FROM TBL_MASTERFILE WHERE COMPANY = '$company' AND STATUS_ = 'ACTIVE'AND POSITION = '$emptype' ORDER BY LNAME";
                                $result = $conn->query($sql);

                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row['lname'].','.$row['fname'].'" id = "'.$row['empno'].'">'.$row['empno'].'</option>';
                                    }
                                }
                            ?>
                            </datalist>
                        </div>

                        <div class="input-field">
                            <label>Employee No.</label>
                            <input type="text" step="any" min="0" max="100000" id = "empno" name = "empno" readonly required>
                        </div>
                        <div class="input-field">
                            <label hidden>Employee No.</label>
                            <input type="text" step="any" min="0" max="100000" id = "checkdelete" name = "checkdelete" hidden>
                        </div>
                        <div class="input-field">
                            <label hidden>Driver Name</label>
                            <select  name="empname" id="empname" hidden disabled>
                            <?php
                                $sql = "SELECT * FROM TBL_MASTERFILE WHERE COMPANY = '$company' AND STATUS_ = 'ACTIVE' AND POSITION = '$emptype' ORDER BY LNAME";
                                $result = $conn->query($sql);

                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row['lname'].','.$row['fname'].'" id = "'.$row['empno'].'" data-id="'.$row['empno'].'">'.$row['lname'].','.$row['fname'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="details address">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Regular Day (Days)</label>
                            <input type="number" step="any" max="100000" id = "regday" name = "regday" required>
                        </div>

                        <div class="input-field">
                            <label>OT (Hours)</label>
                            <input type="number" step="any" max="100000" id = "regot" name = "regot">
                        </div>

                    </div>
                </div>
                <div class="details family">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Regular Holiday (Days)</label>
                            <input type="number" step="any" max="100000" id = "reghday" name = "reghday">
                        </div>

                        <div class="input-field">
                            <label>OT (Hours)</label>
                            <input type="number" step="any" max="100000" id = "reghot" name = "reghot">
                        </div>
                    </div>
                </div> 
                <div class="details family">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Special Holiday (Days)</label>
                            <input type="number" step="any" max="100000" id = "specday" name = "specday">
                        </div>

                        <div class="input-field">
                            <label>OT (Hours)</label>
                            <input type="number" step="any" min="0" max="100000" id = "specot" name = "specot">
                        </div>
                        <div class="input-field">
                            <label>Tardy (Hours)</label>
                            <input type="number" step="any" min="0" max="100000" id = "tardy" name = "tardy">
                        </div>
                    </div>

                    <div class="buttons">
                        <button class="submit" type="submit" accesskey="s" name="submit">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="backBtn2" type="button" onclick="deleteatt()" hidden>
                            <span class="btnText">Delete</span>
                            <i class="uil uil-navigator" hidden></i>
                        </button>
                        <button class="backBtn2" type="button" onclick="close1()">
                            <span class="btnText">Close</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
        
    </div>
    <?php echo '<script type = "text/javascript" src="static/js/script7.js" data-rowid = "'.$id.'"></script> ';?>
    </body>
</html>
