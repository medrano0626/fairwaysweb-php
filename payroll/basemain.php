<?php
include "config.php";
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type = "images/x-icon" href="static/images/logo.png">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background: url('payroll/static/images/bg.jpeg');
  background-repeat: no-repeat;
  background-size:100% 100vh;
}

.navbar {
  overflow: hidden;
  background-color: #333; 
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white; 
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: #6c6e74;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: #6c6e74;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  /* color: white; */
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
</style>
</head>
<body>
<div class="navbar">
  <a href="/payroll_main">Home</a>
  <div class="subnav">
    <button class="subnavbtn">File <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="/masterfile" target="_blank">Masterfile</a>
      <a href="/deductions" target="_blank">Deductions List</a>
      <a href="/sss" target="_blank">SSS</a>
      <a href="/phichdmf">PHIC/HDMF</a>
      <a href="/payroll_period">Payroll Period</a>
      <?php 
        if($role != "PAYROLL"){
          echo "<a href='/rate' >Rate</a>";
          echo "<a href='/other_list' >Other List</a>";
        }
      ?>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Transactions <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="/attendance">Attendance</a>
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
          echo "<a href='/user' target='_blank'>Add User</a>";
          echo "<a href='/clear_table'>Clear Table</a>";
        }
      ?>
    </div>
  </div>
  <a href="/signout">LogOut</a>
</div>
</body>
</html>
