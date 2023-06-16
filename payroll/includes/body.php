
<body>
<div class="navbar">
  <a href="payroll_main.php">Home</a>
  <div class="subnav">
    <button class="subnavbtn">File <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="masterfile.php" target="_blank">Masterfile</a>
      <a href="deductions.php" target="_blank">Deductions List</a>
      <a href="sss.php" target="_blank">SSS</a>
      <a href="phichdmf.php">PHIC/HDMF</a>
      <a href="payroll_period.php">Payroll Period</a>
      <?php 
        if($role != "PAYROLL"){
          echo "<a href='rate.php' >Rate</a>";
          // echo "<a href='/other_list' >Other List</a>";
        }
      ?>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Transactions <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="attendance.php">Attendance</a>
      <a href="/vtr">VTR</a>
      <a href="/emp_deductions" target="_blank">Deductions/Earnings</a>
      <a href="/generate">Generate</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Reports <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="/gov_ded">Gov't Ded</a>
      <a href="/deduction_reports">Deductions</a>
      <a href="/payroll_reports">Payroll</a>
      <a href="/other_reports/0">Others</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">User Maintenance<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="/change_password">Change Password</a>
      <?php 
        if($role != "PAYROLL"){
          echo "<a href='add_user.php' target='_blank'>Add User</a>";
          echo "<a href='/clear_table'>Clear Table</a>";
        }
      ?>
    </div>
  </div>
  <a href="signout.php">LogOut</a>
</div>