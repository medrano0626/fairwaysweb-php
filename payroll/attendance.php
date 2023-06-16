<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
  if(isset($_POST['submit'])){
        $id = $_POST['period'];
        header("Location: add_attendance.php?id=".$id);
  }
?>
<?php include "includes/header.php";?>
    <link rel="stylesheet" type = "text/css" href="static/css/style10.css">
    <link rel="icon" type = "images/x-icon" href="static/images/logo.png">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- JQuery Core JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title>ATTENDANCE</title>
    <?php include "includes/body.php";?>
<div class="center">
    <form action="attendance.php?id=" method = "post" id="form_submit">
    <h1>Select Period</h1>
        <div class="inputbox">
            <select class="select" name="dept" id="dept" onchange="selectdept(1)">
                <option value="OFFICE STAFF">OFFICE STAFF</option>
                <option value="MAINTENANCE">MAINTENANCE</option>
            </select>
        </div>
        <div class="inputbox">
            <select class="select" name="period" id="period">
            <?php
                $sql = "SELECT * FROM TBL_PAYROLL_PERIOD WHERE COMPANY = '$company' AND STATUS_ = 'ACTIVE' AND EMPLOYEETYPE = 'OFFICE STAFF'";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row['rowid'].">".$row['payrollperiod']."</option>";
                    }
                }
            ?>
            </select>
        </div>
      <div class="inputbox">
        <input type="submit" value="Input Attendance" name = "submit">
      </div>
    </form>
    
  </div>
  <script type = "text/javascript" src="static/js/script12.js"></script> 
  </body>
</html>