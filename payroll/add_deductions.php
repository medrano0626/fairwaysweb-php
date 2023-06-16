<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $company = $_SESSION['company'];
  $user_name = $_SESSION['username'];
  
  if(isset($_POST['close'])){
    header("Location: deductions.php");
  }
  if(isset($_POST['submit'])){
    $dedname = strtoupper($_POST['ded_name']); $priority = $_POST['priority']; $dedtype = $_POST['ded_type']; 
    $sql = "INSERT INTO TBL_DEDUCTION_TYPE (DEDUCTION_NAME, PRIORITY, DEDUCTION_TYPE, COMPANY) 
            VALUES ('$dedname', $priority, '$dedtype', '$company')";
    $result = $conn->query($sql);
    header("Location: deductions.php");

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
    <title>ADD DEDUCTIONS</title>
</head>
<body>
    <div class="container">
        <header>Deductions</header>

        <form action="add_deductions.php" method="post" id="form_submit">
            <div class="form first active">
                <div class="details personal">
                    <span class="title">Deduction Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Deduction Name</label>
                            <input type="text" size="50" id = "ded_name" name = "ded_name" placeholder="Enter Deduction Name"  autofocus>
                        </div>

                        <div class="input-field">
                            <label>Priority Number</label>
                            <input type="number" size="50"  id = "priority" name = "priority" placeholder="Enter Priority Number" >
                        </div>

                        <div class="input-field">
                            <label>Deduction Type?</label>
                            <select  name="ded_type" id="ded_type">
                                <option value="FIXED">FIXED</option>
                                <option value="NONFIXED">NONFIXED</option>
                            </select>
                        </div>
                    </div>    
                            <div class="buttons">
                                <button class="nextBtn2" type="button" onclick="check_duplicate_deductions(3)">
                                    <span class="btnText">Save</span>
                                    <i class="uil uil-navigator"></i>
                                </button>
                                
                                <button class="submit" type = "submit" id = "submit" name = "submit" hidden></button>
                                
                            </div>

                </div>
            </div>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <script type = "text/javascript" src="static/js/script12.js"></script>    
</body>

</html>